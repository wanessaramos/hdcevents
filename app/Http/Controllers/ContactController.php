<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function create(){
        return view('contact.create');
    }
}
