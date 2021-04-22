<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MailController;
use App\Models\Grades;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', [UserController::class, 'login']);
Route::get('/sign-up', [UserController::class, 'register']);
Route::post('/save', [UserController::class, 'save']);
Route::post('/check', [UserController::class, 'check']);
Route::get('/dashboard', [UserController::class, 'dashboard']);


Route::get('/messages', function () {
    return view('messages');
});


Route::get('/students', [StudentController::class, 'index']);
// Route::get('/students/edit/{id}', [StudentController::class, 'edit']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students/store', [StudentController::class, 'store']);
Route::get('/studentadd', function(){
    return view('studentadd');
});
Route::get('/students/edit/{id}', function($id){
    $students = DB::table('students')->where('id', $id)->get();
    return view('studentedit')->with('students',$students);
});
Route::post('/students/update/{id}', [StudentController::class, 'update']);
Route::get('/students/delete/{id}', [StudentController::class, 'destroy']);



Route::get('/grades', [GradeController::class, 'index']);
// Route::get('/grades/edit/{id}', [GradeController::class, 'edit']);
Route::get('/grades/create', [GradeController::class, 'create']);
Route::post('/grades/store', [GradeController::class, 'store']);
Route::get('/gradesadd', function(){
    return view('gradesadd');
});
Route::get('/grades/edit/{id}', function($id){
    $grades = DB::table('grades')->where('id', $id)->get();
    return view('gradesedit')->with('grades',$grades);
});
Route::post('/grades/update/{id}', [GradeController::class, 'update']);
Route::get('/grades/delete/{id}', [GradeController::class, 'destroy']);

Route::get('/send-email', [MailController::class, 'send']);

// Route::get('/changeLang', function(){
//     $curr = App::getLocale();
//     if($curr == 'en'){
//         $curr = 'ru';
//     } else {
//         $curr = 'en';
//     }

    
//     // $url   = url()->previous();
//     // $url_explode = explode("/",$url);
//     // $url_explode[3] = $curr;
//     // $redir = implode('/',$url_explode);
  
//     // return redirect($redir);
//     App::setLocale($curr);
//     Session()->put('locale', $curr);
//     // session(['APP_LOCALE' => $curr]);
//     // // echo App::getLocale();
//     // return redirect()->back();
//     $path = Route::getCurrentRoute()->getPath();
//     return redirect($path);
// });

Route::get('/changeLang', [UserController::class, 'change']);
