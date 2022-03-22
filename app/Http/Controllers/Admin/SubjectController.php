<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
  public function getSubject($id)
  {
    $list = DB::table('list_subjects')
              ->where('id_grade', '=', $id)
              ->select('list_subjects.*')
              ->get();

    $nameGrade = DB::table('list_grades')
                  ->where('id', '=', $id)
                  ->select('name')
                  ->get();

    return view('admin.listSubject', ['list' => $list, 'grade' => $id, 'name' => $nameGrade]);
  }

  public function addSubject($id)
  {
    return view('admin.addSubject');
  }

  public function addSubjectPost($id)
  {
    DB::table('list_subjects')
      ->insert([
        'name' => $_POST['subject'],
        'id_grade' => $id,
		]);

    return redirect()->route('subject', ['id' => $id]);
  }

  public function deleteSubject($id)
  {
    DB::table('list_subjects')
      ->where('id', '=', $id)
      ->delete();

		return redirect()->back();
  }

  public function editSubject($id)
  {
    $subject = DB::table('list_subjects')
                ->where('id', '=', $id)
                ->select('name')
                ->get();

    return view('admin.editSubject', ['subject' => $subject]);
  }

  public function editSubjectPost($id)
  {
    DB::table('list_subjects')
			->where('id', '=', $id)
			->update([
				'name' => $_POST['subject'],
			]);

    $id_subject = DB::table('list_subjects')
                    ->where('id', '=', $id)
                    ->select('id_grade')
                    ->get();

    return redirect()->route('subject', ['id' => $id_subject[0]['id_grade']]);
  }

}
