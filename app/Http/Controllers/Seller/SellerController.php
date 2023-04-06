<?php

namespace App\Http\Controllers\Seller;


use Image;
use Carbon\Carbon;
use App\Models\Bid;
use App\Models\User;
use App\Models\Seller;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Winner;
use App\Models\categories;
use App\Models\Item_dispatched_orders;
use App\Models\Dispatched_status;
use PharIo\Manifest\Email;
// use Intervention\Image\Image;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ProductFeatures;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class SellerController extends Controller
{
    public function orderHistory()
    {
        $status =  Dispatched_status::all();
        $seller = Auth::guard('seller')->user()->id;
        $ProductDispatched = DB::table('item_dispatched_orders')->join('users', 'item_dispatched_orders.buyer_id', '=', 'users.id')->join('products', 'item_dispatched_orders.product_id', '=', 'products.id')->select('item_dispatched_orders.id', 'item_dispatched_orders.winner_id', 'item_dispatched_orders.is_completed', 'item_dispatched_orders.status_id', 'products.id as p_id', 'products.product_name', 'products.low_qual_img', 'products.product_unique_id',   'users.email', 'users.username')->where('item_dispatched_orders.seller_id', $seller)->orderBy('products.created_at', 'desc')->get();

        // dd($ProductDispatched,$status);
        return view('Seller.body.dispatch', compact('ProductDispatched', 'status'));
    }
    public function deleteOrder($id)
    {
        // dd($id);
        $dispatch = Item_dispatched_orders::find($id);
        // dd($dispatch->winner_id);
        $winner =  Winner::find($dispatch->winner_id);
        $winner->dispatched = 0;
        $winner->update();
        $itemOrder = $dispatch->delete();
        if ($itemOrder) {
            return redirect()->back()->with('success', 'Item Dispatched deleted successfully!');
        } else {
            return redirect()->back()->with('fail', 'Item Dispatched delete failed!');
        }
    }
    public function OrderCompleted($id)
    {
        // dd($id);
        $dispatch = Item_dispatched_orders::find($id);
        $dispatch->is_completed = 1;
        $itemOrder = $dispatch->update();
        if ($itemOrder) {
            return redirect()->back()->with('success', 'Item dispatched Marked  Completed Successfully!');
        } else {
            return redirect()->back()->with('fail', 'Item dispatched Marked  Complete Failed!');
        }
    }
    public function OrderStatusUpdate(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'status' => 'required',
        ]);

        $dispatch = Item_dispatched_orders::find($id);
        $dispatch->status_id = $request->status;
        $itemOrder = $dispatch->update();
        if ($itemOrder) {
            return redirect()->back()->with('success', 'Item status Updated Successfully!');
        } else {
            return redirect()->back()->with('fail', 'Item status update Failed!');
        }
    }


    public function dashboard()
    {

        $id = Auth::guard('seller')->user()->id;
        // dd($id);
        $today = date("Y-m-d", time() - 86400);
        $yesterday = date("Y-m-d", time() - 172800);
        $widget['total_product'] = Product::where('seller_id', '=', $id)->count();
        $widget['live_count'] = Product::where('status', '=', 3)->where('seller_id', $id)->count();

        $widget['expired_count'] = DB::table('products')->where('seller_id', '=', Auth::guard('seller')->user()->id)->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category', 'products.id', 'products.live_count', 'products.product_name', 'products.product_unique_id', 'products.year', 'products.start_at', 'products.start_price', 'products.status', 'products.category_id')->where('status', null)->count();
        // dd($widget);
        return view('Seller.body.dashboard', compact('widget'));
    }
    public function allProducts()
    {

        $products = DB::table('products')->where('seller_id', '=', Auth::guard('seller')->user()->id)->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category', 'products.id', 'products.live_count', 'products.product_name', 'products.low_qual_img', 'products.start_at', 'products.low_qual_img', 'products.product_unique_id', 'products.year', 'products.created_at', 'products.start_price', 'products.status', 'products.category_id')->get();
        // dd($products);
        return view('Seller.body.product', compact('products'));
    }

    public function liveProducts()
    {

        $products = DB::table('products')->where('seller_id', '=', Auth::guard('seller')->user()->id)->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category', 'products.id', 'products.live_count', 'products.product_name', 'products.low_qual_img', 'products.product_unique_id', 'products.year', 'products.created_at', 'products.start_price', 'products.status', 'products.category_id')->where('status', 3)->get();
        // dd($products);
        return view('Seller.body.live-product', compact('products'));
    }
    public function draftProducts()
    {

        $products = DB::table('products')->where('seller_id', '=', Auth::guard('seller')->user()->id)->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category', 'products.id', 'products.live_count', 'products.product_name', 'products.low_qual_img', 'products.product_unique_id', 'products.year', 'products.created_at', 'products.start_price', 'products.status', 'products.category_id')->where('status', 4)->get();
        // dd($products);
        return view('Seller.body.draft-product', compact('products'));
    }
    public function pendingProducts()
    {

        $products = DB::table('products')->where('seller_id', '=', Auth::guard('seller')->user()->id)->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category', 'products.id', 'products.live_count', 'products.product_name', 'products.low_qual_img', 'products.product_unique_id', 'products.year', 'products.created_at', 'products.start_price', 'products.status', 'products.category_id')->where('status', 0)->get();
        // dd($products);
        return view('Seller.body.pending-product', compact('products'));
    }
    public function expiredProducts()
    {
        $expired = date("Y-m-d", time() - 172800);
        $products = DB::table('products')->where('seller_id', '=', Auth::guard('seller')->user()->id)->join('categories', 'products.category_id', '=', 'categories.id')->select('categories.category', 'products.id', 'products.live_count', 'products.product_name', 'products.low_qual_img', 'products.product_unique_id', 'products.year', 'products.created_at', 'products.start_price', 'products.status', 'products.category_id')->where('status', null)->where('live_count', '>=', 1)->get();
        // dd($products);
        return view('Seller.body.expired-product', compact('products'));
    }
    public function createProduct()
    {
        $features = Feature::all();
        $SubCategories = SubCategory::all();
        return view('Seller.body.new-product', compact('features', 'SubCategories'));
    }
    public function viewProduct($id)
    {

        $product = DB::table('products')->where('id', $id)->first();
        $Pimages = json_decode($product->image);
        // dd($Pimages, $product->image);
        $category = $product->category_id;
        $features = Feature::all()->where('category_id', $category);
        $subcategory = DB::table('sub_categories')->where('category_id', $category)->get();
        $productFeature = ProductFeatures::all()->where('product_id', $id);
        $categories = DB::table('categories')->where('id', $category)->first();


        $data = [
            'product' => $product,
            'features' => $features,
            'productFeature' => $productFeature,
            'subcategory' => $subcategory,
            'categorie' => $categories,
            'Pimages' => $Pimages,
        ];
        // dd($data);

        return view('Seller.body.view-product', $data);
    }
    public function editProduct($id, Request $request)
    {
        $Fimage = $request->file('product_feature_image');
        $image = $request->file('product_image');
        if (!empty($image)) {
            $request->validate([
                'product_image' => 'array|between:2,5',
                'product_image.*' => 'mimes:jpeg,png,jpg|max:1024',
            ]);
        }
        if (!empty($Fimage)) {
            $request->validate([
                'product_feature_image' => 'mimes:jpeg,png,jpg|max:1024',
            ]);
        }
        // dd($id, $request);
        $request->validate([
            'product_name' => 'required',
            'year' => 'required',
            // 'catalogue_nr' => 'numeric',
            'catalogue_number' => 'required',
            // 'SubCategory' => 'numeric',
            'country' => 'required',
            'start_price' => 'required',
            'start_date' => 'required',
            'features' => 'required',
            'description' => 'required',
        ]);

        $features = $request->features;


        // if ($image == true || $Fimage == true) {

        $product = Product::find($id);
        if (!empty($image)) {
            $productImage = json_decode($product->image);
            foreach ($productImage as $pImage) {
                if ($pImage == true) {
                    unlink($pImage);
                }
            }
            foreach ($image as $key => $img) {
                $path =  'Product/image/';
                $new_img_name = 'PIMG' . date('YmdHis') . uniqid()  . '.jpg';
                $last_img = $path . $new_img_name;
                $data[$key]['image'] = $last_img;
                $img->move($path, $new_img_name);
            }
            $product->image = json_encode($data);
        }
        if (!empty($Fimage)) {
            $featureProductImage = $product->feature_image;
            if ($featureProductImage == true) {
                unlink($featureProductImage);
            }
            $fimage = $request->file('product_feature_image');
            $path =  'Product/feature_image/';
            $new_img_name = 'PIMG' . date('YmdHis') . uniqid()  . '.jpg';
            $last_img = $path . $new_img_name;
            $fimage->move($path, $new_img_name);
            $product->feature_image = $last_img;
        }


        $product->product_name = $request->product_name;
        $product->year = $request->year;
        $product->country = $request->country;
        $product->sub_category = $request->SubCategory;
        $product->catalogue = $request->catalogue_nr;
        $product->catlogue_no = $request->catalogue_number;
        $product->start_at = $request->start_date;
        $product->start_price = $request->start_price;
        $product->description = $request->description;
        $update = $product->update();
        /////// delete product features /////////////////

        $productFeatures = ProductFeatures::where('product_id', $id)->delete();
        // dd($productFeatures);
        // $productFeatures->delete();

        // foreach ($productFeatures as $item) {
        //     $pid = $item->id;
        //     $productFeature = ProductFeatures::find($pid);
        //     $productFeature->delete();
        // }

        /////// End delete product features /////////////////

        /////////    update product features //////////////

        // dd($features);

        foreach ($features as $feature) {
            $productFeaturess = new ProductFeatures();
            $productFeaturess->feature_id = $feature;
            $productFeaturess->product_id = $id;
            $productFeaturess->save();
        }

        $getFeatures = DB::table('product_features')->join('features', 'product_features.feature_id', '=', 'features.id')->select('features.feature')->where('product_features.product_id', $id)->groupBy('product_features.feature_id')->orderBy('product_features.created_at', 'desc')->get();
        // dd($getFeatures);

        $featureString = "";
        if (!empty($getFeatures)) {
            foreach ($getFeatures as $key => $featur) {
                if ($key == 0) {
                    $featureString .= $featur->feature;
                } else {
                    $featureString .= ', ' . $featur->feature;
                }
            }
        }
        $product = Product::find($id);
        $product->features = $featureString;
        $product->update();

        /////////  End  update product features //////////////


        if ($update) {
            return redirect()->back()->with('success', 'Product updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Product update failed!');
        }
        // }
        // else {


        //     /////// update product /////////////////
        //     // $id = $request->product_id;
        //     $product = Product::find($id);
        //     $product->product_name = $request->product_name;
        //     $product->year = $request->year;
        //     $product->country = $request->country;
        //     $product->sub_category = $request->SubCategory;
        //     $product->catalogue = $request->catalogue_nr;
        //     $product->catlogue_no = $request->catalogue_number;
        //     $product->start_at = $request->start_at;
        //     $product->start_price = $request->start_price;
        //     $product->description = $request->description;



        //     /////// delete product features /////////////////

        //     $productFeatures = ProductFeatures::where('product_id', $id)->get();

        //     foreach ($productFeatures as $item) {
        //         $pid = $item->id;
        //         $productFeature = ProductFeatures::find($pid);
        //         $productFeature->delete();
        //     }

        //     /////// End delete product features /////////////////

        //     /////////    update product features //////////////

        //     $features = $request->features;

        //     foreach ($features as $feature) {
        //         $productFeaturess = new ProductFeatures();
        //         $productFeaturess->feature_id = $feature;
        //         $productFeaturess->product_id = $id;
        //         $productFeaturess->save();
        //     }
        //     /////////  End  update product features //////////////

        //     $update = $product->update();
        //     if ($update) {
        //         return redirect()->back()->with('success', 'Product updated successfully');
        //     } else {
        //         return redirect()->back()->with('fail', 'Product update failed!');
        //     }
        // }
    }
    public function liveRequestProduct(Request $request, $id)
    {
        $datemin = Carbon::now('Europe/London')->addDays(2)->format('Y-m-d');
        $datemax = Carbon::now('Europe/London')->addDays(12)->format('Y-m-d');


        $request->validate([
            'start_at' => 'required|date|after:' . $datemin . '|before:' . $datemax,
        ]);
        $product = Product::find($id);
        $product->status = 0;
        $product->start_at = $request->start_at;
        $update = $product->update();
        if ($update) {
            return redirect()->back()->with('success', 'Product Live Request sended successfully');
        } else {
            return redirect()->back()->with('fail', 'Product Live Request sending failed!');
        }
    }
    public function deleteProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        $feature_image = $product->feature_image;
        if (!empty($feature_image)) {
            unlink($feature_image);
        }
        $image = $product->image;
        if ($image != '') {
            $image = json_decode($product->image);
            foreach ($image as $item) {
                unlink($item);
            }
        }
        // $delProduct = Product::find($id);
        // $delete = $delProduct->delete();
        $delete = $product->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Product delete failed!');
        }
    }
    public function getFeaturs($id)
    {
        $features = Feature::all()->where('category_id', $id);
        $SubCategory = SubCategory::all()->where('category_id', $id);
        if ($features) {
            return response()->json([
                'status' => 200,
                'features' => $features,
                'subcategory' => $SubCategory
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Features Not Found',
            ]);
        }
    }
    public function newProductpage()
    {
        $features = Feature::all();
        return view('Seller.test', compact('features'));
    }
    public function saveProductFeatures(Request $request,)
    {
        // dd($request);
        $request->validate([
            'features' => 'required|array|min:2',
            'SubCategory' => 'required',
            // 'product_id' => 'required',
        ]);


        $features = $request->features;
        // dd($features);
        $save = '';

        $productId  = $request->product_id;
        if ($features != null) {
            foreach ($features as $feature) {
                $productFeatures = new ProductFeatures();
                $productFeatures->feature_id = $feature;
                $productFeatures->product_id = $productId;
                $save = $productFeatures->save();
            }
        }
        $featureString = false;
        // $getFeatures = Feature::find($features);
        $getFeatures = DB::table('product_features')->join('features', 'product_features.feature_id', '=', 'features.id')->select('features.feature')->where('product_features.product_id', $productId)->groupBy('product_features.feature_id')->orderBy('product_features.created_at', 'desc')->get();
        // dd($getFeatures);
        if (!empty($getFeatures)) {
            foreach ($getFeatures as $key => $getFeature) {
                if ($key == 0) {
                    $featureString .= $getFeature->feature;
                } else {
                    $featureString .= ', ' . $getFeature->feature;
                }
            }
        }
        // dd($feature1, $qwert);
        $feature_encoded = json_encode($featureString);
        $product = Product::find($productId);
        $product->features = $feature_encoded;
        $product->catlogue_no = $request->catalogue_number;
        $product->catalogue = $request->catalogue;
        $product->sub_category = $request->SubCategory;
        $product->status =  null;

        $product->save();

        if ($save) {
            return redirect('seller/create-product')->with('success', 'Product Saved successfully');
        } else {
            // $product = Product::find($productId);
            // $product->delete();
            return redirect('seller/create-product')->with('fail', 'Product Saved failed!');
        }
    }
    public function newProducts(Request $request)
    {
        $datemin = Carbon::now('Europe/London')->addHours(25)->format('Y-m-d');
        $datemax = Carbon::now('Europe/London')->addDays(12)->format('Y-m-d');

        $request->validate([
            'product_image' => 'required|array|min:2|max:5',
            'product_image.*' => 'mimes:jpeg,png,jpg|max:1024',
            'product_feature_image' => 'required|mimes:jpeg,png,jpg|max:1024',
            'product_name' => 'required',
            'year' => 'required',
            'select_category' => 'required',
            // 'catalogue_nr' => 'required|exists:sub_categories,category_id',
            'catalogue_number' => 'numeric',
            'country' => 'required',
            'start_price' => 'required|numeric|integer',
            'start_date' => 'required|date|after:' . $datemin . '|before:' . $datemax,
            'description' => 'required',
            'features' => 'required|array|min:2',
        ]);
        $features = $request->features;
        // dd($features);

        ///////////////// 
        $categories = $request->select_category;
        $stri = preg_split("/[\s,]+/", $categories);
        $category = $stri[0];
        $subcat = SubCategory::find($category);
        if ($subcat == null) {
        }


        // Product Images
        $Pimages = $request->file('product_image');
        $data = array();
        foreach ($Pimages as $key => $image) {
            $path =  'Product/image/';
            $new_img_name = 'PIMG' . date('YmdHis') . uniqid()  . '.jpg';
            $last_img = $path . $new_img_name;
            $image->move($path, $new_img_name);
            $igm['image'] =  $last_img;
            // $final_path = trim($last_img, '"');
            array_push($data, $igm);
        }
        // $PImages = implode(",", $data);
        // $exp = explode(",", $PImages);
        // dd($PImages, $exp);


        // $PImag = json_encode($data);

        // $deco = json_decode($PImag);
        // dd($PImag, $deco, $data);

        // Feature image
        $Fimage = $request->file('product_feature_image');
        $fpath =  'Product/feature_image/';
        $new_fimg_name = 'FPIMG' . date('YmdHis') . uniqid()  . '.jpg';
        $last_feature_img = $fpath . $new_fimg_name;
        $Fimage->move($fpath, $new_fimg_name);

        // dd($Fimage, $Pimages, $data, $PImages);

        // LOW Quality Images
        $lqpath =  'Product/low_qual_img/';
        $new_lqimg_name = 'LQPIMG' . date('YmdHis') . uniqid()  . '.jpg';
        $last_low_qual_img = $lqpath . $new_lqimg_name;
        $img = \Intervention\Image\Facades\Image::make($last_feature_img)->resize(160, 80);
        $img->save($lqpath . $new_lqimg_name);

        $product = new Product;
        $product->seller_id = Auth::guard('seller')->user()->id;
        $product->product_name = $request->product_name;
        $product->product_unique_id = uniqid();
        $product->category_id = $category;
        $product->start_at = $request->start_date;
        $product->catalogue = $request->catalogue_nr;
        $product->year = $request->year;
        $product->catlogue_no = $request->catalogue_number;
        $product->country = $request->country;
        $product->city = $request->city;
        $product->start_price = $request->start_price;
        $product->description =  $request->description;
        $encoded = json_encode($data);
        $product->image =  json_decode($encoded);
        // json_encode($data);
        $product->low_qual_img =  $last_low_qual_img;
        $product->feature_image =  $last_feature_img;
        $product->status =  3;
        $saved = $product->save();
        $product_id = $product->id;

        if ($features != null) {
            foreach ($features as $feature) {
                $productFeatures = new ProductFeatures();
                $productFeatures->feature_id = $feature;
                $productFeatures->product_id = $product_id;
                $save = $productFeatures->save();
            }
        }

        $getFeatures = DB::table('product_features')->join('features', 'product_features.feature_id', '=', 'features.id')->select('features.feature')->where('product_features.product_id', $product_id)->groupBy('product_features.feature_id')->orderBy('product_features.created_at', 'desc')->get();
        // dd($getFeatures);

        $featureString = "";
        if (!empty($getFeatures)) {
            foreach ($getFeatures as $key => $featur) {
                if ($key == 0) {
                    $featureString .= $featur->feature;
                } else {
                    $featureString .= ', ' . $featur->feature;
                }
            }
        }
        $product = Product::find($product_id);
        $product->features = $featureString;
        $product->update();
        // dd(trim($featureString, '"'));

        if ($saved) {
            return redirect()->back()->with('success', 'Product saved successfully');
        } else {
            return redirect()->back()->with('fail', 'Product save failed!');
        }
    }
    public function updateInfo(Request $request)
    {
        // validate the request

        // dd($request);
        $image = $request->file('product_image');
        if ($image == true) {
            $id = $request->product_id;
            $product = Product::find($id);
            $productImage = $product->image;
            if ($productImage == true) {
                unlink($productImage);
            }
            // $image = $request->file('product_image');
            // $path =  'Product/image/';
            // $new_img_name = 'PIMG' . date('YmdHis') . uniqid()  . '.jpg';
            // $last_img = $path . $new_img_name;
            // $image->move($path, $new_img_name);
            // $product->image = $last_img;
            // $product->product_name = $request->product_name;
            // $product->year = $request->year;
            // $product->country = $request->country;
            // $product->state = $request->state;
            // $product->city = $request->city;
            // $product->start_at = $request->start_at;
            // $product->start_price = $request->start_price;
            // $update = $product->update();




            if ($update) {
                return redirect()->back()->with('success', 'Product updated successfully');
            } else {
                return redirect()->back()->with('fail', 'Product update failed!');
            }
        }

        $request->validate([
            'seller_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'gender' => 'required',
            'wallet_shipment' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|numeric|min:10',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required|numeric',
            'country' => 'required',
        ]);


        $image = $request->file('seller_image');
        // dd($image);
        if ($image == true) {
            $user = User::find(Auth::guard('seller')->user()->id);
            $sellerImage = $user->image;
            if ($sellerImage == true) {
                unlink($sellerImage);
            }
            $image = $request->file('seller_image');
            $path =  'sellers/images/';
            $new_img_name = 'SIMG' . date('YmdHis') . uniqid()  . '.jpg';
            $last_img = $path . $new_img_name;
            $image->move($path, $new_img_name);
            // $user = User::find(Auth::guard('seller')->user()->id);
            $user->image = $last_img;
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
        } else {
            $user = User::find(Auth::guard('seller')->user()->id);
            // $user = Seller::find(Auth::guard('seller')->user()->id);
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
        if (Auth::guard('seller')->attempt($cred)) {

            $userPassword = User::find(Auth::guard('seller')->user()->id);
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
        // $token = $request->token;
        // $verifyUser = VerifySeller::where('token', $token)->first();
        // if (!is_null($verifyUser)) {
        //     $user = $verifyUser->user;
        //     if (!$user->email_verified) {
        //         $verifyUser->user->email_verified = 1;
        //         $verifyUser->user->email_verified_at = Carbon::now();
        //         $verifyUser->user->save();
        //         return redirect()->route('user.login')->with('info', 'Your account has been verified, You may login now')->with('verifiedEmail', $user->email);
        //     } else {
        //         return redirect()->route('user.login')->with('info', 'Your account is already verified, You may login now')->with('verifiedEmail', $user->email);
        //     }
        // }
    }

    public function crop(Request $request)
    {

        $image = $request->file('seller_update_image');
        $path = 'sellers/images/';
        $new_img_name = 'UIMG' . date('YmdHis') . uniqid() . '.jpg';
        $move = $image->move($path, $new_img_name);

        if (!$move) {
            return response()->json(['status' => 0, 'msg' => 'Image size is large, update picture has been failed!']);
        } else {

            $sellerInfo = User::find(Auth::guard('seller')->user()->id);

            $sellerImg = $sellerInfo->image;
            if ($sellerImg != '') {
                unlink($path . $sellerImg);
            }
            $sellerInfo = User::find(Auth::guard('seller')->user()->id)->update(['image' => $new_img_name]);
            return response()->json(['status' => 1, 'msg' => 'Your profile picture has been updated successfully!']);
        }
    }
    public function create(Request $request)
    {
        // validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:11|max:15',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);
        $seller = new User();
        $seller->name = $request->name;
        $seller->phone = $request->phone;
        $seller->email = $request->email;
        $seller->password = Hash::make($request->password);
        $save = $seller->save();

        if ($save) {
            return redirect()->back()->with('success', 'Registration successfully!');
        } else {
            return redirect()->back()->with('fail', 'Registration failed');
        }
    }

    public function logout()
    {
        // dd(Auth::logout());
        Auth::guard('seller')->logout();
        Auth::guard('web')->logout();
        return redirect('/user');
    }
    public function productWinner()
    {
        $seller = Auth::guard('seller')->user()->id;
        // dd($selelr);

        $ProductWinner = DB::table('winners')->join('users', 'winners.user_id', '=', 'users.id')->join('products', 'winners.product_id', '=', 'products.id')->select('products.id',  'products.product_unique_id', 'products.catalogue', 'products.low_qual_img', 'products.catlogue_no', 'users.email', 'users.username', 'winners.bid_amount', 'winners.dispatched', 'users.last_name', 'users.first_name', 'winners.id as w_id', 'winners.user_id', 'products.product_name', 'products.product_unique_id', 'products.start_price',   'products.country')->where('products.seller_id', $seller)->orderBy('products.created_at', 'desc')->get();
        // dd($ProductWinner);
        return view('Seller/body/winner', compact('ProductWinner'));
    }
    public function dispatchProductWinner($id)
    {
        // dd($id);
        $seller = Auth::guard('seller')->user()->id;
        // dd($seller);
        $winner =  Winner::find($id);
        $winner->dispatched = 1;
        $winner->update();

        $ProductWinner = DB::table('winners')->join('users', 'winners.user_id', '=', 'users.id')->join('products', 'winners.product_id', '=', 'products.id')->select('products.id',  'products.product_unique_id', 'products.catalogue', 'products.low_qual_img', 'products.catlogue_no', 'users.email', 'users.username', 'winners.bid_amount', 'users.last_name', 'users.first_name', 'winners.id as ww_id', 'winners.user_id', 'products.product_name', 'products.product_unique_id', 'products.start_price',   'products.country')->where('winners.id', $id)->first();
        // dd($ProductWinner->ww_id);
        $item = new Item_dispatched_orders();
        $item->product_id =  $ProductWinner->id;
        $item->buyer_id =  $ProductWinner->user_id;
        $item->seller_id =  $seller;
        $item->winner_id =  $id;

        $saved = $item->save();
        if ($saved) {
            return redirect()->back()->with('success', 'Item Dispatched successfully!');
        } else {
            return redirect()->back()->with('fail', 'Item Dispatched failed!');
        }
    }
    public function userInfo($id)
    {
        // dd($id);
        // $usr = Auth::guard('web')->user()->id;
        $UserInfo = DB::table('users')->select('gender', 'first_name', 'last_name', 'username', 'email', 'phone', 'address', 'city', 'state', 'postal_code', 'country')->where('users.id', $id)->first();
        // dd($UserInfo);
        return view('Seller/body/userInfo', compact('UserInfo'));
    }
}
