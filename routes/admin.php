<?php

use App\Http\Controllers\Admin\AdultController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\CompanySettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\GuestReservationController;
use App\Http\Controllers\Admin\HotelContractController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\MealPlanController;
use App\Http\Controllers\Admin\MealPriceController;
use App\Http\Controllers\Admin\NewAgentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\TravelAgentRoomController;
use App\Http\Controllers\User\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login.form');
Route::get('/logOut', [LoginController::class, 'logout'])->name('admin.logOut');
Route::POST('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('hotel', HotelController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('roomtype', RoomTypeController::class);
    Route::resource('roomCategory', \App\Http\Controllers\Admin\RoomCategory::class);
    Route::resource('mealplan', MealPlanController::class);
    Route::resource('companysetting', CompanySettingController::class);
    Route::resource('newaAent', NewAgentController::class);
    Route::resource("guest", GuestController::class);
    Route::post('/admin/store/guest/reservation/', 'App\Http\Controllers\Admin\GuestController@storeReservationGuest')->name('guest.store.from.reservation');

    Route::resource('mealprice', MealPriceController::class);
    Route::resource('guest_reservation', GuestReservationController::class);
    Route::get('/guest/reservation/delete/this/date/{id}/', 'App\Http\Controllers\Admin\GuestReservationController@destroyDate')->name('admin.cancel.reservation');
    Route::get('/roomType/adultNumber/ajax/{id?}/', 'App\Http\Controllers\Admin\GuestReservationController@ajaxRoomTypeAdultNumber')->name('admin.roomType.adultNumber.ajax');
    Route::post('/admin/show/data/edit/{id}', 'App\Http\Controllers\Admin\GuestReservationController@showEdit')->name('guest_reservation.store.edit');
    Route::post('/admin/reservation/data/edit/update/{id}', 'App\Http\Controllers\Admin\GuestReservationController@editUpdate')->name('guest_reservation.edit.update');

    Route::get('/NumberOfReservation/ajax/{id}/{from}', 'App\Http\Controllers\Admin\GuestReservationController@ajaxNumberOfReservation')->name('admin.numberOfReservation.rate.ajax');
    Route::get('/NumberOfTravelAgent/ajax/{id}/{from}/{hotel}', 'App\Http\Controllers\Admin\GuestReservationController@ajaxNubmerOfTravelAgent')->name('admin.numberOfTravelAgent.rate.ajax');
    Route::get('/reservation/ajax/{id}/{hotel}/{from}/{nights_no}/{meal}/{category}', 'App\Http\Controllers\Admin\GuestReservationController@ajax')->name('admin.reservation.rate.ajax');
    Route::post('/admin/store/reservation/', 'App\Http\Controllers\Admin\GuestReservationController@storeReservation')->name('admin.store.reservation');
    Route::get('/admin/edit/date/reservation/{id}', 'App\Http\Controllers\Admin\GuestReservationController@editDate')->name('admin.guest_reservation.edit');
    Route::put('/admin/update/date/reservation/{id}', 'App\Http\Controllers\Admin\GuestReservationController@updateDate')->name('admin.guest_reservation.update');
    Route::get('/admin/detail/guset/reservation/{id}', 'App\Http\Controllers\Admin\GuestReservationController@detail')->name('admin.detail.guest');
    Route::get('/admin/delete/guset/reservation/{id}', 'App\Http\Controllers\Admin\GuestReservationController@detailDelete')->name('admin.detail.guest.delete');
    Route::get('/admin/report/guset/reservation/{id}', 'App\Http\Controllers\Admin\GuestReservationController@reportReservation')->name('admin.reportReservation.guest');
    Route::get('/admin/show/mealPlan/{id}', 'App\Http\Controllers\Admin\GuestReservationController@AjaxMealPlan')->name('admin.show.mealplan.hotel');
    Route::get('/admin/show/roomType/{id}', 'App\Http\Controllers\Admin\GuestReservationController@AjaxRoomType')->name('admin.show.roomType.hotel');
    Route::get('/admin/show/roomCategory/{id}', 'App\Http\Controllers\Admin\GuestReservationController@AjaxRoomCategory')->name('admin.show.roomCategory.hotel');
    Route::get('/admin/all/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationController@ShowAll')->name('admin.show.all.reservation.hotel');

/////report REservation
    Route::get('/admin/report/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@reportHotel')->name('admin.report.reservation.hotel');
    Route::get('/admin/show/report/arrival/list/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@arrivalList')->name('admin.report.arrivalList.hotel');
    Route::get('/admin/report2/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@reportHotel2')->name('admin.report2.reservation.hotel');
    Route::get('/admin/show/report/arrival/list2/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@arrivalList2')->name('admin.report.arrivalList2.hotel');
    Route::get('/admin/report/travel/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@travel')->name('admin.report.travel.reservation.hotel');
    Route::get('/admin/show/report/travel/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@showTravel')->name('admin.report.show.travel.hotel');
////////Guest Reservation
    Route::get('/admin/report/guest/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@reportGuestResrvation')->name('admin.report.guest.reservation.hotel');
    Route::get('/admin/report/guest/reservation/hotel/show', 'App\Http\Controllers\Admin\GuestReservationReportController@reportGuestResrvationShow')->name('admin.report.guest.reservation.hotel.show');
////////Hotel Reservation
    Route::get('/admin/report/Hotel/reservation/', 'App\Http\Controllers\Admin\GuestReservationReportController@reportHotelResrvation')->name('admin.report.Hotel.reservation');
    Route::get('/admin/report/Hotel/reservation/show', 'App\Http\Controllers\Admin\GuestReservationReportController@reportHotelResrvationShow')->name('admin.report.Hotel.reservation.show');
////////Agent Reservation
    Route::get('/admin/report/Agent/reservation/', 'App\Http\Controllers\Admin\GuestReservationReportController@reportAgentResrvation')->name('admin.report.Agent.reservation');
    Route::get('/admin/report/Agent/reservation/show', 'App\Http\Controllers\Admin\GuestReservationReportController@reportAgentResrvationShow')->name('admin.report.Agent.reservation.show');
//////////collect Guest
//    Route::get('/admin/collect/Guest/reservation/{id}', 'App\Http\Controllers\Admin\GuestReservationReportController@collectGuest')->name('admin.collect.guest.reservation');
//    Route::get('/admin/collect/Guest/reservation/update/balance', 'App\Http\Controllers\Admin\GuestReservationReportController@collectGuestShow')->name('admin.collect.guest.reservation.show');
////////collect Agent
    Route::get('/admin/collect/Agent/reservation/{id}', 'App\Http\Controllers\Admin\GuestReservationReportController@collectAgent')->name('admin.collect.agent.reservation');
    Route::get('/admin/collect/Agent/reservation/update/balance', 'App\Http\Controllers\Admin\GuestReservationReportController@collectAgentShow')->name('admin.collect.agent.reservation.show');
////////pay Agent
    Route::get('/admin/pay/Agent/reservation/{id}', 'App\Http\Controllers\Admin\GuestReservationReportController@payAgent')->name('admin.pay.agent.reservation');
    Route::get('/admin/pay/Agent/reservation/update/balance', 'App\Http\Controllers\Admin\GuestReservationReportController@payAgentShow')->name('admin.pay.agent.reservation.show');

////////Agent1
    Route::get('/admin/report/travel/Agent/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@travelAgent')->name('admin.report.travel.agent.reservation.hotel');
    Route::get('/admin/show/report/travel/Agent/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@showTravelAgent')->name('admin.report.show.travel.agent.hotel');
////////
/// ////////Agent2
    Route::get('/admin/report/travel/Agent/have/Room/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@travelAgent2')->name('admin.report.travel.agent2.reservation.hotel');
    Route::get('/admin/show/report/travel/Agent/have/Room/reservation/hotel', 'App\Http\Controllers\Admin\GuestReservationReportController@showTravelAgent2')->name('admin.report.show.travel.agent2.hotel');
////////
    Route::get('/admin/report/user/reservation/page', 'App\Http\Controllers\Admin\GuestReservationReportController@reportUser')->name('admin.report.user.reservation.report');
    Route::get('/admin/show/report/user/reservation/page', 'App\Http\Controllers\Admin\GuestReservationReportController@showReportUser')->name('admin.report.user.reservation.report.show');

///
    Route::resource('guest-reservation-adult', AdultController::class);
    Route::resource('guest-reservation-child', ChildController::class);
    Route::resource('hotel-contract', HotelContractController::class);
    Route::delete('/hotel/contract/delete/{id?}', [HotelContractController::class, 'delete'])->name('hotel-contract.delete');
    Route::get('/hotel/show/all/{name?}/{roomType_id}/{mealPlan_id}/{roomCategory_id}/{hotel_id}', [HotelContractController::class, 'showAll'])->name('hotel-contract.all.show');
    Route::get('/hotel/destroy/delete/all/{name?}/{roomType_id}/{mealPlan_id}/{roomCategory_id}/{hotel_id}', [HotelContractController::class, 'deleteDestory'])->name('hotel-contract.destroy.delete');
    Route::get('/hotel/contract/editAll/{name?}/{roomType_id}/{mealPlan_id}/{roomCategory_id}/{hotel_id}', [HotelContractController::class, 'editAll'])->name('hotel-contract.editAll');
    Route::PUT('/hotel/contract/updateAll/{name?}/{roomType_id}/{mealPlan_id}/{roomCategory_id}/{hotel_id}', [HotelContractController::class, 'updateAll'])->name('hotel-contract.updateAll');

    Route::get('/hotel/contract/add/{name?}/{roomType_id}/{mealPlan_id}/{roomCategory_id}/{hotel_id}', [HotelContractController::class, 'add'])->name('hotel-contract.add');
    Route::post('/hotel/contract/addDate/', [HotelContractController::class, 'addDate'])->name('hotel-contract.addDate');


    Route::resource('travelAgent-rooms', TravelAgentRoomController::class);
//////////////ReservationDate///////////

    Route::group(['prefix' => 'ReservationDate', 'as' => 'ReservationDates.'], function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ReservationDateController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\ReservationDateController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/ReservationDate/edit/{reservationDate}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ReservationDateController@edit']);
            Route::post('/ReservationDate/update/{reservationDate}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\ReservationDateController@update']);
        });
        //show offers
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\ReservationDateController@index']);
            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\ReservationDateController@data']); //.data
        });

        Route::get('/{reservationDate}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\ReservationDateController@delete']);
    });
    //////////////HotelContractReservationDate///////////

    Route::group(['prefix' => 'HotelContractReservation', 'as' => 'HotelContractReservations.'], function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\HotelContractReservationController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\HotelContractReservationController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/HotelContractReservation/edit/{hotelContractReservation}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\HotelContractReservationController@edit']);
            Route::post('/HotelContractReservation/update/{hotelContractReservation}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\HotelContractReservationController@update']);
        });
        //show offers
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\HotelContractReservationController@index']);
            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\HotelContractReservationController@data']); //.data
        });

        Route::get('/{hotelContractReservation}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\HotelContractReservationController@delete']);
    });
///////////////year
    Route::group(['prefix' => 'Year', 'as' => 'Years.'], function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\YearController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\YearController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/Year/edit/{year}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\YearController@edit']);
            Route::post('/Year/update/{year}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\YearController@update']);
        });
        //show offers
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\YearController@index']);
            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\YearController@data']); //.data
        });

        Route::get('/{year}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\YearController@delete']);
        Route::get('/', ['as' => 'index.update', 'uses' => '\App\Http\Controllers\Admin\YearController@indexUpdate']);
    });
    ///////////////acountting
    ///////////////bank
    Route::group(['prefix' => 'agent', 'as' => 'banks.'], function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\BankController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\BankController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/Bank/edit/{bank}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\BankController@edit']);
            Route::post('/Bank/update/{bank}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\BankController@update']);
        });
        //show offers
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\BankController@index']);
            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\BankController@data']); //.data
        });

        Route::get('/{bank}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\BankController@delete']);
    });
    //////bankKeeper/////////////
    Route::group(['prefix' => 'moneyKeeper', 'as' => 'moneyKeepers.'], function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\MoneyKeeperController@create']);
            Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\MoneyKeeperController@store']);
        });
        //edit / update
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('moneyKeeper/{moneyKeeper?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\MoneyKeeperController@edit']);
            Route::post('moneyKeeper/{moneyKeeper?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\MoneyKeeperController@update']);
        });
        //show moneyKeepers
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\MoneyKeeperController@index']);
            Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\MoneyKeeperController@data']); //.data
        });

        Route::get('/{moneyKeeper?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\MoneyKeeperController@delete']);
    });
    ///////////collection
    Route::get('/admin/collections/kind/push/show/ajax/{id}', [\App\Http\Controllers\Admin\CollectionController::class, 'ajaxKindPush'])->name('admin.show.kindPush.hotel');
    Route::get('/admin/show/hotel/reservation/ajax/{id}', [\App\Http\Controllers\Admin\CollectionController::class, 'hotelReservationAjax'])->name('admin.show.hotel.reservation');
    ///agent
    Route::get('/admin/collections/agent/', [\App\Http\Controllers\Admin\CollectionController::class, 'agentCollect'])->name('agent.collect');
    Route::post('/admin/collections/agent/store/', [\App\Http\Controllers\Admin\CollectionController::class, 'agentCollectStore'])->name('agent.collection.collect');
    Route::get('/admin/pays/agent/', [\App\Http\Controllers\Admin\CollectionController::class, 'agentPay'])->name('agent.pay');
    Route::post('/admin/pays/agent/store/', [\App\Http\Controllers\Admin\CollectionController::class, 'agentPayStore'])->name('agent.collection.pay');
///guest
    Route::get('/admin/collections/guest/', [\App\Http\Controllers\Admin\CollectionController::class, 'guestCollect'])->name('guest.collect');
    Route::post('/admin/collections/guest/store/', [\App\Http\Controllers\Admin\CollectionController::class, 'guestCollectStore'])->name('guest.collection.collect');
    Route::get('/admin/pays/guest/', [\App\Http\Controllers\Admin\CollectionController::class, 'guestPay'])->name('guest.pay');
    Route::post('/admin/pays/guest/store/', [\App\Http\Controllers\Admin\CollectionController::class, 'guestPayStore'])->name('guest.collection.pay');
////hotel
    Route::get('/admin/collections/hotel/', [\App\Http\Controllers\Admin\CollectionController::class, 'hotelCollect'])->name('hotel.collect');
    Route::post('/admin/collections/hotel/store/', [\App\Http\Controllers\Admin\CollectionController::class, 'hotelCollectStore'])->name('hotel.collection.collect');
    Route::get('/admin/pays/hotel/', [\App\Http\Controllers\Admin\CollectionController::class, 'hotelPay'])->name('hotel.pay');
    Route::post('/admin/pays/hotel/store/', [\App\Http\Controllers\Admin\CollectionController::class, 'hotelPayStore'])->name('hotel.collection.pay');
////////bankSteps
    Route::get('/admin/bank/steps/', [\App\Http\Controllers\Admin\CollectionController::class, 'bankStep'])->name('bank.steps');
    Route::get('/admin/moneyKeeper/steps/', [\App\Http\Controllers\Admin\CollectionController::class, 'moneyKeeperStep'])->name('moneyKeeper.steps');
    Route::get('/admin/visa/steps/', [\App\Http\Controllers\Admin\CollectionController::class, 'visaStep'])->name('visa.steps');



});
