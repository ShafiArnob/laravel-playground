<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class RegistrationController extends Controller
{
    public function index(){
        $url = url('/register');
        $title = "Customer Registration";
        $customer = new Customer();
        $data = compact('url', 'title', 'customer');
        return view('form')->with($data);
    }
    
    public function register(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>"required|confirmed",
                'password_confirmation'=> 'required'
            ]
        );
        // if the name in the form is different in password we can use in the confirm_pass same:<confirm password input>
        
        // p($request ->all());
        // die;
        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();

        return redirect('/register/view');
    }

    public function view(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $customers = Customer::where('name', 'LIKE', "$search%")->orWhere('email', 'LIKE', "$search%")->get();
        }else{
            $customers = Customer::paginate(15);
        }
        $data = compact('customers', 'search');
        return view('customer-view')->with($data);
    }
    // trash view
    public function trash(){
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }
    public function delete($id){
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('/register/view');
    }
    public function restore($id){
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->restore();
        }
        return redirect('/register/view');
    }
    public function forceDelete($id){
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->forceDelete();
        }
        return redirect('/register/trash');
    }

    public function edit($id){
        $customer = Customer::find($id);
        if(is_null($customer)){
            return redirect('/register/view'); 
        }
        else{
            $title = "Update Customer";
            $url = url('/register/update') . '/' . $id;
            $data = compact('customer', 'url', 'title');
            return view('form')->with($data);
        }
        
    }

    public function update($id, Request $request){
        
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->save();

        return redirect('/register/view');
    }

    public function upload(Request $request){
        $fileName = time(). "-ws." . $request->file('image')->getClientOriginalExtension();
        echo $request->file('image')->storeAs('uploads', $fileName);
    }
}
