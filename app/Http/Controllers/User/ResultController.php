<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;

class ResultController extends Controller
{
  public function getMyResult()
  {
    $id = Auth::user()->id;

    $myResult = DB::table('list_results')
                  ->select(DB::raw('name_exam, result, updated_at'))
                  ->where('id_user', '=', $id)
                  ->get();

    return view('user.myResult', ['myResult' => $myResult]);
  }

  public function getListResults($id)
  {
    $list = DB::table('list_results')
              ->select(DB::raw('name_user, result, updated_at'))
              ->where('id_exam', '=', $id)
              ->get();

    return view('user.otherResults', ['list' => $list]);
  }
}
