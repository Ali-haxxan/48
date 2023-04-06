<?php

namespace App\Http\Controllers;

use Str;
use Carbon\Carbon;
use App\Models\Bid;
use App\Models\User;
use App\Models\Seller;
use App\Models\Auction;
use App\Models\Counter;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Watchlist;
use App\Models\categories;
use App\Models\Subscriber;
use App\Models\VerifyUser;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ProductFeatures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Validator;
use PHPUnit\TextUI\XmlConfiguration\Group;

class UserSellerLoginReg extends Controller
{
    public function subCategory($id)
    {
        // $subCategory = SubCategory::find($id);
        // $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');
        // $DateYesterday = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');
        // $product = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'catalogenrs.cataloge_nrs', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.sub_category', '=', $id)->where('products.start_at', '>', $DateYesterday)->where('products.status', 3)->where('products.sub_category', $id)->orderBy('products.created_at', 'desc')->groupBy('product_id')->get();
        // $subCat = $subCategory->Sub_Category;
        // // dd($subCat,$product);
        // return view('48-h/body/search', compact('product', 'subCat'));

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }
        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');
        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');
        $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateToday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");
        $yesterdayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateYesterday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");
        $TodayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'catalogenrs.cataloge_nrs', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.start_at', $DateToday)->where('bids.created_at', '>', $expiredDay)->where('products.sub_category', '=', $id)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->take(2)->get();
        // dd($yesterdayBids, $TodayAuctionProduct);
        $TodayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateToday)->where('products.sub_category', '=', $id)->first();
        $yestardayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'catalogenrs.cataloge_nrs', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.start_at', $DateYesterday)->where('bids.created_at', '>', $expiredDay)->where('products.sub_category', '=', $id)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->take(2)->get();
        $yestardayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateYesterday)->where('products.sub_category', '=', $id)->first();
        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        $timeFirst  = strtotime($Ynow);
        if ($TodayAuctionProducts == null) {
            $TtimeSecond = 0;
        } else {
            $TEndTime = Carbon::parse($TodayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');
            $TtimeSecond = strtotime($TEndTime);
        }
        // $TSeconds = $TtimeSecond - $timeFirst;
        // dd($Ynow, $TEndTime, $timeFirst, $TtimeSecond, $TSeconds);
        if ($timeFirst <= $TtimeSecond) {
            $TSeconds = $TtimeSecond - $timeFirst;
            // $YTime = $YEndTime - $Ynow;
        } else {
            $TSeconds = '';
        }
        //yesterday timer
        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        if ($yestardayAuctionProducts == null) {
            $timeSecond = 0;
        } else {
            $YEndTime = Carbon::parse($yestardayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');
            $timeSecond = strtotime($YEndTime);
        }

        // $YTime = '';
        if ($timeFirst <= $timeSecond) {

            $Seconds = $timeSecond - $timeFirst;
            // $YTime = $YEndTime - $Ynow;
        } else {
            $Seconds = '';
        }
        // dd($id);
        $featureName = subCategory::find($id);
        // $features = Feature::all()->where('category_id', $id);
        $data = [
            'TodayAuctionProduct' => $TodayAuctionProduct,
            'yestardayAuctionProduct' => $yestardayAuctionProduct,
            'TodayAuctionProducts' => $TodayAuctionProducts,
            'yestardayAuctionProducts' => $yestardayAuctionProducts,
            // 'auction' => $auction,
            'YSeconds' => $Seconds,
            'TSeconds' => $TSeconds,
            'todayBids' => $todayBids,
            'yesterdayBids' => $yesterdayBids,
            'featuresName' => $featureName->Sub_Category,
            'usr' => $usr,
            'id' => $id,
        ];
        return view('48-h.subcategory', $data);
    }
    public function SubProductsToday($id)
    {
        // dd($id);
        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');

        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateToday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $TodayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'users.id', '=', 'ratings.seller_id')->leftJoin('sub_categories', 'products.sub_category', '=', 'sub_categories.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.year', 'products.catalogue', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), DB::raw('round(AVG(ratings.rating),0) as rating'), 'sub_categories.Sub_Category', 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'catalogenrs.cataloge_nrs', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'users.username')->where('products.start_at', $DateToday)->where('products.sub_category', $id)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->get();
        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        $TodayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateToday)->first();

        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        $timeFirst  = strtotime($Ynow);
        if ($TodayAuctionProducts == null) {
            $TtimeSecond = 0;
        } else {
            $TEndTime = Carbon::parse($TodayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');
            $TtimeSecond = strtotime($TEndTime);
        }

        // $TSeconds = $TtimeSecond - $timeFirst;
        // dd($Ynow, $TEndTime, $timeFirst, $TtimeSecond, $TSeconds);
        if ($timeFirst <= $TtimeSecond) {

            $TSeconds = $TtimeSecond - $timeFirst;
            // $YTime = $YEndTime - $Ynow;
        } else {
            $TSeconds = '';
        }


        $data = [
            'TodayAuctionProduct' => $TodayAuctionProduct,
            'todayBids' => $todayBids,
            'TSeconds' => $TSeconds,
            'usr' => $usr,
        ];
        // dd($data);
        return view('48-h.body.products24', $data);
    }
    public function SubProductsYesterday($id)
    {
        // dd($id);
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');

        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $yesterdayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateYesterday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $yestardayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id', 'catalogenrs.cataloge_nrs', 'products.product_unique_id', 'products.catalogue', 'products.catlogue_no', 'products.year', DB::raw('round(AVG(ratings.rating),0) as rating'), DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.start_at', $DateYesterday)->where('products.sub_category', $id)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->get();

        //yesterday timer
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');
        $yestardayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateYesterday)->first();

        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        $timeFirst  = strtotime($Ynow);
        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        if ($yestardayAuctionProducts == null) {
            $timeSecond = 0;
        } else {
            $YEndTime = Carbon::parse($yestardayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');
            $timeSecond = strtotime($YEndTime);
        }
        // $YTime = '';
        if ($timeFirst <= $timeSecond) {
            $Yseconds = $timeSecond - $timeFirst;
        } else {
            $Yseconds = '';
        }

        $data = [
            'yestardayAuctionProduct' => $yestardayAuctionProduct,
            'yesterdayBids' => $yesterdayBids,
            'YSeconds' => $Yseconds,
            'usr' => $usr,
        ];
        // dd($data);
        return view('48-h.body.products48h', $data);
    }
    public function search(Request $request)
    {
        $DateYesterday = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');
        // $today = Carbon::now('Europe/London')->format('Y-m-d');
        // $findProduct = Product::find(109);
        // $findProducts = DB::table('products')->select('start_price')->where('id', 108)->first();

        // dd($findProduct);

        $request->validate([
            'product_name' => 'required',
        ]);
        $DateYesterday = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');
        // $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        $product_name = $request->product_name;

        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at > '$expiredDay'  AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");
        // dd($todayBids);

        $product = $TodayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'catalogenrs.cataloge_nrs', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.product_name', 'LIKE', '%' . $product_name . '%')->where('products.start_at', '>', $expiredDay)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->take(2)->get();
        // dd($product);

        return view('48-h/body/search', compact('product', 'todayBids', 'usr'));
    }
    public function watchList()
    {

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }
        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at > '$expiredDay'  AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $watchListProduct = DB::table('products')->join('watchlists', 'products.id', '=', 'watchlists.product_id')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'catalogenrs.cataloge_nrs', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.status', '=', 3)->where('bids.created_at', '>', $expiredDay)->where('watchlists.user_id', $usr)->orderBy('products.created_at', 'desc')->groupBy('watchlists.product_id', 'ratings.seller_id')->take(2)->get();

        $data = [
            'TodayAuctionProduct' => $watchListProduct,
            'todayBids' => $todayBids,
            'usr' => $usr,
        ];
        // dd($data);
        return view('48-h.body.watchlist-products', $data);
    }
    public function addWatchList($id)
    {

        $find = DB::table('watchlists')->select('product_id')->where('user_id',  Auth::guard('web')->user()->id)->where('product_id', $id)->first();
        // dd($find);
        if ($find == null) {
            $Watchlist = new Watchlist;
            $Watchlist->user_id = Auth::guard('web')->user()->id;
            $Watchlist->product_id = $id;
            $saved = $Watchlist->save();
            if ($saved) {
                return redirect()->back()->with('asuccess', 'Product added in watchlist Successfully!');
            } else {
                return redirect()->back()->with('asuccess', 'Product add in watchlist failed!');
            }
        } else {
            return redirect()->back()->with('asuccess', 'Product already exist in watchlist!');
        }
    }
    public function SellerProducts($id)
    {
        // $DateToday = Carbon::now('Europe/London')->format('Y-m-d');

        // $Dateyesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');

        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }
        // ->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')'catalogenrs.cataloge_nrs',

        $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at  > '$expiredDay' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $TodayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id', 'catalogenrs.cataloge_nrs',  'products.product_unique_id', 'products.catalogue', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.status', '=', 3)->where('products.seller_id', $id)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->get();

        $data = [
            'TodayAuctionProduct' => $TodayAuctionProduct,
            'todayBids' => $todayBids,
            'usr' => $usr,
        ];
        // dd($data);
        return view('48-h.body.seller-products', $data);
    }
    public function ProductsToday($id)
    {
        // dd($id);
        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');

        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateToday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $TodayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'users.id', '=', 'ratings.seller_id')->leftJoin('sub_categories', 'products.sub_category', '=', 'sub_categories.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.year', 'products.catalogue', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), DB::raw('round(AVG(ratings.rating),0) as rating'), 'sub_categories.Sub_Category', 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'catalogenrs.cataloge_nrs', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'users.username')->where('products.start_at', $DateToday)->where('products.category_id', $id)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->get();
        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        $TodayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateToday)->first();

        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        $timeFirst  = strtotime($Ynow);
        if ($TodayAuctionProducts == null) {
            $TtimeSecond = 0;
        } else {
            $TEndTime = Carbon::parse($TodayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');
            $TtimeSecond = strtotime($TEndTime);
        }

        // $TSeconds = $TtimeSecond - $timeFirst;
        // dd($Ynow, $TEndTime, $timeFirst, $TtimeSecond, $TSeconds);
        if ($timeFirst <= $TtimeSecond) {

            $TSeconds = $TtimeSecond - $timeFirst;
            // $YTime = $YEndTime - $Ynow;
        } else {
            $TSeconds = '';
        }


        $data = [
            'TodayAuctionProduct' => $TodayAuctionProduct,
            'todayBids' => $todayBids,
            'TSeconds' => $TSeconds,
            'usr' => $usr,
        ];
        // dd($data);
        return view('48-h.body.products24', $data);
    }
    public function ProductsYesterday($id)
    {
        // dd($id);
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');

        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $yesterdayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateYesterday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $yestardayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id', 'catalogenrs.cataloge_nrs', 'products.product_unique_id', 'products.catalogue', 'products.catlogue_no', 'products.year', DB::raw('round(AVG(ratings.rating),0) as rating'), DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.start_at', $DateYesterday)->where('products.category_id', $id)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->get();

        //yesterday timer
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');
        $yestardayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateYesterday)->first();

        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        $timeFirst  = strtotime($Ynow);
        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        if ($yestardayAuctionProducts == null) {
            $timeSecond = 0;
        } else {
            $YEndTime = Carbon::parse($yestardayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');
            $timeSecond = strtotime($YEndTime);
        }
        // $YTime = '';
        if ($timeFirst <= $timeSecond) {
            $Yseconds = $timeSecond - $timeFirst;
        } else {
            $Yseconds = '';
        }

        $data = [
            'yestardayAuctionProduct' => $yestardayAuctionProduct,
            'yesterdayBids' => $yesterdayBids,
            'YSeconds' => $Yseconds,
            'usr' => $usr,
        ];
        // dd($data);
        return view('48-h.body.products48h', $data);
    }
    public function bidProducts($id)
    {
        // dd($id);
        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');
        $ExpireDate = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');
        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $bidCount = DB::table('bids')->where('product_id', '=', $id)->where('user_id', '!=', null)->where('created_at', '>', $ExpireDate)->count();
        $maxBid = DB::table('bids')->where('product_id', $id)->max('amount');


        $Product = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('categories', 'products.category_id', '=', 'categories.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->join('bids', 'bids.product_id', '=', 'products.id')->select('categories.category', 'products.id', 'products.catlogue_no', 'catalogenrs.cataloge_nrs', 'countries.name', 'products.product_name', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_unique_id', 'products.features', 'products.start_price', 'products.feature_image', 'products.year', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.image', 'products.description', 'products.seller_id', 'products.country', 'products.sub_category', 'products.seller_id', 'users.username')->where('products.id', $id,)->where('bids.user_id', '!=', null)->where('bids.created_at', '>', $ExpireDate)->groupBy('ratings.seller_id')->first();
        // dd($Product, $id);
        // dd($Product, $bidCount, $maxBid, $DateToday, $ExpireDate);
        $Features = DB::table('product_features')->join('features', 'product_features.feature_id', '=', 'features.id')->select('features.feature', 'features.description')->where('product_features.product_id', $id)->get();
        // foreach ($Product as $Products) {
        $seller =  $Product->seller_id;
        // }
        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at  > '$expiredDay' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $SellerProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'products.year',  'catalogenrs.cataloge_nrs', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.product_unique_id', 'countries.name', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'products.country', 'products.sub_category',  'users.username')->where('products.status', '=', 3)->where('products.seller_id', $seller)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->get();

        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');

        $ProductTime = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('bids', 'bids.product_id', '=', 'products.id')->select('categories.category', 'products.id', 'products.catlogue_no', 'products.product_name',  DB::raw('MAX(bids.amount) as max_bid'), 'products.product_unique_id', 'products.start_price', 'products.start_at', 'products.description', 'products.image', 'products.seller_id', 'products.country')->where('products.id', $id)->first();

        if ($ProductTime == null) {
            $TtimeSecond = 0;
        } else {
            $TEndTime = Carbon::parse($ProductTime->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');

            $TtimeSecond = strtotime($TEndTime);
        }
        $Tnow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        $timeFirst  = strtotime($Tnow);

        if ($timeFirst <= $TtimeSecond) {

            $TSeconds = $TtimeSecond - $timeFirst;
            // $YTime = $YEndTime - $Ynow;
        } else {
            $TSeconds = '';
        }
        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        // dd($Product, $Features, $SellerProduct, $todayBids, $bidCount, $TSeconds, $usr);
        return view('48-h.body.bid', compact('Product', 'Features', 'SellerProduct', 'todayBids', 'bidCount', 'TSeconds', 'usr'));
    }
    public function view(Request $request)
    {

        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $ip = $request->getClientIp();
        $visit_date = Carbon::now()->format('Y-m-d');

        $date = date('Y-m-d h:i:sa');
        // dd($visit_date);
        $exist = DB::table('counters')->where('ip', $ip)->first();
        // dd($exist);
        if ($exist == null) {
            $count = new Counter;
            $count->ip = $ip;
            $count->visit_date = $visit_date;
            $count->save();
        } else {
            $id = $exist->id;
            $count = Counter::find($id);
            $count->visit_date = $visit_date;
            $count->update();
        }
        $todayVistor = Counter::where('visit_date', $visit_date)->count();
        $allVisitor = Counter::all()->count();
        $buyer = User::all()->count();
        $sellers = Seller::all()->count();
        $users = $buyer + $sellers;

        // $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        // // $TodayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateToday)->first();
        // $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');
        // // $yestardayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateYesterday)->first();

        // $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        // $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateToday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        // $yesterdayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateYesterday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        // $TodayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.start_at', $DateToday)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->take(2)->get();
        // // dd($yesterdayBids, $TodayAuctionProduct);


        // $yestardayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.start_at', $DateYesterday)->where('bids.created_at', '>', $expiredDay)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->take(2)->get();



        // $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        // $timeFirst  = strtotime($Ynow);
        // if ($TodayAuctionProducts == null) {
        //     $TtimeSecond = 0;
        // } else {
        //     $TEndTime = Carbon::parse($TodayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');
        //     $TtimeSecond = strtotime($TEndTime);
        // }

        // $TSeconds = $TtimeSecond - $timeFirst;
        // dd($Ynow, $TEndTime, $timeFirst, $TtimeSecond, $TSeconds);
        // if ($timeFirst <= $TtimeSecond) {

        //     $TSeconds = $TtimeSecond - $timeFirst;
        //     // $YTime = $YEndTime - $Ynow;
        // } else {
        //     $TSeconds = '';
        // }
        //yesterday timer
        // $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        // if ($yestardayAuctionProducts == null) {
        //     $timeSecond = 0;
        // } else {
        //     $YEndTime = Carbon::parse($yestardayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');
        //     $timeSecond = strtotime($YEndTime);
        // }
        // // $YTime = '';
        // if ($timeFirst <= $timeSecond) {
        //     $Yseconds = $timeSecond - $timeFirst;
        // } else {
        //     $Yseconds = '';
        // }

        // dd($Seconds, $timeFirst, $timeSecond, $Ynow, $YEndTime,);
        // $upcoming = Carbon::now('Europe/London')->addDays(1)->format('Ymd');
        // $auction = DB::table('auctions')->where('auction', $upcoming)->select('auction')->first();
        // dd($auction);

        $data = [
            'todayVisitors' => $todayVistor,
            'allVisitors' => $allVisitor,
            'users' => $users,
            // 'TodayAuctionProduct' => $TodayAuctionProduct,
            // 'yestardayAuctionProduct' => $yestardayAuctionProduct,
            // 'TodayAuctionProducts' => $TodayAuctionProducts,
            // 'yestardayAuctionProducts' => $yestardayAuctionProducts,
            // 'auction' => $auction,
            // 'YSeconds' => $Yseconds,
            // 'TSeconds' => $TSeconds,
            // 'todayBids' => $todayBids,
            // 'yesterdayBids' => $yesterdayBids,
            'usr' => $usr,
        ];
        // dd($data);
        return view('48-h.body.home', $data);
    }
    public function categoryProducts(Request $request, $id)
    {
        $usr = false;
        if (Auth::guard('web')->user() == true) {
            $usr = Auth::guard('web')->user()->id;
        }

        $DateToday = Carbon::now('Europe/London')->format('Y-m-d');
        $DateYesterday = Carbon::now('Europe/London')->addDays(-1)->format('Y-m-d');

        $expiredDay = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');

        $todayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateToday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $yesterdayBids = DB::select("SELECT b.user_id,b.product_id AS id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$DateYesterday' AND lb.user_id = '$usr' GROUP BY lb.product_id )AND b.created_at > '$expiredDay' ");

        $TodayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'catalogenrs.cataloge_nrs', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.product_unique_id', 'products.start_price', 'products.features', 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.start_at', $DateToday)->where('bids.created_at', '>', $expiredDay)->where('products.category_id', '=', $id)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->take(2)->get();
        // dd($yesterdayBids, $TodayAuctionProduct);

        $TodayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateToday)->where('products.category_id', '=', $id)->first();

        $yestardayAuctionProduct = DB::table('products')->join('countries', 'products.country', '=', 'countries.id')->join('users', 'products.seller_id', '=', 'users.id')->leftJoin('ratings', 'ratings.seller_id', '=', 'users.id')->leftJoin('catalogenrs', 'products.catalogue', '=', 'catalogenrs.id')->leftJoin('bids', 'bids.product_id', '=', 'products.id')->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category',  'products.id',  'products.product_unique_id', 'products.catalogue', 'catalogenrs.cataloge_nrs', 'products.catlogue_no', DB::raw('MAX(bids.amount) as max_bid'), 'products.product_name', 'products.product_unique_id', 'products.start_price', 'products.features', DB::raw('round(AVG(ratings.rating),0) as rating'), 'products.feature_image', 'products.description', 'products.image', 'products.seller_id', 'countries.name', 'products.sub_category',  'users.username')->where('products.start_at', $DateYesterday)->where('bids.created_at', '>', $expiredDay)->where('products.category_id', '=', $id)->orderBy('products.created_at', 'desc')->groupBy('product_id', 'ratings.seller_id')->take(2)->get();

        $yestardayAuctionProducts = DB::table('products')->select('products.start_at')->where('products.start_at', $DateYesterday)->where('products.category_id', '=', $id)->first();

        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        $timeFirst  = strtotime($Ynow);
        if ($TodayAuctionProducts == null) {
            $TtimeSecond = 0;
        } else {
            $TEndTime = Carbon::parse($TodayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');

            $TtimeSecond = strtotime($TEndTime);
        }

        // $TSeconds = $TtimeSecond - $timeFirst;
        // dd($Ynow, $TEndTime, $timeFirst, $TtimeSecond, $TSeconds);
        if ($timeFirst <= $TtimeSecond) {

            $TSeconds = $TtimeSecond - $timeFirst;
            // $YTime = $YEndTime - $Ynow;
        } else {
            $TSeconds = '';
        }

        //yesterday timer
        $Ynow = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        if ($yestardayAuctionProducts == null) {
            $timeSecond = 0;
        } else {
            $YEndTime = Carbon::parse($yestardayAuctionProducts->start_at)->addDays(2)->timezone('Europe/London')->format('Y-m-d');

            $timeSecond = strtotime($YEndTime);
        }



        // $YTime = '';
        if ($timeFirst <= $timeSecond) {

            $Seconds = $timeSecond - $timeFirst;
            // $YTime = $YEndTime - $Ynow;
        } else {
            $Seconds = '';
        }
        // dd($id);
        $featureName = Categories::find($id);
        // $features = Feature::all()->where('category_id', $id);
        $data = [
            'TodayAuctionProduct' => $TodayAuctionProduct,
            'yestardayAuctionProduct' => $yestardayAuctionProduct,
            'TodayAuctionProducts' => $TodayAuctionProducts,
            'yestardayAuctionProducts' => $yestardayAuctionProducts,
            // 'auction' => $auction,
            'YSeconds' => $Seconds,
            'TSeconds' => $TSeconds,
            'todayBids' => $todayBids,
            'yesterdayBids' => $yesterdayBids,
            'featuresName' => $featureName->category,
            'usr' => $usr,
            'id' => $id,
        ];
        // dd($data);
        return view('48-h.features', $data);
    }
    public function create(Request $request)
    {
        // validate the request
        $request->validate([
            'user_type' => 'required',
            'gender' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required|numeric',
            'country' => 'required',
            'user_password' => 'required|min:8|max:30',
            'confirm_password' => 'required|min:8|max:30|same:user_password',
            'term_condition' => 'required',
        ]);

        // dd($request);


        if ($request->user_type == 1) {

            $request->validate([
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|numeric|unique:users,phone|min:10',
            ]);
            $fname = $request->first_name;
            $lname = $request->surname;
            $flname = $fname . $lname;
            $username = strtolower($flname) . rand(999, 99999);

            $user = new User();
            $user->gender = $request->gender;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->postal_code = $request->postal_code;
            $user->country = $request->country;
            $user->password = Hash::make($request->user_password);
            $saveUser = $user->save();
            event(new Registered($user));

            // $last_id = $user->id;
            // $random = rand(99999, 999999);
            // $token = $last_id . hash('sha256', $random);
            // $VerifyURL = route('user.verify', ['$token' => $token, 'service' => 'Email_verification']);
            // VerifyUser::create([
            //     'user_id' => $user->id,
            //     'token' => $token,
            // ]);
            // $message = 'Dear <b>' . $request->first_name . '' . $request->last_name . '</b>';
            // $message .= 'Thanks for Register your account, We have to just verify your account to complete your account setting up.';
            // $email_data = [
            //     'recipient' => $request->email,
            //     'fromEmail' => $request->email,
            //     'fromName' => $request->name,
            //     'subject' => 'email verification',
            //     'body' => $message,
            //     'actionLink' => $VerifyURL,
            // ];
            // Mail::send('email_template', $email_data, function ($message) use ($email_data) {
            //     $message->to($email_data['recipient'])->from($email_data['fromEmail'], $email_data['fromName'])->subject($email_data['subject']);
            // });
            // event(new Registered($user));
            if ($saveUser) {
                return redirect()->back()->with('success', 'You need to verify your account, we have sent an activation link, please check your email');
            } else {
                return redirect()->back()->with('fail', 'Buyer Registration failed');
            }
        }

        if ($request->user_type == 2) {

            $request->validate([
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|numeric|min:10|unique:users,phone',
            ]);
            $fname = $request->first_name;
            $lname = $request->surname;
            $flname = $fname . $lname;
            $username = strtolower($flname) . rand(999, 99999);

            $seller = new User();
            $seller->is_seller = 1;
            $seller->gender = $request->gender;
            $seller->wallet_shipment = $request->wallet_shipment;
            $seller->first_name = $request->first_name;
            $seller->last_name = $request->last_name;
            $seller->username = $username;
            $seller->email = $request->email;
            $seller->phone = $request->phone;
            $seller->address = $request->address;
            $seller->city = $request->city;
            $seller->state = $request->state;
            $seller->postal_code = $request->postal_code;
            $seller->country = $request->country;
            $seller->password = Hash::make($request->user_password);
            $saveSeller = $seller->save();
            event(new Registered($seller));
            if ($saveSeller) {
                return redirect()->back()->with('success', 'You need to verify your account, we have sent an activation link, please check your inbox!');
            } else {
                return redirect()->back()->with('fail', 'You Registered as Seller failed!');
            }
        }
    }
    public function resetPassword(Request $request)
    {
        $request->validate(
            [
                'user_type' => 'required',
                'email' => 'required|email',
            ]
        );
        if ($request->user_type == 1) {
            //validate request
            $request->validate(
                [
                    'email' => 'required|email|exists:users,email',
                ],
                [
                    'email.exists' => 'This email is not exists',
                ]
            );
        }
        if ($request->user_type == 2) {
            //validate request
            $request->validate(
                [
                    'email' => 'required|email|exists:users,email',
                ],
                [
                    'email.exists' => 'This email is not exists',
                ]
            );
        }
    }
    public function check(Request $request)
    {
        $request->validate(
            [
                'user_type' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|max:30',
            ]
        );
        if ($request->user_type == 1) {
            //validate request
            $request->validate(
                [
                    'email' => 'required|email|exists:users,email',
                    'password' => 'required|min:8|max:30',
                ],
                [
                    'email.exists' => 'email and password is incorrect',
                ]
            );
            $Status = User::where('email', $request->email)->first();
            $check = $Status->status;
            // $verification = $Status->email_verified_at;
            // // dd($check);
            // if ($verification == null) {
            if ($check == 1) {

                $creds = $request->only('email', 'password');
                if (Auth::guard('web')->attempt($creds)) {
                    // if (Auth::guard('web')->user()->is_seller == 1) {
                    //     Auth::guard('seller')->attempt($creds);
                    // }

                    return redirect()->route('user.home');
                } else {
                    return redirect()->route('user.login')->with('fail', 'Incorrect Credentials');
                }
            } else {
                return redirect()->route('user.login')->with('fail', 'You are Blocked. You cannot Login!');
            }
            // } else {
            //     return redirect()->route('user.login')->with('fail', 'You are Blocked. You cannot Login!');
            // }
        }
        if ($request->user_type == 2) {
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
            $user = User::where('email', $request->email)->first();
            $check = $user->status;
            $isSeller = $user->is_seller;
            // $verification = $Status->email_verified_at;
            // if ($verification == null) {
            if ($check) {
                if ($isSeller == 1) {
                    $creds = $request->only('email', 'password');
                    // dd($creds);
                    if (Auth::guard('seller')->attempt($creds) && Auth::guard('web')->attempt($creds)) {
                        return redirect()->route('seller.home');
                    } else {
                        return redirect()->route('user.login')->with('fail', 'Incorrect Credentials');
                    }
                } else {
                    return redirect()->route('user.login')->with('fail', 'You are not Seller. You can only login as Buyer!');
                }
            } else {
                return redirect()->route('user.login')->with('fail', 'You are Blocked. You cannot Login!');
            }
            // } else {
            //     return redirect()->route('user.login')->with('fail', 'You are Blocked. You cannot Login!');
            // }
        }
    }
    public function Subscriber(Request $request)
    {

        // $DateYesterday = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');
        // $findProduct = DB::table('bids')->select(DB::raw('max(amount)'))->where('id', 108)->groupBy('product_id')->get();

        // $findProduct2 = Bid::where('product_id', 108)->where('created_at', '>', $DateYesterday)->max('amount');

        // dd($findProduct, $findProduct2);
        $request->validate([

            'email' => 'required|email|unique:subscribers',
        ]);
        $subscribers = new Subscriber();
        $subscribers->email = $request->email;
        $save = $subscribers->save();
        if ($save) {
            return redirect()->back()->with('asuccess', 'You Registered subscriber successfully!');
        } else {
            return redirect()->back()->with('asuccess', 'You Registered subscriber failed!');
        }
    }
    public function bid(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'bid' => 'required|numeric',
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            if (Auth::guard('web')->user() == true) {
                $product_id = $request->input('product_id');
                $bid = $request->input('bid');
                $DateYesterday = Carbon::now('Europe/London')->addDays(-3)->format('Y-m-d');
                $DateToday = Carbon::now('Europe/London')->format('Y-m-d');

                $findP = Bid::where('product_id', $product_id)->where('created_at', '>', $DateYesterday)->max('amount');
                $countProduct = Bid::where('product_id', $product_id)->where('created_at', '>', $DateYesterday)->count();

                if ($findP == null) {
                    // dd($findProduct);
                    $fProduct = Product::find($product_id);
                    $findProducts = $fProduct->start_price;
                    // $findProducts = DB::table('products')->select('start_price')->where('id', $product_id)->first();
                    if ($findProducts >= 0.30 && $findProducts <= 1 && $countProduct < 100) {
                        $price = $findProducts + 0.05;
                        if ($bid > $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be greater than ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProducts >= 1 && $findProducts < 5 && $countProduct < 100) {
                        $price = $findProducts + 0.10;
                        if ($bid > $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be greater than ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProducts >= 5 && $findProducts < 20 && $countProduct < 100) {
                        $price = $findProducts + 0.25;
                        if ($bid > $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be greater than ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProducts >= 20 && $findProducts < 50 && $countProduct < 100) {
                        $price = $findProducts + 0.50;
                        if ($bid >= $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be at least ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProducts >= 50 && $findProducts < 100 && $countProduct < 100) {
                        $price = $findProducts + 1;
                        if ($bid > $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be greater than ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProducts >= 100 && $countProduct < 100) {
                        $price = $findProducts + 2;
                        if ($bid >= $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be at least ' . $price . '!'
                            ]);
                        }
                    }
                    if ($countProduct >= 100) {
                        $price = $findProducts + 5;
                        if ($bid >= $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be at least ' . $price . '!'
                            ]);
                        }
                    }
                } else {
                    $findProduct = Bid::where('product_id', $product_id)->where('created_at', '>', $DateYesterday)->max('amount');
                    if ($findProduct >= 0.30 && $findProduct <= 1 && $countProduct < 100) {
                        $price = $findProduct + 0.05;
                        if ($bid > $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be greater than ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProduct >= 1 && $findProduct < 5 && $countProduct < 100) {
                        $price = $findProduct + 0.10;
                        if ($bid > $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be greater than ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProduct >= 5 && $findProduct < 20 && $countProduct < 100) {
                        $price = $findProduct + 0.25;
                        if ($bid > $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be greater than ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProduct >= 20 && $findProduct < 50 && $countProduct < 100) {
                        $price = $findProduct + 0.50;
                        if ($bid >= $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be at least ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProduct >= 50 && $findProduct < 100 && $countProduct < 100) {
                        $price = $findProduct + 1;
                        if ($bid > $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be greater than ' . $price . '!'
                            ]);
                        }
                    }
                    if ($findProduct >= 100 && $countProduct < 100) {
                        $price = $findProduct + 2;
                        if ($bid >= $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be at least ' . $price . '!'
                            ]);
                        }
                    }
                    if ($countProduct >= 100) {
                        $price = $findProduct + 5;
                        if ($bid >= $price) {
                            $bid = new Bid();
                            $bid->product_id = $request->input('product_id');
                            $bid->user_id = Auth::guard('web')->user()->id;
                            $bid->amount = $request->input('bid');
                            $bid->save();
                            return response()->json([
                                'status' => 200,
                                'message' => 'Product Bided  Successfully.'
                            ]);
                        } else {
                            return response()->json([
                                'status' => 201,
                                'errors' => 'Bid must be at least ' . $price . '!'
                            ]);
                        }
                    }
                }
            } else {
                // notify()->success('Please Login for Bidding!');
                return response()->json([
                    'status' => 201,
                    'errors' => 'Please Login for Bidding!'
                ]);
            }
        }
    }
}
