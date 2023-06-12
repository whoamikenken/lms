<?php

use App\Http\Controllers\Admin;

use App\Http\Controllers\Guest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth as Login;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return redirect()->route('admin.student.welcome');
});




Route::get('clear_database', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('migrate:fresh --seed');
    dd("Cache is cleared");
});

Auth::routes();

Route::post('/chat', [ChatController::class, 'sendMessage'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function() {

    //Student
    Route::get('/student/welcome', [Admin\StudentController::class, 'welcome'])->name('student.welcome');
    Route::get('/student/assessment', [Admin\StudentController::class, 'assessment'])->name('student.assessment');
    Route::post('/student/assessment', [Admin\StudentController::class, 'store'])->name('student.assessment.store');
    Route::get('/student/learning_style', [Admin\StudentController::class, 'learning_style'])->name('student.learning_style');
    Route::post('/student/learning_style', [Admin\StudentController::class, 'store_learning_style'])->name('student.store_learning_style');

    Route::get('/student/results/{result_id}', [Admin\StudentController::class, 'show'])->name('student.assessment.show');
    Route::get('/student/result_category/{result_id}', [Admin\StudentController::class, 'result_category'])->name('student.result_category');
    Route::get('/student/update_account', [Admin\StudentController::class, 'update'])->name('student.update');
    Route::post('/student/update_account/{user_id}', [Admin\StudentController::class, 'update_account'])->name('student.update_account');
    Route::get('/student/history', [Admin\StudentController::class, 'history'])->name('student.history');
    Route::put('/student/changepassword/{user}', [Admin\StudentController::class, 'changepassword'])->name('student.changepassword');
    
    // Categorirs
    Route::resource('categories', Admin\CategoriesController::class);

    // references
    Route::resource('references', Admin\ReferenceController::class);

    // Questions
   
    Route::resource('questions',  Admin\QuestionsController::class);

    // Results
    Route::get('/respondents', [Admin\ResultsController::class, 'index'])->name('respondents.index');

    // Item Analysis
    Route::get('/item_analysis', [Admin\ResultsController::class, 'item_analysis'])->name('respondents.item_analysis');

    //Admin
    Route::get('/dashboard', [Admin\AdminController::class, 'dashboard'])->name('dashboard');

    //Students 
    Route::resource('students',  Admin\StudentsController::class);

});

Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function() {

    


});


