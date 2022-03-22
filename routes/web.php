<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\ChapterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::group(['middleware' => 'auth'], function () {
  Route::get('/', 'User\IndexController@index');
  Route::post('/', 'User\IndexController@search');
  Route::get('/listexam', 'User\ExamController@listExams');
  Route::get('/detail/{id}', 'User\ExamController@getDetail');
  Route::post('/detail/{id}', 'User\ExamController@postDetail');
  Route::get('/add', 'User\ExamController@getAddExam');
  Route::post('/add', 'User\ExamController@postAddExam');
  Route::get('/delete/{id}', 'User\ExamController@deleteExam');
  Route::get('/test/{id}', 'User\TestController@getExam');
  Route::post('/test/{id}', 'User\TestController@postExam');
  Route::get('/myresult', 'User\ResultController@getMyResult');
  Route::get('/listresults/{id}', 'User\ResultController@getListResults');
  Route::get('/profile/{id}', 'User\IndexController@getProfile');
  Route::post('/profile/{id}', 'User\IndexController@postProfile')->name('profile');
  Route::get('/category/{name}', 'User\IndexController@getCategory');
  Route::get('/rate', 'User\TestController@getRate');
  Route::get('/listclass', 'User\ClassController@getList');
  Route::get('/listclass/{id}', 'User\ClassController@getDetail')->name('class');
  Route::get('/addclass', 'User\ClassController@getAdd');
  Route::post('/addclass', 'User\ClassController@postAdd');
  Route::get('/addmember/{id}', 'User\ClassController@getSearchMember');
  Route::post('/addmember/{id}', 'User\ClassController@postSearchMember');
  Route::get('/addmember/{id}/member/{idMember}', 'User\ClassController@getAddMember');
  Route::get('/deletemember/{id}', 'User\ClassController@deleteMember');
  Route::get('/deleteclass/{id}', 'User\ClassController@deleteClass');
  Route::get('/subject', 'User\ExamController@getSubject');
  Route::get('/chapter', 'User\ExamController@getChapter');
  // Route::post('/image', 'User\ExamController@getImage');
});


require __DIR__.'/auth.php';

// Admin

// Login - Logout
Route::match(['get', 'post'], 'admin/login', [BaseController::class, 'login']);
Route::get('admin/logout', [BaseController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
  Route::get('/listadmins', [BaseController::class, 'index']);

  // Profile
  Route::get('/profile/{id}', [ProfileController::class, 'index']);
  Route::post('/profile/{id}', [ProfileController::class, 'update']);
  Route::get('/listadmins', [ProfileController::class, 'listAdmin']);
  Route::get('/listadmins/delete/{id}', [ProfileController::class, 'listAdminDelete']);
  Route::get('/listadmins/add', [ProfileController::class, 'index']);
  Route::post('/listadmins/add', [ProfileController::class, 'listAdminAdd']);
  // Grade
  Route::get('/listgrade', [GradeController::class, 'getGrade']);
  Route::get('/listgrade/add', [GradeController::class, 'addGrade']);
  Route::post('/listgrade/add', [GradeController::class, 'addGradePost']);
  Route::get('/listgrade/delete/{id}', [GradeController::class, 'deleteGrade']);
  Route::get('/listgrade/{id}', [GradeController::class, 'editGrade']);
  Route::post('/listgrade/{id}', [GradeController::class, 'editGradePost']);
  // Subject
  Route::get('/subject/{id}', [SubjectController::class, 'getSubject'])->name('subject');
  Route::get('/listsubject/add/{id}', [SubjectController::class, 'addSubject']);
  Route::post('/listsubject/add/{id}', [SubjectController::class, 'addSubjectPost']);
  Route::get('/listsubject/delete/{id}', [SubjectController::class, 'deleteSubject']);
  Route::get('/listsubject/{id}', [SubjectController::class, 'editSubject']);
  Route::post('/listsubject/{id}', [SubjectController::class, 'editSubjectPost']);
  // Chapter
  Route::get('/chapter/{id}', [ChapterController::class, 'getChapter'])->name('chapter');
  Route::get('/listchapter/add/{id}', [ChapterController::class, 'addChapter']);
  Route::post('/listchapter/add/{id}', [ChapterController::class, 'addChapterPost']);
  Route::get('/listchapter/delete/{id}', [ChapterController::class, 'deleteChapter']);
  Route::get('/listchapter/{id}', [ChapterController::class, 'editChapter']);
  Route::post('/listchapter/{id}', [ChapterController::class, 'editChapterPost']);
});
