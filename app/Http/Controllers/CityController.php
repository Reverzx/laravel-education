<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class CityController extends Controller

{
    public function index(){

        return view("City");

    }

}

