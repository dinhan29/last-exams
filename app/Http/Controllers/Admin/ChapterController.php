<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
  public function getChapter($id)
  {
    $list = DB::table('list_chapters')
              ->where('id_subject', '=', $id)
              ->select('list_chapters.*')
              ->get();

    $subject = DB::table('list_subjects')
                ->where('id', '=', $id)
                ->select(DB::raw('name, id_grade'))
                ->get();


    $grade = DB::table('list_grades')
                ->where('id', '=', $subject[0]['id_grade'])
                ->select('name')
                ->get();


    return view('admin.listChapter', ['list' => $list, 'subject' => $subject, 'idSub' => $id, 'grade' => $grade]);
  }

  public function addChapter($id)
  {
    return view('admin.addChapter');
  }

  public function addChapterPost($id)
  {
    // echo $id;
    // dd($_POST);
    DB::table('list_chapters')
      ->insert([
        'name' => $_POST['chapter'],
        'id_subject' => $id,
		]);

    return redirect()->route('chapter', ['id' => $id]);
  }

  public function deleteChapter($id)
  {
    DB::table('list_chapters')
      ->where('id', '=', $id)
      ->delete();

		return redirect()->back();
  }

  public function editChapter($id)
  {
    $chapter = DB::table('list_chapters')
                ->where('id', '=', $id)
                ->select('name')
                ->get();

    return view('admin.editChapter', ['chapter' => $chapter]);
  }

  public function editChapterPost($id)
  {
    DB::table('list_chapters')
			->where('id', '=', $id)
			->update([
				'name' => $_POST['chapter'],
			]);

    $id_grade = DB::table('list_chapters')
                    ->where('id', '=', $id)
                    ->select('id_subject')
                    ->get();

    return redirect()->route('chapter', ['id' => $id_grade[0]['id_subject']]);

  }
}
