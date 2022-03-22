<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;

class TestController extends Controller
{
  public function getExam($id)
  {
    $exam = DB::table('list_questions')
              ->select(DB::raw('list_questions.*, list_answers.id as answer_id, list_answers.name as answer_name, list_answers.id_question'))
              ->join('list_answers', 'list_answers.id_question', '=', 'list_questions.id')
              ->where('id_exam', '=', $id)
              ->get();

		$detailExam = DB::table(('list_exams'))
                  ->select(DB::raw('name, rate'))
                  ->where('id', '=', $id)
                  ->get();

    $detailExam = $detailExam[0];

    return view('user.getExam', ['exam' => $exam, 'nameExam' => $detailExam]);
  }

  public function postExam($id)
  {
    $res = $_POST['res'];;
    $kq = 0;
    $idUser = Auth::user()->id;

    foreach ($res as $key => $value) {
      $ans = DB::table('list_questions')
                ->select('answer')
                ->where('id', '=', $key)
                ->get();
      if($ans[0]['answer'] == $value)
      {
        $kq = $kq + 1;
      }
    }

    $nameUser = DB::table('users')
                  ->select('name')
                  ->where('id', '=', $idUser)
                  ->get();

    $nameExam = DB::table('list_exams')
                  ->select(DB::raw('list_exams.name, image, id_grade, subject, id_chapter'))
                  ->where('id', '=', $id)
                  ->get();

    $grade = DB::table('list_grades')
                ->select('name')
                ->where('id', '=', $nameExam[0]['id_grade'])
                ->get();

    $subject = DB::table('list_subjects')
                ->select('name')
                ->where('id', '=', $nameExam[0]['subject'])
                ->get();

    $chapter = DB::table('list_chapters')
                ->select('name')
                ->where('id', '=', $nameExam[0]['id_chapter'])
                ->get();

    DB::table('list_results')
      ->insert([
        'name_user' => $nameUser[0]['name'],
        'id_user' => $idUser,
        'name_exam' => $nameExam[0]['name'],
        'id_exam' => $id,
        'result' => $kq,
      ]);

    return view('user.resultExam', ['result' => $kq, 'nameUser' => $nameUser, 'nameExam' => $nameExam, 'grade' => $grade, 'subject' => $subject, 'chapter' => $chapter]);
  }

  public function getRate()
  {
    $rate = DB::table('list_exams')
              ->select('rate')
              ->where('id', '=', $_GET['id'])
              ->get();

    $rateAfter = round(($rate[0]['rate'] + (int)$_GET['rate']) / 2, 0);
    DB::table('list_exams')
      ->where('id', '=', $_GET['id'])
      ->update(['rate' => $rateAfter]);

  }
}
