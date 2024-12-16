<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function search()
    {
        return view('client.search');
    }

    public function contracts()
    {
        return view('client.contracts');
    }

    public function history()
    {
        return view('client.history');
    }

    public function lawyers()
    {
        return view('client.lawyers');
    }
}
