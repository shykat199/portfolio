<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkillController;
use App\Models\SiteSetting;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\EducationalExperienceController;
use App\Http\Controllers\ContactController;

Route::get('/',[IndexController::class,'index'])->name('home.index');
Route::get('/project-list',[ProjectController::class,'index'])->name('project-list');
Route::get('/project-details',[ProjectController::class,'projectDetails'])->name('project-details');


Auth::routes();

Route::controller(LoginController::class)->group(function (){
    Route::get('/login','showLoginForm')->name('show-login-form');
    Route::post('/login','login')->name('login');
    Route::post('/logout','logout')->name('logout');
});

Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(SkillController::class)->group(function (){
       Route::get('/skill-list','index')->name('skill-list');
       Route::get('/delete-skill/{id}','deleteSkill')->name('delete-skill');
       Route::post('/update-skill-status','updateSkillStatus')->name('update-skill-status');
       Route::post('/add-skill','addSkill')->name('add-skill');
       Route::post('/update-skill','updateSkill')->name('update-skill');
    });

    Route::controller(SiteSetting::class)->group(function (){
        Route::get('/site-setting','index')->name('site-setting');
    });

    Route::controller(WorkExperienceController::class)->group(function (){
        Route::get('/work-experience','index')->name('work-experience');
    });

    Route::controller(EducationalExperienceController::class)->group(function (){
        Route::get('/my-education','index')->name('my-education');
    });

    Route::controller(ProjectController::class)->group(function (){
        Route::get('/my-project','index')->name('my-project');
    });

    Route::controller(ContactController::class)->group(function (){
            Route::get('/contact-us','index')->name('contact-us');
        });

});
