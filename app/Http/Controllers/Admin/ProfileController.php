<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
	public function index($id = null)
	{
		$admin = ['name' => '', 'email' => ''];
		if(is_numeric($id))
		{
			$admin = DB::table('admins')
				->where('id', '=', $id)
				->select(array_keys($admin))
				->first();

		}

		return view('admin.profile', ['admin' => $admin]);
	}

	public function update(Request $request, $id = null)
	{
		$data = $request->all();
		$data['password'] = Hash::make($request->password);
		DB::table('admins')
			->where('id', '=', $id)
			->update([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => $data['password']
			]);

		return redirect()->back()->with('message', 'SAVE SUCCESS');
	}

	public function listAdmin()
	{
		$list = DB::table('admins')
			->where('id', '>', 1)
			->select('name', 'id', 'email')
			->get();

		return view('admin.listadmin', ['list' => $list]);
	}

	public function listAdminAdd(Request $request)
	{
		$data = $request->all();
		$data['password'] = Hash::make($request->password);
		DB::table('admins')->insert([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => $data['password']
		]);

		return redirect('/admin/listadmins');
	}

	public function listAdminDelete($id)
	{
		DB::table('admins')
		->where('id', '=', $id)
		->delete();

		return redirect()->back();
	}

}
