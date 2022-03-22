<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BaseController extends Controller
{
	public function index()
	{
		return view('admin.index');
	}
	public function login(Request $request)
	{
		$auth = Auth::guard('admin');
		if ($auth->check()) {

			return redirect('admin/listadmins');
		}
		if($request->isMethod('post'))
		{
			$credentials = $request->only('name','password');
			if (Auth::guard('admin')->attempt($credentials)) {
				return redirect('admin/listadmins');
			} else
			{
				return redirect()->back()->with('message', 'LOGIN FAILED');
			}
		}
		return view('admin.login');
	}
	public function logout()
	{
		auth()->guard('admin')->logout();
    \Session::flush();
		return redirect('admin/login');
	}
	public function profile()
	{
		return view('admin.profile');
	}
}
