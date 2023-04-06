<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Bid;
use App\Models\User;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Product;
use App\Models\setting;
use App\Models\Dispatched_status;
use Illuminate\View\View;
use App\Models\categories;
use PharIo\Manifest\Email;
use Illuminate\Http\Request;
use App\Models\ProductFeatures;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Catalogenr;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rules\Exists;

class AdminController extends Controller
{
    public function check(request $request)
    {

        $request->validate(
            [
                'email' => 'required|email|exists:admins,email',
                'password' => 'required|min:5|max:30',
            ],
            [
                'email.exists' => 'This email is not exists',
            ]
        );

        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect Credentials');
        }
    }

    public function dashboard()
    {
        $pageTitle = 'Dashboard';
        // Users Info
        $widget['total_users'] = User::where('is_seller', 0)->count();
        $widget['active_users'] = User::where('is_seller', 0)->where('status', 1)->count();
        $widget['banned_users'] = User::where('is_seller', 0)->where('status', 0)->count();
        $widget['email_unverified_users'] = User::where('email_unverified', 0)->where('is_seller', 0)->count();
        $widget['email_verified_users'] = User::where('email_unverified', 1)->where('is_seller', 0)->count();

        // Merchant Info
        $widget['total_seller'] = User::where('is_seller', 1)->count();
        $widget['active_seller'] = User::where('is_seller', 1)->where('status', 1)->count();
        $widget['banned_seller'] = User::where('is_seller', 0)->where('status', 0)->count();
        $widget['email_unverified_seller'] = User::where('email_unverified', 0)->where('is_seller', 1)->count();
        $widget['email_verified_seller'] = User::where('email_unverified', 1)->where('is_seller', 1)->count();
        //product information
        $widget['total_product'] = Product::count();
        $widget['live_count'] = Product::where('status', 3)->count();
        $widget['reject_count'] = Product::where('status', 2)->count();

        return view('admins.body.dashboard', compact('pageTitle', 'widget'));
    }

    public function createCategories(Request $request)
    {
        // dd($request);
        $request->validate([
            'category' => 'required',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        
        
        $image = $request->file('category_image');
        $path =  'category';
        
        $img_name = 'CIMG' . date('YmdHis') . uniqid()  . '.jpg';
        $last_img = $path .'/'. $img_name;
        $image->move($path , $img_name);
        // dd($last_img,$path , $img_name);

        $img_Path =  'category/low_qual_img';
        $new_img_name = 'CIMG' . date('YmdHis') . uniqid()  . '.jpg';
        $limg = \Intervention\Image\Facades\Image::make($last_img)->resize(260, 260);
        $new_name = $img_Path . $new_img_name;
        $limg->save($new_name);
        unlink($last_img);

        $categories = new Categories();
        $categories->img = $img_Path . $new_img_name;
        $categories->category = $request->category;
        $categories->catalogue = $request->catalogue;
        $saved = $categories->save();
        if ($saved) {
            return redirect()->back()->with('success', 'Category saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Category saved  failed!');
        }
    }
    public function manageCategories()
    {
        $categories = categories::all();
        return View('admins.body.manage-categories', compact('categories'));
    }
    public function deleteCategory($id)
    {
        $category = categories::find($id);
        unlink($category->img);
        $saved = $category->delete();
        if ($saved) {
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Category delete failed!');
        }
    }
    public function updateCategory(Request $request, $id)
    {
        // dd($request,$id);
        
        $request->validate([
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $category = categories::find($id);
        $categoryImage = $category->img;
        // dd($category->img);
        if ($request->file('image') == true ) {
            if (!empty($categoryImage) && $categoryImage != " ") {
                unlink($categoryImage);
            }
        }

        $last_img = "";
        
        $img_Path =  "";
        $new_img_name = "";
        if ($request->file('image') == true ) {
            
            $image = $request->file('image');
            $path =  'category';

            $img_Path =  'category/low_qual_img';
            $img_name = 'CIMG' . date('YmdHis') . uniqid()  . '.jpg';
            $last_img = $path .'/'. $img_name;
            $image->move($path , $img_name);
            // dd($last_img,$path , $img_name);

            $new_img_name = 'CIMG' . date('YmdHis') . uniqid()  . '.jpg';
            $limg = \Intervention\Image\Facades\Image::make($last_img)->resize(260, 260);
            $new_name = $img_Path . $new_img_name;
            $limg->save($new_name);
            unlink($last_img);
        }

        $category = categories::find($id);
        $category->catalogue = $request->catalogue;
        $category->category = $request->category;
        if ($request->file('image') == true ) {
            $category->img = $img_Path . $new_img_name;
        }
        
        $saved = $category->update();
        if ($saved) {
            return redirect()->back()->with('success', 'Category updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Category update failed!');
        }
    }
    public function createCatalogeNr(Request $request)
    {
        $request->validate([
            'cataloge_nr' => 'required',

        ]);
        $catalogenr = new Catalogenr;
        $catalogenr->cataloge_nrs = $request->cataloge_nr;
        $saved = $catalogenr->save();

        if ($saved) {
            return redirect()->back()->with('success', 'Cataloge Nr created successfully');
        } else {
            return redirect()->back()->with('fail', 'Cataloge Nr create failed!');
        }
    }
    public function updateCatalogeNr(Request $request, $id)
    {
        $request->validate([
            'cataloge_nr' => 'required',
        ]);

        $catalogenr = Catalogenr::find($id);
        $catalogenr->cataloge_nrs = $request->cataloge_nr;
        $saved = $catalogenr->update();

        if ($saved) {
            return redirect()->back()->with('success', 'Cataloge Nr updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Cataloge Nr update failed!');
        }
    }
    public function deleteCatalogeNr(Request $request, $id)
    {

        $catalogenr = Catalogenr::find($id);
        $saved = $catalogenr->delete();
        if ($saved) {
            return redirect()->back()->with('success', 'Cataloge Nr deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Cataloge Nr delete failed!');
        }
    }
    public function createFeature(Request $request, $id)
    {

        // dd($id);

        $request->validate([
            'feature' => 'required',
            'description' => 'required',
        ]);
        $categoryId = $id;
        $feature = new  Feature();
        $feature->category_id = $categoryId;
        $feature->feature = $request->feature;
        $feature->description = $request->description;
        $saved = $feature->save();
        if ($saved) {
            return redirect()->back()->with('success', 'Feature  saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Feature save failed!');
        }
    }
    public function updateFeature(Request $request, $id)
    {
        $request->validate([
            'feature' => 'required',
            'description' => 'required',
        ]);
        $feature = Feature::find($id);
        $feature->feature = $request->feature;
        $feature->description = $request->description;
        $saved = $feature->update();
        if ($saved) {
            return redirect()->back()->with('success', 'Feature updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Featureupdate failed!');
        }
    }
    public function deleteFeature($id)
    {
        $feature = Feature::find($id);
        $deleted = $feature->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'Feature deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Feature delete failed!');
        }
    }

    public function getFeaturs(Request $request, $id)
    {
        $features = Feature::all()->where('category_id', $id);
        $category_id = $id;
        $data = [
            'category_id' => $category_id,
            'features' => $features,
        ];
        return view('admins.body.features', $data);
    }
    public function createSubCategories(Request $request, $id)
    {

        // dd($id);

        $request->validate([
            'sub_category' => 'required',
        ]);
        $categoryId = $id;
        $SubCategory = new  SubCategory();
        $SubCategory->category_id = $categoryId;
        $SubCategory->Sub_Category = $request->sub_category;
        $saved = $SubCategory->save();
        if ($saved) {
            return redirect()->back()->with('success', 'Sub Category saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Sub Category save failed!');
        }
    }
    public function updateSubCategories(Request $request, $id)
    {
        $request->validate([
            'sub_category' => 'required',
            // 'description' => 'required',
        ]);
        $SubCategory = SubCategory::find($id);
        $SubCategory->Sub_Category = $request->sub_category;
        $saved = $SubCategory->update();
        if ($saved) {
            return redirect()->back()->with('success', 'Sub Category updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Sub Category update failed!');
        }
    }
    public function deleteSubCategories($id)
    {
        $feature = SubCategory::find($id);
        $deleted = $feature->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'Sub Category deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Sub Category delete failed!');
        }
    }
    public function getSubCategories($id)
    {

        $SubCategory = SubCategory::all()->where('category_id', $id);
        $category_id = $id;
        $data = [
            'category_id' => $category_id,
            'SubCategories' => $SubCategory,
        ];
        return view('admins.body.sub-category', $data);
    }
    public function viewProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $Pimages = json_decode($product->image);
        $category = $product->category_id;
        $features = Feature::all()->where('category_id', $category);
        $productFeature = ProductFeatures::all()->where('product_id', $id);
        $SubCategory = DB::table('sub_categories')->where('category_id', $product->category_id)->get();

        $data = [
            'product' => $product,
            'features' => $features,
            'productFeature' => $productFeature,
            'SubCategory' => $SubCategory,
            'Pimages' => $Pimages,
        ];
        // dd($data);
        return view('admins.body.view-product', $data);
    }
    public function allProducts()
    {
        $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'products.seller_id', '=', 'users.id')->select('categories.category', 'products.live_count', 'products.id', 'products.product_name', 'products.product_unique_id', 'products.year', 'products.start_at', 'products.start_price', 'products.status', 'products.low_qual_img', 'products.category_id', 'products.seller_id', 'users.last_name', 'users.first_name')->orderBy('products.created_at', 'desc')->get();
        // dd($products);
        return view('admins.body.all-products', compact('products'));
    }
    public function approvedProducts()
    {
        $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'products.seller_id', '=', 'users.id')->select('categories.category', 'products.live_count', 'products.id', 'products.product_name', 'products.product_unique_id', 'products.year', 'products.start_at', 'products.start_price', 'products.status', 'products.low_qual_img', 'products.category_id', 'products.seller_id', 'users.last_name', 'users.first_name')->where('products.status', '1')->orderBy('products.created_at', 'desc')->get();
        // dd($products);
        return view('admins.body.approved-products', compact('products'));
    }

    public function pendingProducts()
    {
        $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'products.seller_id', '=', 'users.id')->select('categories.category', 'products.live_count', 'products.id', 'products.product_name', 'products.product_unique_id', 'products.year', 'products.start_at', 'products.start_price', 'products.status', 'products.low_qual_img', 'products.category_id', 'products.seller_id', 'users.last_name', 'users.first_name')->where('products.status', '0')->orderBy('products.created_at', 'desc')->get();
        // dd($products);
        return view('admins.body.Pending-products', compact('products'));
    }
    public function liveProducts()
    {
        $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'products.seller_id', '=', 'users.id')->select('categories.category', 'products.live_count', 'products.id', 'products.product_name', 'products.product_unique_id', 'products.year', 'products.start_at', 'products.start_price', 'products.status', 'products.low_qual_img', 'products.category_id', 'products.seller_id', 'users.last_name', 'users.first_name')->where('products.status', '3')->orderBy('products.created_at', 'desc')->get();
        // dd($products);
        return view('admins.body.live-products', compact('products'));
    }
    public function upcomingProducts()
    {
        // $startdate = date("Y-m-d", time() + 86400);

        $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'products.seller_id', '=', 'users.id')->select('categories.category', 'products.live_count', 'products.id', 'products.product_name', 'products.product_unique_id', 'products.year', 'products.start_at', 'products.created_at', 'products.start_price', 'products.low_qual_img', 'products.status', 'products.category_id', 'products.seller_id', 'users.last_name', 'users.first_name')->where('products.status', '=', '1')->orderBy('products.created_at', 'desc')->get();
        // 
        // dd($products);
        return view('admins.body.upcomming-products', compact('products'));
    }
    public function expiredProducts()
    {
        $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'products.seller_id', '=', 'users.id')->select('categories.category', 'products.live_count', 'products.id', 'products.product_name', 'products.product_unique_id', 'products.year', 'products.start_at', 'products.created_at', 'products.start_price', 'products.low_qual_img', 'products.status', 'products.category_id', 'products.seller_id', 'users.last_name', 'users.first_name')->where('products.status', '=', null)->orderBy('products.created_at', 'desc')->get();

        // dd($products);
        return view('admins.body.expired-products', compact('products'));
    }
    public function rejectProducts()
    {
        $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'products.seller_id', '=', 'users.id')->select('categories.category', 'products.live_count', 'products.id', 'products.product_name', 'products.product_unique_id', 'products.year', 'products.start_at', 'products.start_price', 'products.status', 'products.low_qual_img', 'products.category_id', 'products.seller_id', 'users.last_name', 'users.first_name')->where('products.status', '=', '2')->orderBy('products.created_at', 'desc')->get();
        // dd($products);
        return view('admins.body.rejected-products', compact('products'));
    }
    public function checkProduct($id)
    {
        // dd($id);
        $product =  Product::find($id);
        $product->status = 1;

        // $bid = new Bid();
        // $bid->product_id = $id;
        // $bid->amount = $product->start_price;
        // $bid->save();

        $tomorrow = Carbon::now('Europe/London')->addDays(2)->format('Y-m-d');
        // dd($tomorrow);
        if ($product->live_count < 3) {

            $bid = new Bid();
            $bid->product_id = $id;
            $bid->amount = $product->start_price;
            $bid->created_at = $tomorrow;
            $bid->save();
        }
        if ($product->live_count == 3) {

            $price = $product->start_price;
            $halfPrice = $price / 2;
            $product->start_price = $halfPrice;

            $bid = new Bid();
            $bid->product_id = $id;
            $bid->amount = $halfPrice;
            $bid->save();
        }
        $product->start_at = $tomorrow;
        $saved = $product->update();
        if ($saved) {
            return redirect()->back()->with('success', 'Product status updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Product status update failed!');
        }
    }
    public function rejectProduct($id)
    {
        $product = Product::find($id);
        $product->status = 2;
        $saved = $product->update();
        if ($saved) {
            return redirect()->back()->with('success', 'Product status updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Product status update failed!');
        }
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $deleted = $product->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Product deleted failed!');
        }
    }
    public function viewDeleteProduct($id)
    {
        $product = Product::find($id);
        $deleted = $product->delete();
        if ($deleted) {
            return redirect('/admin/all-products')->with('success', 'Product deleted successfully');
        } else {
            return redirect('/admin/all-products')->with('fail', 'Product deleted failed!');
        }
    }


    public function allUsers()
    {

        $users = DB::table('users')->select('id', 'first_name', 'last_name', 'username', 'email', 'phone', 'status', 'created_at')->where('is_seller', 0)->orderBy('created_at', 'desc')->get();
        // dd($users);
        return view('admins.body.users.all-users', compact('users'));
    }
    public function activeUsers()
    {
        $users = DB::table('users')->select('id', 'first_name', 'last_name', 'username', 'email', 'phone', 'status', 'created_at')->where('is_seller', 0)->where('status', '1')->orderBy('created_at', 'desc')->get();
        // dd($users);
        return view('admins.body.users.active-users', compact('users'));
    }
    public function bannedUsers()
    {
        $users = DB::table('users')->select('id', 'first_name', 'last_name', 'username', 'email', 'phone', 'status', 'created_at')->where('is_seller', 0)->where('status', '0')->orderBy('created_at', 'desc')->get();;
        // dd($users);
        return view('admins.body.users.banned-users', compact('users'));
    }
    public function emailUsers()
    {
        $users = User::select('email')->where('status', '1')->get();
        return view('admins.body.users.email-to-all-users', compact('users'));
    }
    public function allSeller()
    {
        $sellers = DB::table('users')->select('id', 'first_name', 'last_name', 'username', 'email', 'phone', 'status', 'created_at')->where('is_seller', 1)->orderBy('created_at', 'desc')->get();
        return view('admins.body.sellers.all-sellers', compact('sellers'));
    }
    public function activeSeller()
    {
        $sellers = DB::table('users')->select('id', 'first_name', 'last_name', 'username', 'email', 'phone', 'status', 'created_at')->where('is_seller', 1)->where('status', '1')->orderBy('created_at', 'desc')->get();
        return view('admins.body.sellers.active-sellers', compact('sellers'));
    }
    public function bannedSeller()
    {
        $sellers = DB::table('users')->select('id', 'first_name', 'last_name', 'username', 'email', 'phone', 'status', 'created_at')->where('is_seller', 1)->where('status', '0')->orderBy('created_at', 'desc')->get();
        // dd($sellers);
        return view('admins.body.sellers.banned-sellers', compact('sellers'));
    }
    public function emailSeller()
    {
        $sellers = User::select('email')->where('status', '1')->get();
        return view('admins.body.sellers.email-to-all-sellers', compact('sellers'));
    }
    public function emailToSubscribers()
    {
        $subscribers = User::select('email')->where('status', '1')->get();
        return view('admins.body.subscribers', compact('subscribers'));
    }
    public function changeUserStatus(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->status == 0) {
            $user->status = 1;
            $update = $user->update();
        } else {
            $user->status = 0;
            $update = $user->update();
        }
        if ($update) {
            return redirect()->back()->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('fail', 'User updated  failed!');
        }
    }
    public function  viewUser(Request $request, $id)
    {
        $user = User::find($id);
        return view('admins.body.users.profile', compact('user'));
    }
    public function  updateUser(Request $request, $id)
    {
        $request->validate([
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



        $user = User::find($id);
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
    public function  deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        $delete =  $user->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'User deleted  failed!');
        }
    }
    public function  changeSellerStatus(Request $request, $id)
    {
        $seller = User::find($id);
        // dd($sellers);
        if ($seller->status == 0) {
            $seller->status = 1;
            $update = $seller->update();
        } else {
            $seller->status = 0;
            $update = $seller->update();
        }
        if ($update) {
            return redirect()->back()->with('success', 'Seller updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Seller updated  failed!');
        }
    }
    public function  viewSeller(Request $request, $id)
    {
        $seller = User::find($id);
        return view('admins.body.sellers.profile', compact('seller'));
    }
    public function  updateSeller(Request $request, $id)
    {
        $request->validate([
            'gender' => 'required',
            // 'wallet_shipment' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required|numeric',
            'country' => 'required',
        ]);
        $user = User::find($id);
        $user->gender = $request->gender;
        $user->wallet_shipment = $request->wallet_shipment;
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
            return redirect()->back()->with('success', 'Seller updated successfully');
        } else {
            return redirect()->back()->with('fail', 'seller update failed');
        }
    }
    public function  deleteSeller(Request $request, $id)
    {
        $seller = User::find($id);
        $delete = $seller->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Seller deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Seller deleted  failed!');
        }
    }
    public function generalSettings()
    {
        $settings = Setting::first();
        // dd($settings);
        return view('admins.body.general-settings', compact('settings'));
    }
    public function updateGeneralSettings(Request $request, $id)
    {
        // dd($request->file('logo'));
        if (($request->file('logo')) != null) {
            $request->validate([
                'logo' => 'required|mimes:jpg,jpeg,png',
                'title' => 'required',
                'trademark' => 'required',
                'product_button' => 'required',
            ]);
            $image = $request->file('logo');
            $path = 'logo/';
            $new_logo_name = 'LIMG' . date('YmdHis') . uniqid() . '.jpg';
            $move = $image->move($path, $new_logo_name);
            if (!$move) {
                return redirect()->back()->with('fail', 'update logo has been failed!');
            } else {
                $settingInfo = setting::find($id);
                $settingImg = $settingInfo->logo;
                if ($settingImg != '') {
                    unlink($path . $settingImg);
                }
                $settings = setting::find($id);
                $settings->logo = $new_logo_name;
                $settings->title = $request->title;
                $settings->trademark = $request->trademark;
                $settings->product_button = $request->product_button;
                $Save = $settings->update();
                if ($Save) {
                    return redirect()->back()->with('success', 'Settings has been updated successfully!');
                } else {
                    return redirect()->back()->with('fail', 'update setting has been failed!');
                }
            }
        } else {
            $request->validate([
                'title' => 'required',
                'trademark' => 'required',
                'product_button' => 'required',
            ]);
            $settings = setting::find($id);
            $settings->title = $request->title;
            $settings->trademark = $request->trademark;
            $settings->product_button = $request->product_button;
            $Save = $settings->update();
            if ($Save) {
                return redirect()->back()->with('success', 'Settings has been updated successfully!');
            } else {
                return redirect()->back()->with('fail', 'update setting has been failed!');
            }
        }
    }
    public function createCountry(Request $request)
    {
        $request->validate([
            'country' => 'required',
        ]);
        $country = new Country;
        $country->name = $request->country;
        $Save = $country->save();
        if ($Save) {
            return redirect()->back()->with('success', 'Country created successfully!');
        } else {
            return redirect()->back()->with('fail', 'Country create failed!');
        }
    }
    public function viewCountry()
    {
        $countries = Country::all();
        return view('admins.body.countries', $countries);
    }
    public function updateCountry(Request $request, $id)
    {
        $request->validate([
            'country' => 'required',
        ]);
        $country = Country::find($id);
        $country->name = $request->country;
        $Save = $country->update();
        if ($Save) {
            return redirect()->back()->with('success', 'Country updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'Country update failed!');
        }
    }
    public function deleteCountry($id)
    {
        $country = Country::find($id);
        $Delete = $country->delete();

        if ($Delete) {
            return redirect()->back()->with('success', 'Country deleted successfully!');
        } else {
            return redirect()->back()->with('fail', 'Country delete failed!');
        }
    }
    public function howItWorks()
    {
        return view('admins.body.how-it-works');
    }
    public function updateHowItWorks(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'summernote' => 'required',
        ]);
        $works = setting::find($request->id);
        $works->how_it_works = $request->summernote;
        $update = $works->update();
        if ($update) {
            return redirect()->back()->with('success', 'Settings has been updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'update setting has been failed!');
        }
    }
    public function FAQ()
    {
        return view('admins.body.faq');
    }
    public function updateFAQ(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'summernote' => 'required',
        ]);
        $works = setting::find($request->id);
        $works->faq = $request->summernote;
        $update = $works->update();
        if ($update) {
            return redirect()->back()->with('success', 'Settings has been updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'update setting has been failed!');
        }
    }
    public function contactUs()
    {
        return view('admins.body.contact-us');
    }
    public function updateContactUs(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'summernote' => 'required',
        ]);
        $works = setting::find($request->id);
        $works->contact_us = $request->summernote;
        $update = $works->update();
        if ($update) {
            return redirect()->back()->with('success', 'Settings has been updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'update setting has been failed!');
        }
    }
    public function aboutUs()
    {
        return view('admins.body.about-us');
    }
    public function updateAboutUs(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'summernote' => 'required',
        ]);
        $works = setting::find($request->id);
        $works->about_us = $request->summernote;
        $update = $works->update();
        if ($update) {
            return redirect()->back()->with('success', 'Settings has been updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'update setting has been failed!');
        }
    }
    public function optimize()
    {
        $cache = Artisan::call('optimize:clear');
        if ($cache) {
            return back()->with('success', 'Cache cleared successfully');
        } else {
            return back()->with('fails', 'Cache cleared failed!');
        }
    }
    public function updatePassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:30|different:new_Password',
            'new_Password' => 'required|min:8|max:30',
            'confirm_Password' => 'required|min:8|max:30|same:new_Password',
        ]);

        $cred = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($cred)) {

            $userPassword = Admin::find(Auth::guard('admin')->user()->id);
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
    public function winner()
    {

        $ProductWinner = DB::table('winners')->join('products', 'winners.product_id', '=', 'products.id')->join('users', 'products.seller_id', '=', 'users.id')->join('users as buyer', 'winners.user_id', '=', 'buyer.id')->select('products.id as p_id' , 'products.product_name' , 'products.low_qual_img' , 'products.product_unique_id' , 'buyer.id as buyer_id' , 'buyer.username as buyer_username' , 'buyer.email as buyer_email' , 'users.id as seller_id' , 'users.username as seller_username' , 'users.email as seller_email', 'products.start_price' ,  'winners.bid_amount')->orderBy('products.created_at', 'desc')->get();

        // dd($ProductWinner );
        return view('admins.body.wining', compact('ProductWinner') );
    }
    public function orderHistory()
    {
        $ProductDispatched = DB::table('item_dispatched_orders')->join('users', 'item_dispatched_orders.buyer_id', '=', 'users.id')->join('users as seller', 'item_dispatched_orders.seller_id', '=', 'seller.id')->join('products', 'item_dispatched_orders.product_id', '=', 'products.id')->join('dispatched_statuses', 'item_dispatched_orders.status_id', '=', 'dispatched_statuses.id')->select('item_dispatched_orders.id', 'item_dispatched_orders.winner_id','item_dispatched_orders.is_completed', 'item_dispatched_orders.buyer_completed', 'products.id as p_id' ,'products.product_name', 'products.low_qual_img', 'products.product_unique_id', 'users.id as buyer_id', 'users.username as buyer_username', 'users.email as buyer_email', 'seller.id as seller_id', 'seller.username as seller_username', 'seller.email as seller_email', 'dispatched_statuses.status')->orderBy('products.created_at', 'desc')->get();

        // dd($ProductDispatched);

        return view('admins.body.dispatch', compact('ProductDispatched') );
    }
    public function dispatchStatus()
    {
        $status = Dispatched_status::all();
        // dd($status);
        return view('admins.body.manage-status',compact('status'));
    }
    public function createDispatchStatus(Request $request)
    {
        $status = new Dispatched_status;
        $status->status = $request->status;
        $saved = $status->save();
        if ($saved) {
            return redirect()->back()->with('success', 'Dispatched status created successfully!');
        } else {
            return redirect()->back()->with('fail', 'Dispatched status create failed!');
        }
    }
    public function updateDispatchStatus(Request $request,$id)
    {
        $status = Dispatched_status::find($id);
        $status->status = $request->status;
        $update = $status->update();
        if ($update) {
            return redirect()->back()->with('success', 'Dispatched status updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'Dispatched status update failed!');
        }
    }
    public function deleteDispatchStatus($id)
    {
        $status = Dispatched_status::find($id);
        $delete = $status->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Dispatched status deleted successfully!');
        } else {
            return redirect()->back()->with('fail', 'Dispatched status delete failed!');
        }
    }
    public function logout()
    {
        // dd(Auth::logout());
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
