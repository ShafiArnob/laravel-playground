<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;
use Illuminate\Http\Request;

//* Handle Session
Route::get('get-all-session', function(){
  $session = session()->all();
  p($session);
});

Route::get('set-session', function(Request $request){
  $request->session()->put('uname', 'Arnob');
  $request->session()->put('uid', '123');
  // $request->session()->flash('status', 'Success');
  return redirect('get-all-session');
});

Route::get('destroy-session', function(){
  session()->forget(['uname', 'uid']);
  return redirect('get-all-session');

});

//* Model
Route::get('/customer', function(){
  $customers = Customer::all();

  echo "<pre>";
  print_r($customers->toArray());
});

//* Basic Controller
Route::get('/', [DemoController::class, 'index']);
Route::get('/about', 'App\Http\Controllers\DemoController@about')->name('about');

//Form
Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);
Route::get('/register/view', [RegistrationController::class, 'view']);
Route::get('/register/delete/{id}', [RegistrationController::class, 'delete'])->name('customer.delete');
Route::get('/register/edit/{id}', [RegistrationController::class, 'edit'])->name('customer.edit');
Route::post('/register/update/{id}', [RegistrationController::class, 'update'])->name('customer.update');



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
