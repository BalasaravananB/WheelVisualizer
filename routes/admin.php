<?php

Route::get('/home', function () { 
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    // dd($users);

    return view('admin.home');
})->name('home');



Route::get('/', function () {
    return view('admin.home');
})->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('inventories/count', 'InventoryController@getUploadInventories');
Route::get('logs/vftp', 'InventoryController@liveReport');

Route::resource('ticket', 'Resource\TicketResource');
Route::resource('user', 'Resource\UserResource');
Route::resource('subadmin', 'Resource\SubadminResource');
Route::resource('wheel', 'Resource\WheelResource');
Route::resource('brands', 'Resource\TireBrandsResource');


// Routes for CRUD 
Route::resource('cmspage','CMSPageController'); 
Route::resource('slider','SliderController'); 
Route::resource('dropshipper','DropshipperController'); 
Route::resource('chassis', 'ChassisController'); 
Route::resource('chassismodel', 'ChassisModelController'); 
Route::resource('feedback', 'FeedbackController');
Route::resource('enquiry', 'EnquiryController');
Route::resource('review', 'ReviewController');
Route::resource('post', 'PostController');
Route::resource('postcomment', 'PostCommentController');


// Routes for Meta Keywords
Route::resource('metakeywords', 'MetaKeywordController');
Route::post('metakeywords/uploadcsv', 'MetaKeywordController@uploadcsv');

// Routes for Vehicles
Route::resource('vehicle', 'VehicleController'); 
Route::post('vehicle/uploadcsv', 'VehicleController@uploadcsv'); 



// Routes for Tires
Route::resource('tire', 'Resource\TireResource'); 
Route::post('tire/uploadcsv', 'Resource\TireResource@uploadcsv');
Route::get('/tire/{id?}/model', 'Resource\TireResource@getTiresByModel')->name('tire.model');  


// Routes for Wheel Products
Route::resource('wheelproduct', 'Resource\WheelProductResource');
Route::post('wheelproduct/uploadcsv', 'Resource\WheelProductResource@uploadcsv');
Route::get('/wheelproduct/{id?}/model', 'Resource\WheelProductResource@getProductsByModel')->name('wheelproduct.model');  


// Routes for Cars Images 
Route::resource('car', 'Resource\CarResource');
Route::get('/car/images/{id}', 'Resource\CarResource@getCarImages')->name('car.images'); 
Route::post('/car/images/{id}', 'Resource\CarResource@setCarImages')->name('car.images.store');
Route::patch('/car/images/{id}', 'Resource\CarResource@updateCarImages')->name('car.images.update');
Route::delete('/car/images/{id}', 'Resource\CarResource@destroyCarImages')->name('car.images.destroy');
 


// Routes for Orders pages 
Route::get('orders', 'OrderController@index');
Route::get('order/update/{order}', 'OrderController@update');

// Route for Settings 
Route::get('cms/{category?}','SettingsController@index'); 
Route::post('cms/{category?}', 'SettingsController@store'); 

// Route for Exports
Route::get('/exportTable/{category?}', 'HomeController@exportTable'); 

