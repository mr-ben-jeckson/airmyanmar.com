<?php

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

/** Guest Routes */
Route::get('/', 'PageController@welcome');
Route::get('/home', 'PageController@welcome');

/** Authentication */
Route::post('/user/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('login-facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login-facebook-callback', 'Auth\LoginController@handleProviderCallback');
Route::get('login-google-plus','Auth\LoginController@GredirectToProvider');
Route::get('login-google-plus-callback','Auth\LoginController@GhandleProviderCallback');

/** Flight Sectors or Destinations */
Route::get('/flights/destinations', 'PageController@places');
Route::get('/destination/{slug}', 'PageController@city');

/** Airlines Profiles */
Route::get('/flights/{slug}', 'PageController@airline');

/** Contact Us */
Route::get('/contact-us', 'PageController@contact');
Route::post('/send-message', 'PageController@sendMessage');

/** Subscription */
Route::post('/subscription', 'NewsletterController@store');

/** Flight Search */
Route::get('/search/flights/oneway', 'FlightsController@show');
Route::get('/search/flights/round-trip', 'FlightsController@showFirstFlight');

/** Round Trip Booking */
Route::get('/selected/round-trip', 'BookingController@indexRound');

/** One Way Booking */
Route::get('/selected/flight', 'BookingController@index');
Route::get('/flight/booking', 'BookingController@show');
Route::post('/flight/booked', 'BookingController@create');

/** Round Flight Booking */
Route::get('/selected/dep-flight', 'FlightsController@showSecondFlight');

/** Track Booking */
Route::get('/track-booking', 'BookingController@indexTrack');
Route::post('/track-booking', 'BookingController@showTrack');

/** Payment Checkout */
Route::get('/booking/payment/checkout/{booking_id}', 'PaymentController@index');

/** E-confirmation Download */
Route::get('/booking/download/e-confirmation/{booking_id}', 'BookingController@showEletter');

/** Download E ticket */
Route::get('/booking/download/e-ticket/{booking_id}', 'BookingController@downloadTicket');

Route::get('/test', 'PageController@test');

/** Page */
Route::get('/page/{slug}', 'PageController@show');
Route::get('/read-more/{page_id}', 'PageController@redirect');

/** Testimonial */
Route::get('/testimonials', 'TestimonialController@index');
Route::post('/testimonials', 'TestimonialController@create');

/** User Booking */
Route::get('/user/bookings', 'BookingController@myBooking');
Route::get('/user/booking/filter', 'BookingController@filter');
Route::get('/user/ranking', 'BookingController@rank');

/** Pop Up Hide */
Route::get('/pop-up/hide', 'PageController@popUp');

/** Promotion Read */
Route::get('/flights/seasonal-promotions/{slug}', 'PageController@promoView');
Route::get('/flights-seasonal-promotions', 'PageController@promo');

/** Stories */
Route::get('/stories', 'PageController@stories');
Route::get('/stories/{slug}', 'PageController@storyDetail');

/** How to Book */
Route::get('/how-to-book', 'PageController@pageRedirect');

/** Fare Check */
Route::get('/local-check', 'PageController@localCheck');
Route::get('/local-un-check', 'PageController@localUnCheck');

/** Admin Panel */
Route::group(array('prefix'=>'admin','namespace'=>'admin','middleware'=>'admin'), function (){

    /** Admin Dashboard */
    Route::get('/', 'AdminController@index');

    /** Pages */
    Route::get('/page/add', 'PageController@create');
    Route::post('/page/add', 'PageController@add');
    Route::get('/pages', 'PageController@show');
    Route::get('/page/show/{id}', 'PageController@pageShow');
    Route::get('/page/hide/{id}', 'PageController@pageHide');
    Route::get('/page/view/{id}', 'PageController@view');
    Route::get('/page/edit/{id}', 'PageController@edit');
    Route::post('/page/edit/{id}', 'PageController@update');
    Route::get('/page/delete/{id}', 'PageController@delete');

    /** Main Content */
    Route::get('/main-content', 'PageController@contentShow');
    Route::post('/main-content', 'PageController@contentUpdate');

    /** Banner */
    Route::get('/banner/add', 'BannerController@add');
    Route::post('/banner/add', 'BannerController@create');
    Route::get('/banner/hide/{id}', 'BannerController@hide');
    Route::get('/banner/show/{id}', 'BannerController@show');
    Route::get('/banner/edit/{id}', 'BannerController@edit');
    Route::post('/banner/edit/{id}', 'BannerController@update');
    Route::get('/banner/delete/{id}', 'BannerController@delete');
    Route::get('/banners', 'BannerController@view');


    /** Flight Ticket Add */
    Route::get('/flight/add', 'TicketsController@create');
    Route::post('/flight/add', 'TicketsController@store');
    /** Flight Manage */
    Route::get('/tickets', 'TicketsController@index');
    Route::get('/flight/delete/{id}', 'TicketsController@destroy');
    Route::get('/flight/edit/{id}', 'TicketsController@edit');
    Route::post('/flight/edit/{id}', 'TicketsController@update');
    Route::get('/flights/search', 'TicketsController@search');
    Route::get('/flights/filter', 'TicketsController@show');

    /** Coupon Make */
    Route::get('/promo/add', 'CouponController@create');
    Route::post('/promo/add', 'CouponController@save');
    Route::get('/promo', 'CouponController@index');
    Route::get('/promo/edit/{id}', 'CouponController@edit');
    Route::post('/promo/edit/{id}', 'CouponController@update');
    Route::get('/promo/delete/{id}', 'CouponController@delete');

    /** SEO Setting */
    Route::get('/setting/seo', 'SeoController@index');
    Route::post('/setting/seo', 'SeoController@update');

    /** Social Account Setting */
    Route::get('/setting/social', 'AccountController@index');
    Route::post('/setting/social', 'AccountController@update');

    /** Code Setting */
    Route::get('/setting/code', 'CodeController@index');
    Route::post('/setting/code', 'CodeController@update');


    /** Airlines Management */
    Route::get('/airlines', 'AirlinesController@index');
    Route::get('/airline/edit/{id}', 'AirlinesController@edit');
    Route::post('/airline/edit/{id}', 'AirlinesController@update');
    Route::get('/airline/delete/{id}', 'AirlinesController@destroy');
    Route::get('/airline/view/{id}', 'AirlinesController@show');
    Route::get('/airline/add', 'AirlinesController@create');
    Route::post('/airline/add', 'AirlinesController@store');

    /** Destination Management */
    Route::get('/destinations', 'CitiesController@index');
    Route::get('/destinations/edit/{id}', 'CitiesController@edit');
    Route::post('/destinations/edit/{id}', 'CitiesController@update');
    Route::get('/destinations/{id}/delete', 'CitiesController@destroy');
    Route::get('/destinations/add', 'CitiesController@create');
    Route::post('/destinations/add', 'CitiesController@store');
    Route::get('/destinations/show/{id}', 'CitiesController@show');

    /** Testimonial Management */
    Route::get('/testimonial', 'TestimonialController@index');
    Route::get('/testimonial/hide/{id}', 'TestimonialController@hide');
    Route::get('/testimonial/show/{id}', 'TestimonialController@show');
    Route::get('/testimonial/{id}', 'TestimonialController@detail');
    Route::get('/testimonial/delete/{id}', 'TestimonialController@delete');
    Route::get('/testimonial-add', 'TestimonialController@add');
    Route::get('/testimonial/edit/{id}', 'TestimonialController@edit');
    Route::post('/testimonial/edit/{id}', 'TestimonialController@update');
    Route::post('/testimonial-add', 'TestimonialController@store');

    /** Announcement Management */
    Route::get('/announcements', 'AncController@index');
    Route::get('/announcement/add', 'AncController@add');
    Route::post('/announcement/add', 'AncController@create');
    Route::get('/announcement/edit/{id}', 'AncController@edit');
    Route::post('/announcement/edit/{id}', 'AncController@update');
    Route::get('/announcement/show/{id}', 'AncController@show');
    Route::get('/announcement/hide/{id}', 'AncController@hide');
    Route::get('/announcement/delete/{id}', 'AncController@delete');
    Route::get('/announcement/view/{id}', 'AncController@view');

    /** Message */
    Route::get('/message', 'MessageController@index');
    Route::get('/messages/{id}', 'MessageController@show');
    Route::get('/message/delete/{id}', 'MessageController@delete');

    /** User */
    Route::get('/user', 'UserController@index');
    Route::get('/user/{id}', 'UserController@show');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/edit/{id}', 'UserController@update');

    /** Passengers */
    Route::get('/passengers/', 'AdminController@passengers');

    /** Notification */
    Route::get('/mark-read-all/notifications', 'AdminController@markReadAll');

    /** Booking Management */
    Route::get('/booking', 'BookingController@index');
    Route::get('/booking/detail/{id}', 'BookingController@detail');
    Route::post('/booking/change/dep/date/{id}', 'BookingController@changeDepDate');
    Route::post('/booking/change/return/date/{id}', 'BookingController@changeReturnDate');
    Route::post('/booking/detail/{id}', 'BookingController@saleAction');
    Route::get('/booking/filter', 'BookingController@filter');

    /** Stories */
    Route::get('/stories', 'StoryController@index');
    Route::get('/story/add', 'StoryController@create');
    Route::post('/story/add', 'StoryController@store');
    Route::get('/story/edit/{id}', 'StoryController@edit');
    Route::post('/story/edit/{id}', 'StoryController@update');
    Route::get('/story/show/{id}', 'StoryController@show');
    Route::get('/story/hide/{id}', 'StoryController@hide');
    Route::get('/story/delete/{id}', 'StoryController@destroy');

    /** Setting */
    Route::get('/setting/contact', 'AdminController@contact');
    Route::post('/setting/contact', 'AdminController@updateContact');

});

