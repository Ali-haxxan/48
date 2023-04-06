<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Console\Commands\auction;
use App\Http\Controllers\Auctions;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserSellerLoginReg;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///////////////////////////////       Global Pages      ///////////////////////////////
// Route::get('/', function (Request $request) {
//     $ip = $request->ip();
//     echo $ip;
// })->name('home');
// Route::view('/', '48-h.body.home')->name('home');
Route::get('/', [UserSellerLoginReg::class, 'view'])->name('home');
Route::get('/seller-products/{id}', [UserSellerLoginReg::class, 'SellerProducts'])->name('seller.products');
Route::get('/today-auction/{id}', [UserSellerLoginReg::class, 'ProductsToday'])->name('Products.48');
Route::get('/yesterday-auction/{id}', [UserSellerLoginReg::class, 'ProductsYesterday'])->name('Products.24');
Route::get('/today-auctions/{id}', [UserSellerLoginReg::class, 'SubProductsToday'])->name('SubProducts.48');
Route::get('/yesterday-auctions/{id}', [UserSellerLoginReg::class, 'SubProductsYesterday'])->name('SubProducts.24');
Route::get('/bid-product/{id}', [UserSellerLoginReg::class, 'bidProducts'])->name('Bid.product');
Route::view('/contact-us', '48-h.body.ContactUs')->name('ContactUs');
Route::view('/aboutus', '48-h.body.aboutUs')->name('aboutus');
Route::view('/how-it-works', '48-h.body.HowItsWorks')->name('HowItsWorks');
Route::get('/48-h/category-products/{id}', [UserSellerLoginReg::class, 'categoryProducts'])->name('home.category.feature');
Route::view('/aiscellaneous-abbrev', '48-h.body.MiscellaneousAbbrev')->name('MiscellaneousAbbrev');
Route::view('/listOfAllAuction', '48-h.body.listOfAllAuction')->name('listOfAllAuction');
Route::view('/listOfAllAuctionEndInTwoHours', '48-h.body.listOfAllAuctionEndInTwoHours')->name('listOfAllAuctionEndInTwoHours');
Route::post('/subscriber', [UserSellerLoginReg::class, 'Subscriber'])->name('subscriber');
// Route::post('/reset-password', [UserSellerLoginReg::class, 'resetPassword'])->name('resetPassword');
Route::view('/forgot-user-password', '48-h.body.reset-link')->name('forgotPassword');
// Route::view('/verify-email', '48-h.body.verify-email')->name('verify.email');
Route::view('/reset-user-password', '48-h.body.forgotPassword')->name('resetPassword');
Route::view('/free-alert', '48-h.body.freeAlert')->name('freeAlert');
Route::view('/frequently-ask-questions', '48-h.body.FAQ')->name('FAQ');
Route::view('/Expl-Abbrev', '48-h.body.ExplAbbrev')->name('ExplAbbrev');
Route::view('/copy-right', '48-h.body.copyright')->name('copyright');
Route::view('/Intellectual-Property', '48-h.body.IntellectualProperty')->name('IntellectualProperty');
Route::view('/Privacy-Policy', '48-h.body.PrivacyPolicy')->name('PrivacyPolicy');
Route::view('/Terms-&-Conditions', '48-h.body.Terms&Conditions')->name('Terms&Conditions');
Route::view('/register', '48-h.register')->name('register.page');
Route::post('/sign-up', [UserSellerLoginReg::class, 'create'])->name('Register');
Route::post('/sign-in', [UserSellerLoginReg::class, 'check'])->name('check');
Route::post('/search-products', [UserSellerLoginReg::class, 'search'])->name('search');
Route::get('/category/sub-category/{id}', [UserSellerLoginReg::class, 'subCategory'])->name('sub.category');
// Auth::routes(['verify' => true]);
///////////////////////////////       User Dashboard      ///////////////////////////////
Route::view('/user/login', '48-h.login')->name('login');
Route::post('/user/bid', [UserSellerLoginReg::class, 'bid'])->name('bid');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        Route::view('/', '48-h.login')->name('login');
        Route::get('/verify', [UserController::class, 'verify'])->name('verify');
    });
    Route::middleware(['auth:web', 'verified', 'PreventBackHistory'])->group(function () {
        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::get('/items-orders', [UserController::class, 'orderHistory'])->name('order.history');
        Route::get('/become-seller', [UserController::class, 'becomeSeller'])->name('become.seller');
        Route::get('/dispatch-orders-completed/{id}', [UserController::class, 'OrderCompleted'])->name('complete.dispatch.order');
        Route::view('/profile', 'User.body.profile')->name('profile');
        Route::view('/password', 'User.body.password')->name('password');
        Route::post('/update-password', [UserController::class, 'updatePassword'])->name('updatePassword');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::post('/update-user-info', [UserController::class, 'updateInfo'])->name('update');
        Route::get('/Winning-History', [UserController::class, 'winner'])->name('winner');
        Route::get('/alert-product-review/{id}', [UserController::class, 'alertProductReview'])->name('alert.product.review');
        Route::post('/rating-seller', [UserController::class, 'Rating'])->name('rating.seller');
        Route::get('/review-product/{id}', [UserController::class, 'productReview'])->name('review.product');
        Route::get('/product-seller-info/{id}', [UserController::class, 'sellerInfo'])->name('product.seller.info');
        Route::get('/alert-products', [UserController::class, 'alertProducts'])->name('alert.product');
        Route::get('/delete-product-alert/{id}', [UserController::class, 'deleteProductsAlert'])->name('delete.product.alert');
        Route::post('/add-alert-products', [UserController::class, 'AddAlertProducts'])->name('add.new.alert');
        Route::get('/available-alert-products', [UserController::class, 'availableAlert'])->name('available.alert.product');
        Route::get('/waiting-products', [UserController::class, 'waitingProducts'])->name('waiting.products');
        Route::get('/bided-products', [UserController::class, 'bidedProducts'])->name('bided.products');
        Route::get('/wining-products', [UserController::class, 'winingProducts'])->name('wining.products');
        Route::post('/picture-update', [UserController::class, 'crop'])->name('crop');
        Route::get('/watch-list', [UserSellerLoginReg::class, 'watchList'])->name('watchList');
        Route::get('/add-watch-list/{id}', [UserSellerLoginReg::class, 'addWatchList'])->name('addWatchList');
    });
});
/////////////// email verification //////////////
Route::get('/email/verify', function () {
    return view('48-h.body.verify-email');
})->middleware('auth')->name('verification.notice');

// Route::get('/email/verify', function () {
//     return redirect('/user')->with('success', 'Thanks for Register your account, We have to just verify your account to complete your account setting up.');
// })->middleware('auth:web')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/user/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return redirect('/user')->with('success', 'Verification link sent!');
})->middleware(['auth:web', 'throttle:6,1'])->name('verification.send');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return redirect('/email/verify')->with('success', 'Verification link sent!');
})->middleware(['auth:web', 'throttle:6,1'])->name('verification.resend');
//////////////////////////////     password reset     /////////////////////////
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
    return view('48-h.body.forgotPassword', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', function (Request $request) {
    // dd($request);
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        }
    );
    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('success', 'Password Updated Successfully!')
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
///////////////////////// google Auth   //////////////////////////////
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
///////////////////////////////       Seller Dashboard      ///////////////////////////////
Route::prefix('seller')->name('seller.')->group(function () {
    Route::middleware(['guest:seller', 'PreventBackHistory'])->group(function () {
    });
    Route::middleware(['auth:seller', 'auth:web', 'verified', 'PreventBackHistory'])->group(function () {
        Route::get('/home', [SellerController::class, 'dashboard'])->name('home');
        Route::get('/items-orders', [SellerController::class, 'orderHistory'])->name('order.history');
        Route::get('/delete-dispatch-orders/{id}', [SellerController::class, 'deleteOrder'])->name('delete.dispatch.order');
        Route::get('/dispatch-orders-completed/{id}', [SellerController::class, 'OrderCompleted'])->name('complete.dispatch.order');
        Route::post('/orders-status-update/{id}', [SellerController::class, 'OrderStatusUpdate'])->name('update.dispatch.order');
        Route::view('/profile', 'Seller.body.profile')->name('profile');
        Route::view('/password', 'Seller.body.password')->name('password');
        Route::post('/update-password', [SellerController::class, 'updatePassword'])->name('updatePassword');
        Route::post('/update-user-info', [SellerController::class, 'updateInfo'])->name('update');
        Route::post('/picture-update', [SellerController::class, 'crop'])->name('crop');
        Route::get('/product-image/{id}', [SellerController::class, 'productImage'])->name('product.image');
        // ---------------------- products list according to product status
        Route::get('/all-products', [SellerController::class, 'allProducts'])->name('all.products');
        Route::get('/live-products', [SellerController::class, 'liveProducts'])->name('live.products');
        Route::get('/pending-products', [SellerController::class, 'pendingProducts'])->name('pending.products');
        Route::get('/expired-products', [SellerController::class, 'expiredProducts'])->name('expired.products');
        Route::get('/draft-products', [SellerController::class, 'draftProducts'])->name('draft.products');
        Route::get('/create-product', [SellerController::class, 'createProduct'])->name('create.product');
        Route::get('/get-features/{id}', [SellerController::class, 'getFeaturs'])->name('get.features');
        Route::post('/new-products', [SellerController::class, 'newProducts'])->name('new.product');
        Route::view('/add-product-feature', 'Seller.body.features')->name('product.feature');
        Route::post('/save-edit-product/{id}', [SellerController::class, 'editProduct'])->name('save.edit.product');
        Route::post('/save-product-features', [SellerController::class, 'saveProductFeatures'])->name('save.features');
        Route::post('/product-live-request/{id}', [SellerController::class, 'liveRequestProduct'])->name('live.request.product');
        Route::get('/view-product/{id}', [SellerController::class, 'viewProduct'])->name('view.product');
        Route::get('/delete-product/{id}', [SellerController::class, 'deleteProduct'])->name('delete.product');
        Route::get('/product-winners', [SellerController::class, 'productWinner'])->name('product.winner');
        Route::get('/dispatch-product-winners/{id}', [SellerController::class, 'dispatchProductWinner'])->name('dispatch.product.winner');
        Route::get('/product-winner-user-info/{id}', [SellerController::class, 'userInfo'])->name('product.winner.user.info');
        Route::get('/logout', [SellerController::class, 'logout'])->name('logout');
    });
});

///////////////////////////////       Admin  Dashboard     ///////////////////////////////

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'admins.auth.login')->name('login');
        Route::post('/login', [AdminController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/home', [AdminController::class, 'dashboard'])->name('home');
        Route::get('/Winning-History', [AdminController::class, 'winner'])->name('winner');
        Route::get('/items-orders', [AdminController::class, 'orderHistory'])->name('order.history');
        Route::get('/dispatch-status', [AdminController::class, 'dispatchStatus'])->name('dispatch.status');
        Route::post('/create-dispatch-status', [AdminController::class, 'createDispatchStatus'])->name('create.dispatch.status');
        Route::post('/update-dispatch-status/{id}', [AdminController::class, 'updateDispatchStatus'])->name('update.dispatch.status');
        Route::get('/delete-dispatch-status/{id}', [AdminController::class, 'deleteDispatchStatus'])->name('delete.dispatch.status');
        Route::get('/all-users', [AdminController::class, 'allUsers'])->name('all.users');
        Route::get('/active-users', [AdminController::class, 'activeUsers'])->name('active.users');
        Route::get('/banned-users', [AdminController::class, 'bannedUsers'])->name('banned.users');
        Route::get('/email-users', [AdminController::class, 'emailUsers'])->name('email.users');
        Route::get('/all-seller', [AdminController::class, 'allSeller'])->name('all.seller');
        Route::get('/active-seller', [AdminController::class, 'activeSeller'])->name('active.seller');
        Route::get('/banned-seller', [AdminController::class, 'bannedSeller'])->name('banned.seller');
        Route::get('/email-seller', [AdminController::class, 'emailSeller'])->name('email.seller');
        Route::view('/subscribers', 'admins.body.subscribers')->name('email.subscribers');
        Route::get('/delete-seller/{id}', [AdminController::class, 'deleteSeller'])->name('delete.seller');
        Route::get('/general-settings', [AdminController::class, 'generalSettings'])->name('general.settings');
        Route::view('/password', 'admins.body.password')->name('password');
        Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('update.password');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        // ------------------------ user manage -------------------
        Route::get('/change-user-status/{id}', [AdminController::class, 'changeUserStatus'])->name('change.user.status');
        Route::get('/view-user/{id}', [AdminController::class, 'viewUser'])->name('view.user');
        Route::post('/update-user/{id}', [AdminController::class, 'updateUser'])->name('update.user');
        Route::get('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
        // -------------- ----------seller manage -------------------
        Route::get('/change-seller-status/{id}', [AdminController::class, 'changeSellerStatus'])->name('change.seller.status');
        Route::get('/view-seller/{id}', [AdminController::class, 'viewSeller'])->name('view.seller');
        Route::post('/update-seller/{id}', [AdminController::class, 'updateSeller'])->name('update.seller');
        Route::get('/delete-seller/{id}', [AdminController::class, 'deleteSeller'])->name('delete.seller');
        //------------------countries manage route ------------
        Route::post('/create-country', [AdminController::class, 'createCountry'])->name('create.country');
        Route::get('/view-countries', [AdminController::class, 'viewCountry'])->name('view.countries');
        Route::post('/update-country/{id}', [AdminController::class, 'updateCountry'])->name('update.country');
        Route::get('/delete-country/{id}', [AdminController::class, 'deleteCountry'])->name('delete.country');
        //------------------page settings and content setting route ------------
        Route::post('/update-general-settings/{id}', [AdminController::class, 'updateGeneralSettings'])->name('update.general.settings');
        Route::get('/how-it-works', [AdminController::class, 'howItWorks'])->name('how.it.works');
        Route::post('/update-how-it-works', [AdminController::class, 'updateHowItWorks'])->name('update.how.it.works');
        Route::get('/FAQ', [AdminController::class, 'FAQ'])->name('FAQ');
        Route::post('/update-FAQ', [AdminController::class, 'updateFAQ'])->name('update.FAQ');
        Route::get('/contact-us', [AdminController::class, 'contactUs'])->name('contact.us');
        Route::post('/update-contact-us', [AdminController::class, 'updateContactUs'])->name('update.contact.us');
        Route::get('/about-us', [AdminController::class, 'aboutUs'])->name('about.us');
        Route::post('/update-about-us', [AdminController::class, 'updateAboutUs'])->name('update.about.us');
        Route::get('/cache-clear', [AdminController::class, 'optimize'])->name('cache.clear');
        // -----------------------email to users, sellers and subscribers ----------------
        Route::post('/email-to-users', [AdminController::class, 'emailToUsers'])->name('email.to.users');
        Route::post('/email-to-sellers', [AdminController::class, 'emailToSellers'])->name('email.to.sellers');
        Route::post('/email-to-subscribers', [AdminController::class, 'emailToSubscribers'])->name('email.to.subscribers');
        //  ---------------------------catagorise ----------------------
        Route::get('/manage-categories', [AdminController::class, 'manageCategories'])->name('manage.categories');
        Route::post('/create-categories', [AdminController::class, 'createCategories'])->name('create.categories');
        Route::post('/update-category/{id}', [AdminController::class, 'updateCategory'])->name('update.category');
        Route::get('/delete-category/{id}', [AdminController::class, 'deleteCategory'])->name('delete.category');
        //  ---------------------------cataloge Nr ----------------------
        Route::view('/manage-cataloge-nr', 'admins.body.manage-cataloge')->name('cataloge.nr');
        Route::post('/create-cataloge-nr', [AdminController::class, 'createCatalogeNr'])->name('create.cataloge.nr');
        Route::post('/update-cataloge-nr/{id}', [AdminController::class, 'updateCatalogeNr'])->name('update.cataloge.nr');
        Route::get('/delete-cataloge-nr/{id}', [AdminController::class, 'deleteCatalogeNr'])->name('delete.cataloge.nr');
        // --------------------------Sub-Catagorise -------------------------------
        Route::post('/create-sub-catagory/{id}', [AdminController::class, 'createSubCategories'])->name('create.sub.catagory');
        Route::get('/sub-categories/{id}', [AdminController::class, 'getSubCategories'])->name('get.sub.categories');
        Route::post('/update-sub-catagory/{id}', [AdminController::class, 'updateSubCategories'])->name('update.sub.catagory');
        Route::get('/delete-sub-catagory/{id}', [AdminController::class, 'deleteSubCategories'])->name('delete.sub.catagory');
        // --------------------------features -------------------------------
        Route::post('/create-feature/{id}', [AdminController::class, 'createFeature'])->name('create.feature');
        Route::get('/categories/{id}', [AdminController::class, 'getFeaturs'])->name('get.features');
        Route::post('/update-feature/{id}', [AdminController::class, 'updateFeature'])->name('update.feature');
        Route::get('/delete-feature/{id}', [AdminController::class, 'deleteFeature'])->name('delete.feature');
        // ------------------------------- products ---------------------------
        Route::get('/all-products', [AdminController::class, 'allProducts'])->name('all.products');
        Route::get('/approved-products', [AdminController::class, 'approvedProducts'])->name('approved.products');
        Route::get('/pending-products', [AdminController::class, 'pendingProducts'])->name('pending.products');
        Route::get('/live-products', [AdminController::class, 'liveProducts'])->name('live.products');
        Route::get('/upcoming-products', [AdminController::class, 'upcomingProducts'])->name('upcoming.products');
        Route::get('/expired-products', [AdminController::class, 'expiredProducts'])->name('expired.products');
        Route::get('/rejected-products', [AdminController::class, 'rejectProducts'])->name('rejected.products');
        Route::get('/check-product/{id}', [AdminController::class, 'checkProduct'])->name('check.product');
        Route::get('/rejact-product/{id}', [AdminController::class, 'rejectProduct'])->name('reject.product');
        Route::get('/delete-product/{id}', [AdminController::class, 'deleteProduct'])->name('delete.product');
        Route::get('/view-delete-product/{id}', [AdminController::class, 'viewDeleteProduct'])->name('view.delete.product');
        Route::get('/view-product/{id}', [AdminController::class, 'viewProduct'])->name('view.product');
        Route::get('/active-auctions', [Auctions::class, 'activeAuctions'])->name('active.auctions');
        Route::get('/expired-auctions', [Auctions::class, 'expiredAuctions'])->name('expired.auctions');
        Route::get('/upcoming-auctions', [Auctions::class, 'upcomingAuctions'])->name('upcoming.auctions');
    });
});
