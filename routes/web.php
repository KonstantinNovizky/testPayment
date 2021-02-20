<?php

use App\Http\Controllers\AdminMembershipController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AdminTradesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use GuzzleHttp\Psr7\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\SubscriptionsController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserTradesController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserUserController;
// use Mailgun\Mailgun;
// use Illuminate\Support\Facades\Mail;

Route::get('/', PagesController::class)->name("main");
Route::get('/forget-password', [PagesController::class, 'forgetPassword'])->name("forget.password");
Route::post('forget-pwd', [PagesController::class, 'forgetPwd'])->name("forget-pwd");
Route::post('reset-pwd', [PagesController::class, 'resetPwd'])->name("reset-pwd");
Route::get('/login', [PagesController::class, 'login'])->name("login");
Route::get('/subscribe', [PagesController::class, 'subscribe'])->name("subscribe");
Route::post('/subscribe', [PagesController::class, 'subscribeAction'])->name("subscribe.action1");
Route::get('/register', [PagesController::class, 'register'])->name("register");
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name("contact.us");
Route::post('/contact-us', [PagesController::class, 'contactUsAction'])->name("contact.us.action");
Route::get('/terms-conditions', [PagesController::class, 'termsCondations']);

// User controller

// Route::resource('users', UsersController::class);
Route::get("users/create", [UsersController::class, 'create'])->name("users.create");
Route::post("users", [UsersController::class, 'store'])->name("users.store");

// Route::post("signup-1", [PagesController::class, 'signupStep1'])->name("signup.step1");
Route::match(['post', 'get'], "signup-2", [PagesController::class, 'signupStep2'])->name("signup.step2");
Route::match(["post", "get"], "signup-3", [PagesController::class, 'signupStep3'])->name("signup.step3");

Route::post('subscribe-me', [SubscriptionsController::class, 'subscribeMe'])->name("subscribe.me");
Route::match(['get'], 'subscribe-price', [SubscriptionsController::class, 'subscribePrice'])->name("subscribe.price");
Route::post('subscribe-payment', [SubscriptionsController::class, 'subscribePayment'])->name("subscribe.payment");
// Route::get('go', [SubscriptionsController::class, 'go']);
// Route::get('go', function(){return 'go';});


// Route::get("signup-2-test", [PagesController::class, 'signupStep2'])->name("signup.step22");
// Route::get("signup-3-test", [PagesController::class, 'signupStep3'])->name("signup.step3");
// Route::get("users/create", [UsersController::class, 'create'])->name("users.create");

// attempt to login
Route::post('access', [UsersController::class, 'access'])->name("access");

Route::get('hi', function () {
    return session("loggedIn");
});

Route::get("logout", [UsersController::class, 'logout'])->name("logout");

Route::get('admin/login', [UsersController::class, 'loginForm'])->name("login.form");

Route::get('pricing', [PagesController::class, 'subscriptionForm'])->name("subscribe.form");
Route::post('pricing', [PagesController::class, 'subscription'])->name("subscribe.action");

Route::get('register_temp', [PagesController::class, 'registerTemp'])->name("register_temp");

Route::post('signup-for-training', [PagesController::class, 'signupForTraining'])->name("signup.for_training");

Route::prefix("user_dashboard")->middleware('user')->group(function () {
    Route::get("/", [UserDashboardController::class, "index"])->name("user_dashboard");
    Route::resource("user_trades", UserTradesController::class);
    Route::resource('user_users', UserUserController::class);

    Route::get('profile', [UserUserController::class, 'profile'])->name("profile.user");
});

Route::prefix("admin")->middleware('admin')->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("admin");

    Route::get("users", [AdminUsersController::class, "index"])->name("admin.users.index");
    Route::post("users", [AdminUsersController::class, "store"])->name("admin.users.store");
    Route::get("users/create", [AdminUsersController::class, "create"])->name("admin.users.create");
    Route::match(["put", "patch"], "users/{id}", [AdminUsersController::class, "update"])->name("admin.users.update");
    Route::delete("users/{id}", [AdminUsersController::class, "destroy"])->name("admin.users.destroy");
    Route::match(["get", "head"], "users/{id}", [AdminUsersController::class, "show"])->name("admin.users.show");
    Route::match(["get", "head"], "users/{id}/edit", [AdminUsersController::class, "edit"])->name("admin.users.edit");

    Route::get('profile', [AdminUsersController::class, 'profile'])->name("profile");

    // Trades
    Route::resource("trades", AdminTradesController::class);
    Route::post('file-import', [AdminTradesController::class, 'fileImport'])->name('file-import');

    Route::get('testimonial', [AdminsController::class, 'index'])->name('testimonial');
    Route::post('testimonial', [AdminsController::class, 'testimonial'])->name('sendMsg');

    Route::resource('membership', AdminMembershipController::class);
    Route::post('membership/delete-membership', [AdminMembershipController::class, 'deleteMembership'])->name('membership.destroy');

    Route::post('store', [AdminMembershipController::class, 'addMembership'])->name('add.membership');
    // AS I prefixed this group by admin, so just /go will not work but /admin/go will work
    Route::get('/go', function () {
        echo 'go';
    });
});

// PAYPAL
// Route::get('payment', 'PayPalController@payment')->name('payment');
// Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
// Route::get('payment/success', 'PayPalController@success')->name('payment.success');
// Route::get('paypal', [PayPalController::class, 'index']);
// Route::get('paypal-approval', [PayPalController::class, 'post']);

Route::get('go-payment', [PaymentsController::class, 'index'])->name('go.payment');
Route::post('handle-payment', [PaymentsController::class, 'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [PaymentsController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [PaymentsController::class, 'paymentSuccess'])->name('success.payment');