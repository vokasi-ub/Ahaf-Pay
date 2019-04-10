<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function regis()
    {
        $this->validate(request(), [
            'id_admin' => 'required',
            'nama_admin' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::create(request(['id_admin', 'nama_admin', 'username', 'password']));

        auth('admin')->login($admin);
        return redirect()->to('index');
    }

    public function vlog()
    {
        return view('login');
    }

    public function store()
    {
        if (auth('admin')->attempt(request(['username', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Username atau Pasword Salah, please try again'
            ]);
        }
        
        return redirect()->to('index');
    }

    public function destroy()
    {
        /*auth('admin')->logout();*/
        Session::flush();
        
        return redirect()->to('login');
    }

    
}
