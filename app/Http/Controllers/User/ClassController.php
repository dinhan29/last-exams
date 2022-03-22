<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect;

class ClassController extends Controller
{
  public function getList()
  {
    $id = Auth::user()->id;
    $list = DB::table('list_classrooms')
              ->select('list_classrooms.*')
              ->where('id_user', '=', $id)
              ->get();

    return view('user.listClass', ['list' => $list]);
  }
  public function getDetail($id) {
    $idClass = $id;
    $list = DB::table('list_member_class')
              ->select(DB::raw('list_member_class.id, list_member_class.id_user, users.name'))
              ->join('users', 'list_member_class.id_user', '=', 'users.id')
              ->where('id_class', '=', $idClass)
              ->get();

    return view('user.detailClass', ['id' => $idClass, 'list' => $list]);
  }

  public function getAdd()
  {
    return view('user.addClass');
  }

  public function postAdd()
  {
    $id = Auth::user()->id;
    DB::table('list_classrooms')
      ->insert([
        'name' => $_POST['class'],
        'id_user' => $id
	    ]);

      return Redirect::to('/listclass');
  }

  public function getSearchMember($id)
  {
    return view('user.addMember');
  }

  public function postSearchMember($id)
  {
    $idClass = $id;
    $list = DB::table('users')
              ->select(DB::raw('id, name, email'))
              ->where('id', '=', $_POST['member'])
              ->get();
    // dd($list);
    return view('user.memberResult',['list' => $list, 'id' => $idClass]);
  }

  public function getAddMember($id, $idMember)
  {
    DB::table('list_member_class')
      ->insert([
        'id_user' => $idMember,
        'id_class' => $id
      ]);

    return redirect()->route('class', ['id' => $id]);
  }

  public function deleteMember($id)
  {
    DB::table('list_member_class')
      ->where('id', $id)
      ->delete();

    return redirect()->back();
  }

  public function deleteClass($id)
  {
    $query = 'DELETE list_classrooms, list_member_class  FROM list_classrooms
          INNER JOIN list_member_class ON list_classrooms.id = list_member_class.id_class
          WHERE list_classrooms.id = ?';

		\DB::delete($query, array($id));

		return redirect()->back();
  }
}
