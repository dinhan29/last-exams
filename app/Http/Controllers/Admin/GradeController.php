<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
  public function getGrade()
  {
    $list = DB::table('list_grades')
              ->select('list_grades.*')
              ->get();

    return view('admin.listGrade', ['list' => $list]);
  }

  public function addGrade()
  {
    return view('admin.addGrade');
  }

  public function addGradePost()
  {
    DB::table('list_grades')
      ->insert([
        'name' => $_POST['grade'],
		  ]);

		return redirect('/admin/listgrade');
  }

  public function deleteGrade($id)
  {
    DB::table('list_grades')
      ->where('id', '=', $id)
      ->delete();

		return redirect()->back();
  }

  public function editGrade($id)
  {
    $grade = DB::table('list_grades')
                ->where('id', '=', $id)
                ->select('name')
                ->get();

    return view('admin.editGrade', ['grade' => $grade]);
  }

  public function editGradePost($id)
  {
    DB::table('list_grades')
			->where('id', '=', $id)
			->update([
				'name' => $_POST['grade'],
			]);

    return redirect('/admin/listgrade');
  }

}
