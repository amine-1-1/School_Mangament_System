<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\CoursController;
use App\Http\Controllers\Teacher\ExerciceController;
use App\Http\Controllers\Teacher\NoteController;
use App\Http\Controllers\Teacher\ClasseController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\VacationController;
use App\Http\Controllers\Teacher\ContractController;
use App\Http\Controllers\Students\ExerciceStudentsController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Students\NoteStudentsController;
use App\Http\Controllers\FullCalendarEventMasterController;
use App\Http\Controllers\GenerateQrCodeController;


;

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

Auth::routes();

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/teacher', [LoginController::class, 'showTeacherLoginForm']);
Route::get('/login/student', [LoginController::class, 'showStudentLoginForm']);
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/student', [LoginController::class, 'studentLogin']);
Route::post('/login/teacher', [LoginController::class, 'teacherLogin']);

/*-----------------------------------events-------------------------------------------------*/
Route::get('/fullcalendareventmaster',[FullCalendarEventMasterController::class,'index']);
Route::post('/fullcalendareventmaster/create',[FullCalendarEventMasterController::class,'create']);
Route::post('/fullcalendareventmaster/update',[FullCalendarEventMasterController::class,'update']);
Route::post('/fullcalendareventmaster/delete',[FullCalendarEventMasterController::class,'destroy']);
/*-----------------------------------QrCode----------------------------------------------*/
Route::get('simple-qr-code', [GenerateQrCodeController::class, 'simpleQrCode']);
Route::get('color-qr-code', [GenerateQrCodeController::class, 'colorQrCode']);
Route::get('image-qr-code', [GenerateQrCodeController::class, 'imageQrCode']);

Route::group(['middleware' => 'auth:teacher'], function () {
    Route::view('/teacherHome', 'teacher');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/users', 'user');
});

Route::get('logout', [LoginController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');

Route::namespace('Admin')->group(function () {
    Route::group(['middleware' => ['superadmin']], function () {
        Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
        Route::delete('/teacher/{id}', [App\Http\Controllers\TeacherController::class, 'delete'])->name('teacher.delete');
        Route::delete('/student/{id}', [App\Http\Controllers\StudentController::class, 'delete'])->name('student.delete');
    });
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/user', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
        Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
        /*--------------------------------------Teacher Managment --------------------------------------------------*/
        Route::get('/teacher-create', [App\Http\Controllers\TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/teacher-create', [App\Http\Controllers\TeacherController::class, 'store']);
        Route::get('/teachers', [App\Http\Controllers\TeacherController::class, 'index'])->name('admin.teacher.index');
        Route::post('/teacher-edit/{id}/info', [App\Http\Controllers\TeacherController::class, 'updateInfo'])->name('admin.teacher.update.info');
        Route::get('/teacher-edit/{id}/info', [App\Http\Controllers\TeacherController::class, 'editInfo'])->name('admin.teacher.edit.info');
        Route::get('/teacher-edit/{id}/password', [App\Http\Controllers\TeacherController::class, 'editPassword'])->name('admin.teacher.edit.password');
        Route::post('/teacher-edit/{id}/password', [App\Http\Controllers\TeacherController::class, 'updatePassword']);
        /*---------------------------------------Subject Managment--------------------------------------------------*/
        Route::get('/subject-create', [App\Http\Controllers\MatiereController::class, 'create'])->name('matiere.create');
        Route::post('/subject-create', [App\Http\Controllers\MatiereController::class, 'store']);
        Route::get('/subjects', [App\Http\Controllers\MatiereController::class, 'index'])->name('admin.matieres.index');
        /*--------------------------------------Student Managment --------------------------------------------------*/
        Route::get('/student-create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
        Route::post('/student-create', [App\Http\Controllers\StudentController::class, 'store']);
        Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('admin.student.index');
        Route::post('/student-edit/{id}/info', [App\Http\Controllers\StudentController::class, 'updateInfo'])->name('admin.student.update.info');
        Route::get('/student-edit/{id}/info', [App\Http\Controllers\StudentController::class, 'editInfo'])->name('admin.student.edit.info');
        Route::get('/student-edit/{id}/password', [App\Http\Controllers\StudentController::class, 'editPassword'])->name('admin.student.edit.password');
        Route::post('/student-edit/{id}/password', [App\Http\Controllers\StudentController::class, 'updatePassword']);
        /*--------------------------------------Vacation--------------------------------------------------*/
        Route::get('/vacations', [App\Http\Controllers\VacationController::class, 'index'])->name('vacation.index');
        Route::post('/vacation/{id}/accept', [App\Http\Controllers\VacationController::class, 'accept'])->name('vacation.active');
        Route::post('/vacation/{id}/refuse', [App\Http\Controllers\VacationController::class, 'refuse'])->name('vacation.refuse');
        Route::post('/vacation/{id}/edit', [App\Http\Controllers\VacationController::class, 'refuse'])->name('vacation.refuse');
        /*--------------------------------------Contracts--------------------------------------------------*/
        Route::get('/teacher/{id}/contract', [App\Http\Controllers\ContractController::class, 'index'])->name('contracts.index');
        Route::get('/contract/{id}/info', [App\Http\Controllers\ContractController::class, 'editInfo'])->name('contract.edit.info');
        Route::post('/contract/{id}/info', [App\Http\Controllers\ContractController::class, 'updateInfo'])->name('contract.update.info');
        Route::get('/contract', [App\Http\Controllers\ContractController::class, 'create'])->name('contract.create');
        Route::post('/contract', [App\Http\Controllers\ContractController::class, 'store']);
        Route::get('/contract/{id}/download', [App\Http\Controllers\ContractController::class, 'download'])->name('contract.download');
        Route::get('/contract/{id}/view', [App\Http\Controllers\ContractController::class, 'view'])->name('contract.view');
        Route::delete('/contract/{id}', [App\Http\Controllers\ContractController::class, 'delete'])->name('contract.delete');
        /*--------------------------------------Classes Managment--------------------------------------------------*/
        Route::get('/classroom-create', [App\Http\Controllers\ClasseController::class, 'create'])->name('classroom.create');
        Route::post('/classroom-create', [App\Http\Controllers\ClasseController::class, 'store']);
        Route::get('/classroom-add/{id}', [App\Http\Controllers\ClasseController::class, 'add'])->name('classroom.add');
        Route::post('/classroom-add/{id}', [App\Http\Controllers\ClasseController::class, 'add_store']);
        Route::get('/classroom', [App\Http\Controllers\ClasseController::class, 'index'])->name('admin.classroom.index');
        Route::get('/classroom/{id}', [App\Http\Controllers\ClasseController::class, 'getInto'])->name('classroom.getInto');
        /*--------------------------------------Number----------------------------------------------------*/
        Route::post('/classroom/{id}/studentList', [App\Http\Controllers\ClasseController::class, 'updateNumber'])->name('classroom.studentList');
        Route::get('/classroom/{id}/studentList', [App\Http\Controllers\ClasseController::class, 'editNumber'])->name('classroom.studentLists');
    });
    Route::group(['middleware' => ['user']], function () {
        Route::post('/user/{id}/info', [App\Http\Controllers\UserController::class, 'updateInfo'])->name('user.update.info');
        Route::get('/user/{id}/info', [App\Http\Controllers\UserController::class, 'editInfo'])->name('user.edit.info');
        Route::get('/user/{id}/password', [App\Http\Controllers\UserController::class, 'editPassword'])->name('user.edit.password');
        Route::post('/user/{id}/password', [App\Http\Controllers\UserController::class, 'updatePassword']);
    });

});

/*--------------------------------------Teachers--------------------------------------------------*/
Route::get('/teacherHome', [App\Http\Controllers\Teacher\TeacherController::class, 'index'])->name('teacher.profile.index');
Route::namespace('Teacher')->group(function () {
    Route::group(['middleware' => ['teacher']], function () {

        Route::get('/Cours/{id}/Download', [CoursController::class, 'download'])->name('DownloadCours');
        Route::delete('/Cours/{id}/Delete', [CoursController::class, 'delete'])->name('DeleteCours');
        Route::get('/Cours/{id}/view', [CoursController::class, 'view'])->name('cour.view');

        Route::get('/Exercices/{id}/Download', [ExerciceController::class, 'download'])->name('DownloadExercices');
        Route::delete('/Exercices/{id}/Delete', [ExerciceController::class, 'delete'])->name('DeleteExercices');
        Route::get('/Exercices/{id}/view', [ExerciceController::class, 'view'])->name('exercice.view');
        /*---------------------------------------------------------------------------------------------------------------------*/
        Route::post('/teacher-Int-edit/{id}/info', [TeacherController::class, 'updateInfo'])->name('Teachers.teacher.update.info');
        Route::get('/teacher-Int-edit/{id}/info', [TeacherController::class, 'editInfo'])->name('Teachers.teacher.edit.info');
        Route::get('/teacher-Int-edit/{id}/password', [TeacherController::class, 'editPassword'])->name('Teachers.teacher.edit.password');
        Route::post('/teacher-Int-edit/{id}/password', [TeacherController::class, 'updatePassword']);
        Route::get('/teacher/{id}/vacations', [VacationController::class, 'index'])->name('teacher.vacations');
        Route::get('/teacher/{id}/contracts', [ContractController::class, 'index'])->name('teacher.contracts');


    });
    Route::get('/AjouterCours', [CoursController::class, 'UploadCours']);
    Route::post('/AjouterCours', [CoursController::class, 'UploadFile'])->name('uploadFile');
    Route::get('/Cours', [CoursController::class, 'index']);
    Route::get('/Exercices', [ExerciceController::class, 'index']);
    Route::get('/AjouterExercices', [ExerciceController::class, 'UploadExexrcices']);
    Route::post('/AjouterExercices', [ExerciceController::class, 'AjouterExercices'])->name('uploadExercice');
    Route::get('/AjouterNotes', [NoteController::class, 'UploadNotes']);
    Route::get('/Notes', [NoteController::class, 'index']);
    Route::get('/Classes', [ClasseController::class, 'index']);
    Route::get('/Feedback', [TeacherController::class, 'feedback']);
    Route::post('/Store', [NoteController::class, 'store'])->name('Store');
    Route::get('/teacher/{id}/contracts/download', [ContractController::class, 'download'])->name('contract.download');
    Route::get('/teacher/{id}/contracts/view', [ContractController::class, 'view'])->name('contract.view');
    Route::get('/teacher/vacations', [VacationController::class, 'createVacation'])->name('vacations.create');
    Route::post('/teacher/vacations', [VacationController::class, 'storeVacation'])->name('vacations.store');

});

/*--------------------------------------------------------------------------------------------------------------------*/

Route::get('/studentHome', [StudentController::class, 'index'])->name('student.profile.index');
Route::namespace('Student')->group(function () {
    Route::group(['middleware' => ['student']], function () {
        Route::post('/student-Int-edit/{id}/info', [StudentController::class, 'updateInfo'])->name('Students.student.update.info');
        Route::get('/student-Int-edit/{id}/info', [StudentController::class, 'editInfo'])->name('Students.student.edit.info');
        Route::get('/student-Int-edit/{id}/password', [StudentController::class, 'editPassword'])->name('Students.student.edit.password');
        Route::post('/student-Int-edit/{id}/password', [StudentController::class, 'updatePassword']);
        Route::post('/Exercices/{id}/Remis', [ExerciceStudentsController::class, 'RemisExercice'])->name('RemisExercice');
    });
        /*---------------------------------------------------------------------------------------------------------------------*/
        Route::get('/NoteStudent', [NoteStudentsController::class, 'index']);
        Route::get('/ExerciceStudents', [ExerciceStudentsController::class, 'index']);
        Route::post('/ExerciceStudents', [ExerciceStudentsController::class, 'AjouterExercices']);
        Route::get('/CourStudents', [StudentController::class, 'indexCours']);

});
