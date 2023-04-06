<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Bid;
use App\Models\User;
use App\Models\Alert;
use App\Models\Rating;
use App\Models\Winner;
use App\Models\VerifyUser;
use App\Models\Item_dispatched_orders;
use PharIo\Manifest\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function orderHistory()
    {
        $user = Auth::guard('web')->user()->id;
        $ProductDispatched = DB::table('item_dispatched_orders')->join('users', 'item_dispatched_orders.seller_id', '=', 'users.id')->join('products', 'item_dispatched_orders.product_id', '=', 'products.id')->join('dispatched_statuses', 'item_dispatched_orders.status_id', '=', 'dispatched_statuses.id')->select('item_dispatched_orders.id', 'item_dispatched_orders.winner_id','item_dispatched_orders.is_completed', 'item_dispatched_orders.buyer_completed', 'products.id as p_id' ,'products.product_name', 'products.low_qual_img', 'products.product_unique_id',   'users.email', 'users.username','dispatched_statuses.status')->where('item_dispatched_orders.buyer_id', $user)->orderBy('products.created_at', 'desc')->get();
        // dd($ProductDispatched);
        return view('User.body.dispatch',compact('ProductDispatched'));
    }
    public function OrderCompleted($id)
    {
        // dd($id);
        $dispatch = Item_dispatched_orders::find($id);
        $dispatch->buyer_completed = 1;
        $itemOrder = $dispatch->update();
        if ($itemOrder) {
            return redirect()->back()->with('success', 'Item dispatched Marked Completed Successfully!');
        } else {
            return redirect()->back()->with('fail', 'Item dispatched Marked Complete Failed!');
        }
    }
    public function waitingProducts()
    {
        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');
        $WaitingCount = Bid::where('user_id', Auth::guard('web')->user()->id)->where('created_at', $DateToday)->orwhere('created_at', $DateYesterday)->groupby('product_id')->get();
        // dd($WaitingCount);
        return view('User.body.waiting-products');
    }
    public function bidedProducts()
    {
        return view('User.body.bided-products');
    }
    public function home()
    {
        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');
        $WaitingCount = Bid::where('user_id', Auth::guard('web')->user()->id)->where('created_at', $DateToday)->where('created_at', $DateYesterday)->groupby('product_id')->distinct('product_id')->count();
        // $BidedCount = Bid::where('user_id', Auth::guard('web')->user()->id)->distinct('product_id')->count();
        // dd($WaitingCount);


        $pCount = Winner::all()->where('user_id', Auth::guard('web')->user()->id)->count();
        return view('User.body.dashboard', compact('pCount', 'WaitingCount'));
    }
    public function alertProducts()
    {

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $ProductAlert = DB::table('alerts')->join('countries', 'alerts.country_id', '=', 'countries.id')->join('categories', 'alerts.category', '=', 'categories.id')->leftJoin('catalogenrs', 'alerts.catalogue_id', '=', 'catalogenrs.id')->select('categories.category', 'alerts.id', 'countries.name', 'catalogenrs.cataloge_nrs', 'alerts.catalogue_number',)->where('user_id', $usr)->orderByDesc('alerts.id')->get();




        // dd($ProductAlert);
        return view('User.body.alert-Product', compact('ProductAlert'));
    }

    public function deleteProductsAlert($id)
    {

        $ProductAlert = Alert::find($id);
        $deleteAlert = $ProductAlert->delete();


        if ($deleteAlert) {
            return redirect()->back()->with('success', 'Alert deleted successfully!');
        } else {
            return redirect()->back()->with('fail', 'Alert delete failed!');
        }
    }
    public function availableAlert()
    {
        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }


        $expiredDay = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');

        $ProductAlert = DB::select("SELECT  p.product_name,p.low_qual_img,categories.category, countries.name, catalogenrs.cataloge_nrs , p.catlogue_no , p.id AS p_id  FROM products AS p INNER JOIN categories ON p.category_id = categories.id INNER JOIN countries ON p.country = countries.id LEFT JOIN catalogenrs ON p.catalogue = catalogenrs.id INNER JOIN alerts ON alerts.category = p.category_id AND alerts.country_id = p.country AND alerts.catalogue_id<=>p.catalogue AND alerts.catalogue_number = p.catlogue_no  WHERE alerts.user_id = '$usr' AND p.start_at > '$expiredDay' ");


        $Pcount = DB::select("SELECT   p.product_name, p.id AS p_id   FROM products AS p INNER JOIN categories ON p.category_id = categories.id INNER JOIN countries ON p.country = countries.id LEFT JOIN catalogenrs ON p.catalogue = catalogenrs.id INNER JOIN alerts ON alerts.category = p.category_id AND alerts.country_id = p.country AND alerts.catalogue_id<=>p.catalogue AND alerts.catalogue_number = p.catlogue_no  WHERE alerts.user_id = '$usr' AND p.start_at > '$expiredDay' ");

        $TPcount = DB::select("SELECT COUNT(p.id) AS p_count FROM products AS p INNER JOIN categories ON p.category_id = categories.id INNER JOIN countries ON p.country = countries.id LEFT JOIN catalogenrs ON p.catalogue = catalogenrs.id INNER JOIN alerts ON alerts.category = p.category_id AND alerts.country_id = p.country AND alerts.catalogue_id<=>p.catalogue AND alerts.catalogue_number = p.catlogue_no  WHERE alerts.user_id = '$usr' AND p.start_at > '$expiredDay' ");

        // dd($ProductAlert, $Pcount, $TPcount);
        // housting
        return view('User.body.available-alert-Product', compact('ProductAlert', 'Pcount', 'TPcount'));
    }
    public function alertProductReview($id)
    {
        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');
        $item = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.id', $id)->where('products.start_at', '>', $expiredDay)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->first();


        // dd($item, $id,);
        return view('User/body/review-alert-products', compact('item'));
    }
    public function AddAlertProducts(Request $request)
    {
        // dd($request);
        $request->validate([
            'select_category' => 'required',
            'catalogue' => 'numeric|required',
            // 'catalogue_category' => 'required',
            // 'catalogue_number' => 'required',
            'country' => 'required',
        ]);
        $category = $request->select_category;
        $stri = preg_split("/[\s,]+/", $category);
        $category = $stri[0];
        // dd($category);
        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }
        $alert = new Alert;
        $alert->category =  $category;
        $alert->country_id = $request->country;
        $alert->catalogue_id = $request->catalogue_number;
        // $alert->catalogue_category = $request->catalogue_category;
        $alert->catalogue_number = $request->catalogue;
        $alert->user_id = $usr;
        $saveAlert = $alert->save();

        if ($saveAlert) {
            return redirect()->back()->with('success', 'Alert added successfully!');
        } else {
            return redirect()->back()->with('fail', 'Alert add failed!');
        }
    }
    public function updateInfo(Request $request)
    {
        // validate the request

        // dd($request);

        $request->validate([
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'gender' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required|numeric',
            'country' => 'required',
        ]);



        $user = User::find(Auth::guard('web')->user()->id);

        if (!empty($request->user_image)) {
            $userImage = $user->image;
            $user_low_qual_img  = $user->low_qual_img;

            $image = $request->file('user_image');
            $path =  'users/images/';
            $new_img_name = 'UIMG' . date('YmdHis') . uniqid()  . '.jpg';
            $last_img = $path . $new_img_name;
            $image->move($path, $new_img_name);
            $user->image = $last_img;

            $lqpath =  'users/low_qual_img/';
            $new_lqimg_name = 'LQUIMG' . date('YmdHis') . uniqid()  . '.jpg';
            $last_low_qual_img = $lqpath . $new_lqimg_name;
            $img = \Intervention\Image\Facades\Image::make($last_img)->resize(180, 120);
            $img->save($lqpath . $new_lqimg_name);
            $user->low_qual_img = $last_low_qual_img;
            if ($userImage == true) {
                unlink($userImage);
            }
            if ($user_low_qual_img == true) {
                unlink($user_low_qual_img);
            }
        }

        $user->gender = $request->gender;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone_number;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->postal_code = $request->postal_code;
        $user->country = $request->country;
        $saveUser = $user->update();

        if ($saveUser) {
            return redirect()->back()->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('fail', 'User update failed');
        }
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:30|different:new_Password',
            'new_Password' => 'required|min:8|max:30',
            'confirm_Password' => 'required|min:8|max:30|same:new_Password',
        ]);

        $cred = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($cred)) {

            $userPassword = User::find(Auth::guard('web')->user()->id);
            $userPassword->password = Hash::make($request->new_Password);
            $UpdateUserPassword = $userPassword->update();
            if ($UpdateUserPassword) {
                return redirect()->back()->with('success', 'Password updated successfully');
            } else {
                return redirect()->back()->with('fail', 'Password Update failed!');
            }
        } else {
            return redirect()->back()->with('fail', 'Incorrect Old Password');
        }
    }
    public function verify(Request $request)
    {
        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->email_verified) {
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->email_verified_at = Carbon::now();
                $verifyUser->user->save();
                return redirect()->route('user.login')->with('info', 'Your account has been verified, You may login now')->with('verifiedEmail', $user->email);
            } else {
                return redirect()->route('user.login')->with('info', 'Your account is already verified, You may login now')->with('verifiedEmail', $user->email);
            }
        }
    }
    public function check(request $request)
    {
        //validate request
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:5|max:30',
            ],
            [
                'email.exists' => 'This email is not exists',
            ]
        );

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'Incorrect Credentials');
        }
    }
    public function crop(Request $request)
    {
        $validatedData = $request->validate([
            'user_update_image' => 'required|mimes:jpg.jpeg,png'
        ]);

        $image = $request->file('user_update_image');
        $path = 'users/images/';
        $new_img_name = 'UIMG' . date('YmdHis') . uniqid() . '.jpg';
        $move = $image->move($path, $new_img_name);
        if (!$move) {
            return response()->json(['status' => 0, 'msg' => 'Image size is large, update picture has been failed!']);
        } else {
            $userInfo = User::find(Auth::guard('web')->user()->id);
            $userImg = $userInfo->image;
            if ($userImg != '') {
                unlink($path . $userImg);
            }
            $userInfo = User::find(Auth::guard('web')->user()->id)->update(['image' => $new_img_name]);
            return response()->json(['status' => 1, 'msg' => 'Your profile picture has been updated successfully!', 'name' => $new_img_name]);
        }
    }
    public function logout()
    {
        // dd(Auth::logout());
        if (empty(Auth::guard('seller')->user()->username)) {
            Auth::guard('seller')->logout();
        }
        Auth::guard('web')->logout();
        return redirect('/user');
    }
    public function winner()
    {
        // $winner = Winner::find(153);
        // $winner->rated = 1;
        // $winner->update();
        // $p_id = $winner->product_id;
        // $products = Product::find($p_id);
        // $seller = $products->seller_id;

        // dd($seller, $p_id);
        $usr = Auth::guard('web')->user()->id;
        $ProductWinner = DB::table('winners')->join('products', 'winners.product_id', '=', 'products.id')->join('users', 'products.seller_id', '=', 'users.id')->select('products.id', 'products.product_name', 'products.low_qual_img', 'users.email', 'users.username', 'products.product_unique_id', 'seller_id', 'winners.id AS winn_id', 'winners.rated', 'products.start_price' ,  'winners.bid_amount', 'winners.user_id')->where('winners.user_id', $usr)->orderBy('products.created_at', 'desc')->get();
        // dd($ProductWinner);
        return view('User/body/wining', compact('ProductWinner'));
    }
    public function productReview($id)
    {

        $usr = Auth::guard('web')->user()->id;
        $item = DB::table('products')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('winners', 'winners.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'products.catlogue_no', 'winners.bid_amount', 'products.product_name', 'products.product_unique_id', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'products.country', 'products.sub_category',  'users.username')->where('winners.product_id', $id)->where('winners.user_id', $usr)->orderBy('products.created_at', 'desc')->groupBy('ratings.seller_id')->first();
        // dd($item);
        return view('User/body/review-products', compact('item'));
    }
    public function sellerInfo($id)
    {
        // dd($id);
        $usr = Auth::guard('web')->user()->id;
        $SellerInfo = DB::table('users')->join('countries', 'users.country', '=', 'countries.id')->select('wallet_shipment', 'gender', 'first_name', 'last_name', 'username', 'email', 'phone', 'address', 'city', 'state', 'postal_code', 'countries.name')->where('users.id', $id)->first();
        // dd($SellerInfo);
        return view('User/body/SellerInfo', compact('SellerInfo'));
    }
    public function Rating(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $winn_p_id = $request->input('product_id');

            $usr = Auth::guard('web')->user()->id;

            $winner = Winner::find($winn_p_id);
            $winner->rated = $request->rating;
            $winner->update();

            $p_id = $winner->product_id;
            $products = Product::find($p_id);
            $seller = $products->seller_id;

            $rating = new Rating();
            $rating->rating = $request->input('rating');
            $rating->seller_id = $seller;
            $rating->user_id = $usr;
            $ratingSaved = $rating->save();

            if ($ratingSaved) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Seller Rated  Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 201,
                    'errors' => 'Seller Rate Failed!'
                ]);
            }
        }
    }

    public function becomeSeller()
    {
        $usr = Auth::guard('web')->user()->id;
        $user = User::find($usr);
        $user->is_seller = 1;
        $saved = $user->save();
        if ($saved) {
            return redirect('user/home')->with('success', 'Congratulations! You are become seller.');
        } else {
            return redirect('user/home')->with('fail', 'Sorry! There was an error.');
        }
    }
}
