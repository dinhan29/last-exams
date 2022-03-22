<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect;

class IndexController extends Controller
{
	public function index()
	{
		$id = Auth::user()->id;
		$sub = DB::table('users')
								->select('users.*')
								->where('id', '=', $id)
								->get();
		if ($sub[0]['subject_1'] == null || $sub[0]['subject_2'] == null || $sub[0]['subject_3'] == null)
		{
			return Redirect::route('profile', array('id' =>$id));
		}

		// $list = DB::table('list_exams')
		// 					->select(DB::raw('list_exams.id, list_exams.name, list_exams.subject, list_exams.image, list_exams.created_at, users.name as name_user, COUNT(list_results.id_exam) as people, list_exams.rate'))
		// 					->join('users', 'users.id', '=', 'list_exams.id_user')
		// 					->join('list_results', 'list_results.id_exam', '=', 'list_exams.id')
		// 					->where('list_exams.id_user', '<>', $id)
		// 					->where('status', '=', 'on')
		// 					->groupBy('list_results.id_exam')
		// 					->orderBy('people', 'DESC')
		// 					->orderBy('rate', 'DESC')
		// 					->get();

		$list = DB::table('list_exams')
							->select(DB::raw('list_exams.id, list_exams.name, list_grades.name as name_grade, list_subjects.name as name_subject, list_chapters.name as name_chapter,list_exams.image, list_exams.created_at, users.name as name_user, COUNT(list_results.id_exam) as people, list_exams.rate'))
							->join('list_grades', 'list_grades.id', '=', 'list_exams.id_grade')
							->join('list_subjects', 'list_subjects.id', '=', 'list_exams.subject')
							->join('list_chapters', 'list_chapters.id', '=', 'list_exams.id_chapter')
							->join('users', 'users.id', '=', 'list_exams.id_user')
							->join('list_results', 'list_results.id_exam', '=', 'list_exams.id')
							->where('list_exams.id_user', '<>', $id)
							->where('status', '=', 'on')
							->groupBy('list_results.id_exam')
							->orderBy('people', 'DESC')
							->orderBy('rate', 'DESC')
							->get();

		$sub1Name = DB::table('list_subjects')
									->where('id', '=', $sub[0]['subject_1'])
									->select('name')
									->get();

		$sub2Name = DB::table('list_subjects')
									->where('id', '=', $sub[0]['subject_2'])
									->select('name')
									->get();

		$sub3Name = DB::table('list_subjects')
									->where('id', '=', $sub[0]['subject_3'])
									->select('name')
									->get();

		$sub1 = $list->where('name_subject', '=', $sub1Name[0]['name']);
		$sub2 = $list->where('name_subject', '=', $sub2Name[0]['name']);
		$sub3 = $list->where('name_subject', '=', $sub3Name[0]['name']);
		// dd($sub3);

		return view('user.index', ['list' => $list, 'sub' => $sub, 'sub1' => $sub1, 'sub2' => $sub2, 'sub3' => $sub3, 'sub1Name' => $sub1Name[0]['name'], 'sub2Name' => $sub2Name[0]['name'], 'sub3Name' => $sub3Name[0]['name']]);
	}
	public function search()
	{
		$id = Auth::user()->id;
		$search = $_POST['search'];

		$list = DB::table(('list_exams'))
							->select(DB::raw('list_exams.id, list_exams.name, list_exams.created_at, users.name as name_user'))
							->join('users', 'users.id', '=', 'list_exams.id_user')
							->where('id_user', '<>', $id)
							->get();

		if ($search)
		{
			$list =	$list->where('id', '=', $search);
			// if (sizeof($listSearch) == 0)
			// {
			// 	// dd($list);
			// 	$listSearch = $list->where('name','LIKE','%'.$search.'%');
			// 	dd($listSearch);
			// 	if (sizeof($listSearch) == 0)
			// 	{
			// 		return view('user.index', ['list' => $list]);
			// 	}
			// } else {
			// 	return view('user.index', ['list' => $listSearch]);
			// }
			// $list
      //   ->where(function ($list) use ($search) {
      //     $list->where('id', 'LIKE', $search)
      //       ->orWhere('name', 'LIKE', '%' . $search . '%');
      //   });
			// 	dd($list);
		}

		return view('user.index', ['list' => $list]);
	}

	public function getProfile ($id)
	{
		$subject = DB::table('list_subjects')
									->where('id_grade', '=', 1)
									->select(DB::raw('name, id'))
									->get();

		$list = DB::table('users')
						->where('id', '=', $id)
						->select('users.*')
						->get();
		$list = $list[0];
		return view('user.profile', ['list' => $list, 'subject' => $subject]);
	}

	public function postProfile($id)
	{
		// dd($_POST);
		if ($_POST['new_password'] == null)
		{
			DB::table('users')
			->where('id', '=', $id)
			->update([
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'subject_1' => $_POST['subject_1'],
				'subject_2' => $_POST['subject_2'],
				'subject_3' => $_POST['subject_3'],
			]);
		} else {
			DB::table('users')
			->where('id', '=', $id)
			->update([
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'password' => Hash::make($_POST['new_password']),
				'subject_1' => $_POST['subject_1'],
				'subject_2' => $_POST['subject_2'],
				'subject_3' => $_POST['subject_3'],
			]);
		}

		return Redirect::to('/');
	}

	public function getCategory ($name)
	{
		$id = Auth::user()->id;

		if ($name == 'it')
		{
			$name = 'Information Technology';
		}
		if ($name == 'fa')
		{
			$name = 'Fine Art';
		}

		// $list = DB::table('list_exams')
		// 					->select(DB::raw('list_exams.id, list_exams.name, list_grades.name as name_grade, list_subjects.name as name_subject, list_chapters.name as name_chapter, list_exams.image, users.name as name_user'))
		// 					->join('list_grades', 'list_grades.id', '=', 'list_exams.id_grade')
		// 					->join('list_subjects', 'list_subjects.id', '=', 'list_exams.subject')
		// 					->join('list_chapters', 'list_chapters.id', '=', 'list_exams.id_chapter')
		// 					->join('users', 'users.id', '=', 'list_exams.id_user')
		// 					->where('id_user', '<>', $id)
		// 					->where('list_exams.subject', '=', $name)
		// 					->where('status', '=', 'on')
		// 					->get();

		$list = DB::table('list_exams')
							->select(DB::raw('list_exams.id, list_exams.name, list_grades.name as name_grade, list_subjects.name as name_subject, list_chapters.name as name_chapter, list_exams.image, list_exams.created_at, users.name as name_user, COUNT(list_results.id_exam) as people, list_exams.rate'))
							->join('list_grades', 'list_grades.id', '=', 'list_exams.id_grade')
							->join('list_subjects', 'list_subjects.id', '=', 'list_exams.subject')
							->join('list_chapters', 'list_chapters.id', '=', 'list_exams.id_chapter')
							->join('users', 'users.id', '=', 'list_exams.id_user')
							->join('list_results', 'list_results.id_exam', '=', 'list_exams.id')
							->where('list_exams.id_user', '<>', $id)
							->where('status', '=', 'on')
							->where('list_exams.subject', '=', $name)
							->groupBy('list_results.id_exam')
							->orderBy('people', 'DESC')
							->orderBy('rate', 'DESC')
							->get();

		// dd($list);

		return view('user.category', ['list' => $list]);
	}
}
