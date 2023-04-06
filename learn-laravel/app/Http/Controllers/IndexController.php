<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Group;

class IndexController extends Controller
{   
    // One-To-One
    public function index(){
        return Member::with('getGroup')->get();
    }

    //One-To-Many
    public function oneMany(){
        return Member::with('group')->get();
    }

    public function group(){
        return Group::with('member')->get();
    }
}
