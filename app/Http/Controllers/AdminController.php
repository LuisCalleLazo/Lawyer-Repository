<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageNumber = $request->input('pageNumber', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;

        $totalItems = Admin::count();
        $totalPages = ceil($totalItems / $perPage);


        $data = DB::table('users')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('user_info.photo', 'users.id', 'user_info.first_name', 'user_info.last_name', 'user_info.birth_date', 'user_info.email')
            ->skip($offset) // Aplica OFFSET
            ->take($perPage) // Aplica LIMIT
            ->get();


        return view('admin.index')
            ->with('admins', $data)
            ->with('totalPages', $totalPages)
            ->with('totalItems', $totalItems)
            ->with('pageNumber', $pageNumber);
    }

    public function messages()
    {
        return view('admin.messages');
    }

    public function rols(Request $request)
    {
        $pageNumber = $request->input('pageNumber', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;

        $totalItems = Rol::count();
        $totalPages = ceil($totalItems / $perPage);


        $data = DB::table('rols')
            ->select('id', 'name', 'description')
            ->skip($offset) // Aplica OFFSET
            ->take($perPage) // Aplica LIMIT
            ->get();

        return view('admin.rols')
        ->with('admins', $data)
        ->with('totalPages', $totalPages)
        ->with('totalItems', $totalItems)
        ->with('pageNumber', $pageNumber);
    }

    public function clients(Request $request)
    {
        $pageNumber = $request->input('pageNumber', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;

        $totalItems = Admin::count();
        $totalPages = ceil($totalItems / $perPage);


        $data = DB::table('users')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('user_info.photo', 'users.id', 'user_info.first_name', 'user_info.last_name', 'user_info.birth_date', 'user_info.email')
            ->skip($offset) // Aplica OFFSET
            ->take($perPage) // Aplica LIMIT
            ->get();
        return view('admin.clients')
            ->with('admins', $data)
            ->with('totalPages', $totalPages)
            ->with('totalItems', $totalItems)
            ->with('pageNumber', $pageNumber);
    }

    public function lawyers(Request $request)
    {
        $pageNumber = $request->input('pageNumber', 5);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;

        $totalItems = Admin::count();
        $totalPages = ceil($totalItems / $perPage);


        $data = DB::table('users')
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->select('user_info.photo', 'users.id', 'user_info.first_name', 'user_info.last_name', 'user_info.birth_date', 'user_info.email')
            ->skip($offset) // Aplica OFFSET
            ->take($perPage) // Aplica LIMIT
            ->get();

        return view('admin.lawyers')
            ->with('admins', $data)
            ->with('totalPages', $totalPages)
            ->with('totalItems', $totalItems)
            ->with('pageNumber', $pageNumber);
    }

    public function contracts(Request $request)
    {
        $pageNumber = $request->input('pageNumber', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;

        $totalItems = Admin::count();
        $totalPages = ceil($totalItems / $perPage);


        $data = DB::table('contracts')
            ->select('id', 'amount', 'state', 'type', 'description', 'contract')
            ->skip($offset) // Aplica OFFSET
            ->take($perPage) // Aplica LIMIT
            ->get();

        return view('admin.contracts')
            ->with('admins', $data)
            ->with('totalPages', $totalPages)
            ->with('totalItems', $totalItems)
            ->with('pageNumber', $pageNumber);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        //
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        //
    }
}
