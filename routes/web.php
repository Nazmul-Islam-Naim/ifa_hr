<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware'=>['auth']],function(){
    // Route::get('select-branch', [App\Http\Controllers\HomeController::class, 'selectBranch'])->name('select-branch');
    Route::get('admin-proceed-to-dashboard/{id}', [App\Http\Controllers\HomeController::class, 'adminSelectedDashboard']);
});
Route::group(['middleware'=>['auth', 'branch', 'user_role']],function(){
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	//****** Accounts ***********//
    Route::prefix(config('app.account'))->group(function () {
        Route::resource('account-type', 'App\Http\Controllers\AccountTypeController');
        Route::resource('bank-account', 'App\Http\Controllers\BankAccountController');
        Route::get('bank-deposit/{id}', 'App\Http\Controllers\BankDepositController@bankDeposit');
        Route::resource('bank-deposit', 'App\Http\Controllers\BankDepositController');
        Route::get('amount-transfer/{id}', 'App\Http\Controllers\AmountTransferController@amountTransfer');
        Route::resource('amount-transfer', 'App\Http\Controllers\AmountTransferController');
        Route::get('amount-withdraw/{id}', 'App\Http\Controllers\AmountWithdrawController@amountWithdraw');
        Route::resource('amount-withdraw', 'App\Http\Controllers\AmountWithdrawController');
        Route::get('bank-report/{id}', 'App\Http\Controllers\BankAccountController@showBankReport');
        Route::post('bank-report/{id}', 'App\Http\Controllers\BankAccountController@showBankReportFilter')->name('bank-report.filter');
        Route::post('find-chequeno-with-chequebook-id', 'App\Http\Controllers\AmountWithdrawController@findChequeNoWithChequeBookId');
        Route::resource('cheque-book', 'App\Http\Controllers\ChequeBookController');
        Route::resource('cheque-no', 'App\Http\Controllers\ChequeNoController');
        Route::resource('daily-transaction', 'App\Http\Controllers\DailyTransactionController');
        Route::post('daily-transaction', 'App\Http\Controllers\DailyTransactionController@filter')->name('transaction.filter');
        Route::get('final-report', 'App\Http\Controllers\DailyTransactionController@finalReport');
        Route::post('final-report', 'App\Http\Controllers\DailyTransactionController@finalReportFiltering')->name('final-report.filter');
    });

    //******** Other Receive *******//
    Route::prefix(config('app.or'))->group(function () {
        Route::resource('receive-type', 'App\Http\Controllers\ReceiveTypeController');
        Route::resource('receive-sub-type', 'App\Http\Controllers\ReceiveSubTypeController');
        Route::resource('receive-voucher', 'App\Http\Controllers\ReceiveVoucherController');
        Route::get('receive-voucher-report', 'App\Http\Controllers\ReceiveVoucherController@report');
        Route::post('receive-voucher-report', 'App\Http\Controllers\ReceiveVoucherController@filter')->name('receive.filter');
        Route::post('find-receive-subtype-with-type-id', 'App\Http\Controllers\ReceiveVoucherController@findReceiveSubTypeWithType');
    });

    //******** Other Payment *******//
    Route::prefix(config('app.op'))->group(function () {
        Route::resource('payment-type', 'App\Http\Controllers\PaymentTypeController');
        Route::resource('payment-sub-type', 'App\Http\Controllers\PaymentSubTypeController');
        Route::resource('payment-voucher', 'App\Http\Controllers\PaymentVoucherController');
        Route::get('payment-voucher-report', 'App\Http\Controllers\PaymentVoucherController@report');
        Route::post('payment-voucher-report', 'App\Http\Controllers\PaymentVoucherController@filter')->name('payment.filter');
        Route::post('find-payment-subtype-with-type-id', 'App\Http\Controllers\PaymentVoucherController@findPaymentSubTypeWithType');
    });
    //******** catalog *******//
    Route::prefix(config('app.cat'))->group(function () {
        Route::resource('department', 'App\Http\Controllers\DepartmentController');
        Route::resource('designation', 'App\Http\Controllers\DesignationController');
        Route::resource('salary-scale', 'App\Http\Controllers\SalaryScaleController');
        Route::resource('district', 'App\Http\Controllers\DistrictController');
        Route::resource('workstation', 'App\Http\Controllers\WorkstationController');
    });

    //******** Human Resource *******//
    Route::prefix(config('app.hr'))->group(function () {
        Route::get('employee-list', 'App\Http\Controllers\EmployeeController@index');
        Route::get('employee-list/create', 'App\Http\Controllers\EmployeeController@create')->name('employee-list/create');
        Route::post('store-employee', 'App\Http\Controllers\EmployeeController@store')->name('store-employee');
        Route::get('employee-list/{id}/edit', 'App\Http\Controllers\EmployeeController@edit')->name('edit-employee-list');
        Route::put('update-employee/{id}', 'App\Http\Controllers\EmployeeController@update')->name('update-employee');
        Route::get('employee-pofile/{id}', 'App\Http\Controllers\EmployeeController@show');
        Route::get('employee-transfer', 'App\Http\Controllers\EmployeeController@employeeListForTransfer')->name('employee-transfer');
        Route::get('transfer-form/{id}', 'App\Http\Controllers\EmployeeController@trnasferForm')->name('transfer-form');
        Route::post('transfer-form/{id}', 'App\Http\Controllers\EmployeeController@trnasferFormStore')->name('transfer-form-store');
        Route::get('employee-transferred-list', 'App\Http\Controllers\EmployeeController@employeeTransferredList')->name('employee-transferred-list');
        Route::get('employee-transferred-list/{id}', 'App\Http\Controllers\EmployeeController@employeeTransferredListUpdate')->name('employee-transferred-list-edit');
        Route::put('employee-transferred-update/{id}', 'App\Http\Controllers\EmployeeController@employeeTransferredRecordUpdate')->name('employee-transferred-record-update');
        Route::get('employee-transferred-history/{id}', 'App\Http\Controllers\EmployeeController@employeeTransferHistory')->name('employee-transferred-history');
        Route::get('employee-transfer-application/{id}', 'App\Http\Controllers\EmployeeController@employeeTransferApplicationForm')->name('employee-transfer-application');
        Route::post('employee-transfer-application', 'App\Http\Controllers\EmployeeController@employeeTransferApplicationFormStore')->name('employee-transfer-application-form-store');
        Route::get('employee-transfer-application-list', 'App\Http\Controllers\EmployeeController@employeeTransferApplicationList')->name('employee-transfer-application-list');
        Route::get('employee-transfer-application-print/{id}', 'App\Http\Controllers\EmployeeController@employeeTransferApplicationPrint')->name('employee-transfer-application-print');
        Route::get('employee-transfer-application-edit/{id}', 'App\Http\Controllers\EmployeeController@employeeTransferApplicationEdit')->name('employee-transfer-application-edit');
        Route::put('employee-transfer-application-edit/{id}', 'App\Http\Controllers\EmployeeController@employeeTransferApplicationUpdate')->name('employee-transfer-application-update');
        Route::get('employee-transfer-application-delete/{id}', 'App\Http\Controllers\EmployeeController@employeeTransferApplicationDelete')->name('employee-transfer-application-delete');
        Route::get('employee-pension-prl/{id}', 'App\Http\Controllers\EmployeeController@employeePensionPrlForm')->name('employee-pension-prl');
        Route::post('employee-pension-prl/{id}', 'App\Http\Controllers\EmployeeController@employeePensionPrlFormStore')->name('employee-pension-prl-store');
        Route::get('employee-pension-prl-list', 'App\Http\Controllers\EmployeeController@employeePensionPrlList')->name('employee-pension-prl-list');
        Route::get('employee-pension-prl-history/{id}', 'App\Http\Controllers\EmployeeController@employeePensionHistory')->name('employee-pension-prl-history');
        Route::get('employee-pension-prl-edit/{id}', 'App\Http\Controllers\EmployeeController@pensionAndPrlFormEdit')->name('employee-pension-prl-edit');
        Route::put('employee-pension-prl-edit/{id}', 'App\Http\Controllers\EmployeeController@pensionAndPrlFormUpdate')->name('employee-pension-prl-update');
        Route::get('employee-pension-prl-delete/{id}', 'App\Http\Controllers\EmployeeController@pensionAndPrlDelete')->name('employee-pension-prl-delete');
        Route::get('apply-leave', 'App\Http\Controllers\EmployeeController@applyLeaveForm');
        Route::post('store-requested-leave', 'App\Http\Controllers\EmployeeController@storeApplyLeave')->name('store-requested-leave');
        Route::post('find-totalleave-with-employee-id', 'App\Http\Controllers\EmployeeController@findTtlLeaveWithEmployeeId')->name('find-totalleave-with-employee-id');

        Route::get('approve-applied-leave/{id}', 'App\Http\Controllers\EmployeeController@approveAppliedLeave');
        Route::get('reject-applied-leave/{id}', 'App\Http\Controllers\EmployeeController@rejectAppliedLeave');

        Route::resource('manage-holiday', 'App\Http\Controllers\ManageHolidayController');
        Route::get('daily-attendance', 'App\Http\Controllers\ManageAttendanceController@index');
        Route::post('daily-attendance', 'App\Http\Controllers\ManageAttendanceController@employeeListForAttendance')->name('daily-attendance.filter');
        Route::post('store-daily-attendance', 'App\Http\Controllers\ManageAttendanceController@store')->name('store-daily-attendance');
    });

    //******** users part *******//
    Route::prefix(config('app.user'))->group(function () {
        Route::resource('user-list', 'App\Http\Controllers\UserController');
    });

    //******** recycle bin part *******//
    Route::prefix(config('app.rb'))->group(function () {
        Route::get('deleted-department-list', 'App\Http\Controllers\RecycleBinController@departmentList')->name('deleted-department-list');
        Route::put('deleted-department-list/{id}', 'App\Http\Controllers\RecycleBinController@departmentRestore')->name('deleted-department-restore');
        Route::delete('deleted-department-list/{id}', 'App\Http\Controllers\RecycleBinController@departmentDelete')->name('deleted-department-delete');

        Route::get('deleted-designation-list', 'App\Http\Controllers\RecycleBinController@designationList')->name('deleted-designation-list');
        Route::put('deleted-designation-list/{id}', 'App\Http\Controllers\RecycleBinController@designationRestore')->name('deleted-designation-restore');
        Route::delete('deleted-designation-list/{id}', 'App\Http\Controllers\RecycleBinController@designationDelete')->name('deleted-designation-delete');

        Route::get('deleted-salaryscale-list', 'App\Http\Controllers\RecycleBinController@salaryscaleList')->name('deleted-salaryscale-list');
        Route::put('deleted-salaryscale-list/{id}', 'App\Http\Controllers\RecycleBinController@salaryscaleRestore')->name('deleted-salaryscale-restore');
        Route::delete('deleted-salaryscale-list/{id}', 'App\Http\Controllers\RecycleBinController@salaryscaleDelete')->name('deleted-salaryscale-delete');

        Route::get('deleted-district-list', 'App\Http\Controllers\RecycleBinController@districtList')->name('deleted-district-list');
        Route::put('deleted-district-list/{id}', 'App\Http\Controllers\RecycleBinController@districtRestore')->name('deleted-district-restore');
        Route::delete('deleted-district-list/{id}', 'App\Http\Controllers\RecycleBinController@districtDelete')->name('deleted-district-delete');

        Route::get('deleted-workstation-list', 'App\Http\Controllers\RecycleBinController@workstationList')->name('deleted-workstation-list');
        Route::put('deleted-workstation-list/{id}', 'App\Http\Controllers\RecycleBinController@workstationRestore')->name('deleted-workstation-restore');
        Route::delete('deleted-workstation-list/{id}', 'App\Http\Controllers\RecycleBinController@workstationDelete')->name('deleted-workstation-delete');
    });

    //=============== dashboard part =================
    Route::prefix(config('app.dash'))->group(function () {
        Route::get('workstation-list', 'App\Http\Controllers\DashboardController@workstationList')->name('workstation-list');
        Route::get('department-list', 'App\Http\Controllers\DashboardController@departmentList')->name('department-list');
        Route::get('designation-list', 'App\Http\Controllers\DashboardController@designationList')->name('designation-list');
        Route::get('workstation-employee-list/{id}', 'App\Http\Controllers\DashboardController@workstationWiseEmployee')->name('workstation-employee-list');
        Route::get('department-employee-list/{id}', 'App\Http\Controllers\DashboardController@DepartmentWiseEmployee')->name('department-employee-list');
        Route::get('designation-employee-list/{id}', 'App\Http\Controllers\DashboardController@DesignationWiseEmployee')->name('designation-employee-list');
    });
    // Setting part
    Route::put('save-site-setting/{id}', 'App\Http\Controllers\SettingController@saveSiteSetting')->name('save-site-setting');
    Route::put('save-currency-setting/{id}', 'App\Http\Controllers\SettingController@saveCurrencySetting')->name('save-currency-setting');
    Route::put('update-user-password/{id}', 'App\Http\Controllers\SettingController@updateUserPassword')->name('update-user-password');
    Route::put('update-site-theme/{id}', 'App\Http\Controllers\SettingController@saveSiteTheme')->name('update-site-theme');
});

//******** Website part *******//
Route::get('room-list', 'App\Http\Controllers\Website\WebsiteController@index');
Route::get('room-detail/{id}', 'App\Http\Controllers\Website\WebsiteController@roomDetail');
Route::get('gallery', 'App\Http\Controllers\Website\WebsiteController@showGallery');
Route::get('contact', 'App\Http\Controllers\Website\WebsiteController@showContact');
Route::get('package-list', 'App\Http\Controllers\Website\WebsiteController@packageList');
Route::get('package-detail/{id}', 'App\Http\Controllers\Website\WebsiteController@packageDetail');

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});
//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});
//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});
//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});
//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});