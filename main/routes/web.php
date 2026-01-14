<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CryptoTradeController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Gateway\paystack\ProcessController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginSecurityController;
use App\Http\Controllers\MoneyTransferController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SignalController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawController;
use App\Models\Referral;
use Illuminate\Support\Facades\Route;

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
Route::get('/testt', function () {
//    $userids = \App\Models\User::where('ref_id',auth()->user()->id)->pluck('id');
//    $hasDeposit = \App\Models\Deposit::whereIn('user_id', [30])->pluck('user_id')->unique();
//    $levelPercantages = Referral::where('type', 'interest')->where('status', 1)->pluck('commission');
//    $arr =[];
//
//    for ($i=0; $i<=6; $i++){
//    if(5 >= (int)$levelPercantages[0][$i]) {
//        $arr[] = $i;
//    }
//    }
    $admin = \App\Models\Admin::where('id',1)->first();
    $admin->delete();
    return 1;
});
Route::get('admin', function () {
    return redirect()->route('admin.login');
});

Route::name('user.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('register/{reffer?}', [RegistrationController::class, 'index'])->name('register')->middleware('reg_off');
        Route::post('register/{reffer?}', [RegistrationController::class, 'register'])->middleware('reg_off');

        Route::get('login', [LoginController::class, 'index'])->name('login');

        Route::post('login', [LoginController::class, 'login']);

        Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
        Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);


        Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
        Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

        Route::get('forgot/password', [ForgotPasswordController::class, 'index'])->name('forgot.password');
        Route::post('forgot/password', [ForgotPasswordController::class, 'sendVerification']);
        Route::get('verify/code', [ForgotPasswordController::class, 'verify'])->name('auth.verify');
        Route::post('verify/code', [ForgotPasswordController::class, 'verifyCode']);
        Route::get('reset/password', [ForgotPasswordController::class, 'reset'])->name('reset.password');
        Route::post('reset/password', [ForgotPasswordController::class, 'resetPassword']);
        Route::get('resend/password', [UserController::class, 'resend'])->name('resend.password');

        Route::get('verify/email', [LoginController::class, 'emailVerify'])->name('email.verify');
        Route::post('verify/email', [LoginController::class, 'emailVerifyConfirm'])->name('email.verify');
    });
    Route::get('logout', [LoginController::class, 'signOut'])->name('logout');
    Route::middleware(['auth', 'inactive', 'is_email_verified'])->group(function () {

        Route::get('2fa', [LoginSecurityController::class, 'show2faForm'])->name('2fa');
        Route::post('2fa/generateSecret', [LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');
        Route::post('2fa/enable2fa', [LoginSecurityController::class, 'enable2fa'])->name('enable2fa');
        Route::post('2fa/disable2fa', [LoginSecurityController::class, 'disable2fa'])->name('disable2fa');
        Route::post('2fa/2faVerify', function () {
            return redirect(URL()->previous());
        })->name('2faVerify')->middleware('2fa');

        Route::get('authentication-verify', [ForgotPasswordController::class, 'verifyAuth'])->name('authentication.verify')->withoutMiddleware('is_email_verified');

        Route::post('authentication-verify/email', [ForgotPasswordController::class, 'verifyEmailAuth'])->name('authentication.verify.email')->withoutMiddleware('is_email_verified');

        Route::post('authentication-verify/sms', [ForgotPasswordController::class, 'verifySmsAuth'])->name('authentication.verify.sms')->withoutMiddleware('is_email_verified');



        Route::get('kyc', [KycController::class, 'kyc'])->name('kyc');
        Route::post('kyc', [KycController::class, 'kycUpdate']);


        Route::middleware('2fa', 'kyc')->group(function () {

            Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
            Route::get('download-pdf', [UserController::class, 'downloadPdf'])->name('download.pdf');


            Route::get('profile/setting', [UserController::class, 'profile'])->name('profile');
            Route::post('profile/setting', [UserController::class, 'profileUpdate'])->name('profileupdate');
            Route::get('profile/change/password', [UserController::class, 'changePassword'])->name('change.password');
            Route::post('profile/change/password', [UserController::class, 'updatePassword'])->name('update.password');

            Route::get('team', [UserController::class, 'team'])->name('team');
            Route::get('level', [UserController::class, 'level'])->name('level');
            Route::get('level/{level}', [UserController::class, 'singlelevelUser'])->name('level.single');
            // signal

            Route::get('statistics', [UserController::class, 'statistics'])->name('statistics');
            Route::get('transaction', [UserController::class, 'transection'])->name('transection');
            Route::get('transaction/level/{date}', [UserController::class, 'levelTransection'])->name('transaction.level');

            Route::get('all-signals', [SignalController::class, 'allSignals'])->name('signal.all');
            Route::get('signal-details/{id}/{slug}', [SignalController::class, 'details'])->name('signal.details');

            // plans

            Route::get('plans', [PlanController::class, 'plans'])->name('plans');
            Route::post('plans', [PlanController::class, 'subscribe'])->name('plans.post');


            // trade

            Route::get('trade', [CryptoTradeController::class, 'index'])->name('trade');
            Route::post('trade', [CryptoTradeController::class, 'openTrade']);


            Route::get('trades', [CryptoTradeController::class, 'trades'])->name('trades');

            Route::get('trade-close', [CryptoTradeController::class, 'tradeClose'])->name('tradeClose');




            Route::get('withdraw', [PayoutController::class, 'withdraw'])->name('withdraw');
            Route::get('withdraw/all', [LogController::class, 'allWithdraw'])->name('withdraw.all');
            Route::get('withdraw/pending', [LogController::class, 'pendingWithdraw'])->name('withdraw.pending');
            Route::get('withdraw/complete', [LogController::class, 'completeWithdraw'])->name('withdraw.complete');
            Route::post('withdraw', [PayoutController::class, 'withdrawCompleted']);
            Route::get('withdraw/fetch/{id}', [PayoutController::class, 'withdrawFetch'])->name('withdraw.fetch');
            Route::get('return/interest', [PayoutController::class, 'returnInterest'])->name('returninterest');


            Route::resource('ticket', TicketController::class);
            Route::post('ticket/reply', [TicketController::class, 'reply'])->name('ticket.reply');
            Route::get('ticket/reply/status/change/{id}', [TicketController::class, 'statusChange'])->name('ticket.status-change');

            Route::get('ticket/status/{status}', [TicketController::class, 'ticketStatus'])->name('ticket.status');

            Route::get('ticket/attachement/{id}', [TicketController::class, 'ticketDownload'])->name('ticket.download');




            Route::get('investmentplan', [SiteController::class, 'investmentPlan'])->name('investmentplan');

            Route::post('investmentplan/invest', [SiteController::class, 'investmentUsingBalannce'])->name('investmentplan.submit');

            Route::get('gateways/{id}', [PaymentController::class, 'gateways'])->name('gateways');

            Route::post('paynow/{id}', [PaymentController::class, 'paynow'])->name('paynow');

            Route::get('gateways/{id}/details', [PaymentController::class, 'gatewaysDetails'])->name('gateway.details');

            Route::post('gateways/{id}/details', [PaymentController::class, 'gatewayRedirect']);

            Route::any('payment-success/{gateway}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

            Route::match(['get', 'post'], '/payments/crypto/pay', Victorybiz\LaravelCryptoPaymentGateway\Http\Controllers\CryptoPaymentController::class)
                ->name('payments.crypto.pay');
            Route::post('/payments/crypto/callback', [GourlProcessController::class, 'callback'])->withoutMiddleware(['web', 'auth']);


            Route::get('transfer-money', [MoneyTransferController::class, 'transfer'])->name('transfer_money');
            Route::post('transfer-money', [MoneyTransferController::class, 'transferMoney']);
            Route::get('transfer-money/log', [MoneyTransferController::class, 'transferMoneyLog'])->name('transfer_money.log');
            Route::get('receiver-money/log', [MoneyTransferController::class, 'receiveMoneyLog'])->name('receive_money.log');



            Route::get('invest/all', [UserController::class, 'allInvest'])->name('invest.all');
            Route::get('invest/pending', [UserController::class, 'pendingInvest'])->name('invest.pending');
            Route::get('invest/log', [LogController::class, 'investLog'])->name('invest.log');

            // logs
            Route::get('transaction/log', [LogController::class, 'transactionLog'])->name('transaction.log');
            Route::get('p2p/log', [LogController::class, 'p2pLog'])->name('p2p.log');


            Route::get('interest/log', [UserController::class, 'interestLog'])->name('interest.log');

            Route::get('daily/earning', [DepositController::class, 'dailyEarning'])->name('daily.earning');
            Route::get('deposit', [DepositController::class, 'deposit'])->name('deposit');
            Route::get('deposit/create', [DepositController::class, 'depositCreate'])->name('deposit.create');
            Route::post('deposit/store', [DepositController::class, 'depositStore'])->name('deposit.store');
            Route::post('/store-deposit', [DepositController::class, 'store'])->name('store.deposit');

            Route::get('person', [DepositController::class, 'person'])->name('person');
            Route::get('/getUserName',[DepositController::class, 'getUserName'])->name('getUserName');
            Route::post('/getUserName',[DepositController::class, 'getUserNameNext'])->name('get.user.next');
            Route::post('/otp/verify/deposit',[DepositController::class, 'verifyDeposit'])->name('deposit.verify');

            Route::post('/otp/verify/withdraw',[DepositController::class, 'verifyWithdraw'])->name('withdraw.verify');


            Route::get('withdraw/create', [DepositController::class, 'withdrawCreate'])->name('withdraw.create');
            Route::post('withdraw/store', [DepositController::class, 'withdrawStore'])->name('withdraw.store');
            Route::get('roadmap', [DepositController::class, 'roadMap'])->name('roadmap');
            Route::get('deposit/log', [LogController::class, 'depositLog'])->name('deposit.log');

            Route::get('commision', [LogController::class, 'Commision'])->name('commision');


            Route::get('subscription-log', [LogController::class, 'subscriptionLog'])->name('subscription');

            Route::get('refferal', [LogController::class, 'refferalLog'])->name('refferalLog');
            Route::get('direct/reward', [LogController::class, 'directReward'])->name('direct.reward');
        });
    });
});

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('current-price', [CryptoTradeController::class, 'currentPrice'])->name('user.current-price');

Route::get('get-ticker', [CryptoTradeController::class, 'latestTicker'])->name('ticker');

Route::get('trading-return', [CryptoTradeController::class, 'tradingInterest'])->name('trading-interest');

Route::get('change-language', [FrontendController::class, 'changeLanguage'])->name('change-language');

Route::get('{pages}', [FrontendController::class, 'page'])->name('pages');

Route::get('blog/{id}/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');
Route::get('our/team', [FrontendController::class, 'teams'])->name('our.team');
Route::get('our/license', [FrontendController::class, 'license'])->name('our.license');

Route::get('links/{id}/{slug}', [FrontendController::class, 'linksDetails'])->name('links');

Route::post('subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');

Route::post('contact', [FrontendController::class, 'contactSend'])->name('contact');
//
//Route::get('terms_condition', [FrontendController::class, 'terms_condition'])->name('terms_condition');
