<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;

//* Model
Route::get('/customer', function(){
  $customers = Customer::all();

  echo "<pre>";
  print_r($customers->toArray());
});

//* Basic Controller
Route::get('/', [DemoController::class, 'index']);
Route::get('/about', 'App\Http\Controllers\DemoController@about');

//Form
Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);

//* Single Action Controller
Route::get('/demo', SingleActionController::class);

//* Resource Controller
Route::resource('/temp', PhotoController::class);

//! Route Systems
// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/demo', function () {
//     return view('demo');
// });

// Route::get('/temp/{name?}', function ($name=null) {
//     $test = "<h2>H2</h2>";
//     $data = compact('name', 'test');
//     return view('template')->with($data);
// });

// Route::get('/demo/{name}/{id?}', function($name, $id=null){
//     $data = compact('name', 'id');
//     return view('demo')->with($data);
// });
