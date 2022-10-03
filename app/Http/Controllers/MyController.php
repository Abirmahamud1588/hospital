<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    public function index2(){

        $doctors = Doctor::get();

     return  view('front.index' ,compact('doctors'));


        }

}
