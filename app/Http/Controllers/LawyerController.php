<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LawyerController extends Controller
{
    public function contracts()
    {
        return view('lawyer.clients');
    }

    public function history()
    {
        return view('lawyer.history');
    }

    public function clients()
    {
        return view('lawyer.clients');
    }


    public function conversation()
    {
        return view('lawyer.conversation');
    }
}
