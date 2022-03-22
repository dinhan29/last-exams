<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
use File;

class ExamController extends Controller
{
	public function listExams()
	{
		$id = Auth::user()->id;
		$list = DB::table('list_exams')
							->select('list_exams.id', 'list_exams.name', 'list_subjects.name as nameSubject','list_exams.status', 'list_exams.created_at')
							->join('list_subjects', 'list_subjects.id', '=', 'list_exams.subject')
							->where('id_user', '=', $id)
							->get();

		$people = DB::table('list_results')
								->select(DB::raw('list_results.id_exam, COUNT(list_results.id_exam) as people'))
								->join('list_exams', 'list_exams.id', '=', 'list_results.id_exam')
								->where('list_exams.id_user', '=', $id)
								->groupBy('list_results.id_exam')
								->get();

		$list = $list->jsonserialize();

		for ($i=0; $i < \sizeof($list) ; $i++) {
			if ($i < \sizeof($people))
			{
				if ($list[$i]['id'] == $people[$i]['id_exam'] )
				{
					$list[$i]['people'] = $people[$i]['people'];
				} else
				{
					$list[$i]['people'] = 0;
				}
			} else {
				$list[$i]['people'] = 0;
			}
		}
		// dd($list);
		return view('user.list', ['list' => $list]);
	}

	public function getDetail($id)
	{
		$exam = DB::table('list_questions')
			->select(DB::raw('list_questions.*, list_answers.id as answer_id, list_answers.name as answer_name, list_answers.id_question'))
			->join('list_answers', 'list_answers.id_question', '=', 'list_questions.id')
			->where('id_exam', '=', $id)
			->get();

		$nameExam = DB::table(('list_exams'))
									->select(DB::raw('name, id_grade, subject, id_chapter, image'))
									->where('id', '=', $id)
									->get();

		$grade = DB::table('list_grades')
								->select(DB::raw('id, name'))
								->get();

		$subject = DB::table('list_subjects')
								->where('id_grade', '=', $nameExam[0]['id_grade'])
								->select(DB::raw('id, name'))
								->get();

		$chapter = DB::table('list_chapters')
								->select(DB::raw('id, name'))
								->where('id_subject', '=', $nameExam[0]['subject'])
								->get();

		$nameExam = $nameExam[0];

		return view('user.detail', ['exam' => $exam, 'nameExam' => $nameExam, 'grade' => $grade, 'subject' => $subject, 'chapter' => $chapter]);
	}

	public function postDetail(Request $request)
	{
		$ques = $_POST['q'];
		$ans = $_POST['a'];
		$res = $_POST['res'];

		$id = $request->route('id');
		$file = $request->image;
		$nameImg =  $file->getClientOriginalName();

		$destinationPath = public_path().'/user/dist/img/subject' ;
		$path = public_path().'/user/dist/img/subject/'.$nameImg ;
		$isExists = File::exists($path);

		if (!$isExists) {
			$file->move($destinationPath,$nameImg);
		}

		DB::table('list_exams')
			->where('id', '=', $id)
			->update([
				'name' => $_POST['exam'],
				'id_grade' => $_POST['grade'],
				'subject' => $_POST['subject'],
				'id_chapter' => $_POST['chapter'],
				'image' => $nameImg
			]);

		foreach ($ques as $key => $value) {
			DB::table('list_questions')
				->where('id', '=', $key)
				->update(['name' => $value]);
		}
		foreach ($ans as $key => $value) {
			DB::table('list_answers')
				->where('id', '=', $key)
				->update(['name' => $value]);
		}
		foreach ($res as $key => $value) {
			DB::table('list_questions')
				->where('id', '=', $key)
				->update(['answer' => $value]);
		}

		return redirect()->back();
	}

	public function getAddExam()
	{
		$id = Auth::user()->id;

		$list = DB::table('list_classrooms')
							->select(DB::raw('name, id'))
							->where('id_user', '=', $id)
							->get();

		$grade = DB::table('list_grades')
							->select(DB::raw('name, id'))
							->get();

		return view('user.add', ['list' => $list, 'grade' => $grade]);
	}

	public function postAddExam(Request $request)
	{
		$file = $request->image;
		$nameImg =  $file->getClientOriginalName();
		$destinationPath = public_path().'/user/dist/img/subject' ;
		$path = public_path().'/user/dist/img/subject/'.$nameImg ;
		$isExists = File::exists($path);

		if (!$isExists) {
			$file->move($destinationPath,$nameImg);
		}

		$id = Auth::user()->id;
		$ques = $_POST['q'];
		$ans = $_POST['a'];
		$res = $_POST['res'];

		if(!isset($_POST['status'])) {
			$_POST['status'] = 'off';
		}

		$idExam = DB::table('list_exams')
								->insertGetId([
									'name' => $_POST['exam'],
									'id_user' => $id,
									'id_grade' => $_POST['grade'],
									'subject' => $_POST['subject'],
									'id_chapter' => $_POST['chapter'],
									'image' => $nameImg,
									'status' => 'on',
									'created_at' => '2022-01-12 02:49:35'
								]
							);

		for ($x=0; $x < 20 ; $x++) {
			$idQues = DB::table('list_questions')
								->insertGetId([
									'name' => $ques[$x],
									'answer' => $res[$x],
									'id_exam' => $idExam,
								]
							);

			for ($i=1; $i < 5; $i++) {
				DB::table('list_answers')->insert([
					'name' => $ans[$x][$i],
					'id_question' => $idQues,
				]
			);
			}
		}

		return Redirect::to('/listexam');
	}

	public function deleteExam($id)
	{
		$query = 'DELETE list_exams, list_questions, list_answers  FROM list_exams
          INNER JOIN list_questions ON list_exams.id = list_questions.id_exam
					INNER JOIN list_answers ON list_questions.id = list_answers.id_question
          WHERE list_exams.id = ?';

		\DB::delete($query, array($id));
		return redirect()->back();
	}

	public function getSubject()
	{
		$list = DB::table('list_subjects')
							->where('id_grade', '=', $_GET['grade'])
							->select(DB::raw('name, id'))
							->get();

		return $list;
	}

	public function getChapter()
	{
		$list = DB::table('list_chapters')
							->where('id_subject', '=', $_GET['subject'])
							->select(DB::raw('name, id'))
							->get();

		return $list;
	}

	public function getImage(Request $request)
	{
		$file = $request->file('image');
	}

}
