<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        return view("Contact");

    }
}
