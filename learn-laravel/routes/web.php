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
Route::group(["prefix"=>"/register"], function(){
  Route::get('/', [RegistrationController::class, 'index']);
  Route::post('/', [RegistrationController::class, 'register']);
  Route::get('view', [RegistrationController::class, 'view'])->name('customer.view');
  Route::get('trash', [RegistrationController::class, 'trash'])->name('customer.trash');
  Route::get('delete/{id}', [RegistrationController::class, 'delete'])->name('customer.delete');
  Route::get('force-delete/{id}', [RegistrationController::class, 'forceDelete'])->name('customer.force-delete');
  Route::get('restore/{id}', [RegistrationController::class, 'restore'])->name('customer.restore');
  Route::get('edit/{id}', [RegistrationController::class, 'edit'])->name('customer.edit');
  Route::post('update/{id}', [RegistrationController::class, 'update'])->name('customer.update');
});

Route::get('/upload', function(){
  return view('upload');
});

Route::post('/upload', [RegistrationController::class, "upload"]);

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
