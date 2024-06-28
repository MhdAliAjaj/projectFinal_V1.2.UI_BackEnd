<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContactForm;

class contactcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:send-message', ['only' => ['index']]);
    }
    public function index(){

        $contacts=ContactForm::with('user')->get();
        return view('contact.index', compact('contacts'));
    }
}
