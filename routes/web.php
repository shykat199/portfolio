<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\EducationalExperienceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResumeController;

Route::get('/',[IndexController::class,'index'])->name('home.index');
Route::get('/project-list',[ProjectController::class,'index'])->name('project-list');
Route::get('/project-details/{slug}',[ProjectController::class,'projectDetails'])->name('project-details');


Auth::routes();

Route::controller(LoginController::class)->group(function (){
    Route::get('/login','showLoginForm')->name('show-login-form');
    Route::post('/login','login')->name('login');
    Route::post('/logout','logout')->name('logout');
});

Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('update-profile');

    Route::controller(SkillController::class)->group(function (){
       Route::get('/skill-list','index')->name('skill-list');
       Route::get('/delete-skill/{id}','deleteSkill')->name('delete-skill');
       Route::post('/update-skill-status','updateSkillStatus')->name('update-skill-status');
       Route::post('/add-skill','addSkill')->name('add-skill');
       Route::post('/update-skill','updateSkill')->name('update-skill');
    });

    Route::controller(SiteSettingController::class)->group(function (){
        Route::get('/site-setting','index')->name('site-setting');
        Route::post('/site-setting','update')->name('update-setting');
    });

    Route::controller(ResumeController::class)->group(function (){
        Route::get('/resume-list','index')->name('resume-list');
        Route::post('/create-resume','saveResume')->name('create-resume');
        Route::post('/update-resume','updateResume')->name('update-resume');
        Route::get('/delete-resume/{id}','deleteResume')->name('delete-resume');
        Route::post('/update-resume-status','updateResumeStatus')->name('update-resume-status');
    });

    Route::controller(WorkExperienceController::class)->group(function (){
        Route::get('/work-experience','index')->name('work-experience');
        Route::get('/create-experience','createExperience')->name('create-experience');
        Route::post('/create-experience','saveExperience')->name('save-experience');
        Route::get('/work-experience/{id}','editWorkExperience')->name('edit-experience');
        Route::post('/update-experience/{id}','updateExperience')->name('update-experience');
        Route::post('/update-experience-status','updateExperienceStatus')->name('update-experience-status');
        Route::get('/delete-work-experience/{id}','deleteWorkExperience')->name('delete-experience');
    });

    Route::controller(EducationalExperienceController::class)->group(function (){
        Route::get('/my-education','index')->name('my-education');
        Route::get('/create-education','createEducation')->name('create-education');
        Route::post('/create-education','saveEducation')->name('save-education');
        Route::get('/edit-education/{id}','editEducation')->name('edit-education');
        Route::post('/update-education/{id}','updateEducation')->name('update-education');
        Route::post('/update-education-status','updateEducationStatus')->name('update-education-status');
        Route::get('/delete-work-education/{id}','deleteWorkEducation')->name('delete-education');
    });

    Route::controller(ProjectController::class)->group(function (){
        Route::get('/my-projects','projectList')->name('my-projects');
        Route::get('/create-project','createProject')->name('create-project');
        Route::post('/create-project','saveProject')->name('save-project');
        Route::get('/edit-project/{id}','editProject')->name('edit-project');
        Route::post('/update-project/{id}','updateProject')->name('update-project');
        Route::post('/update-project-status','updateProjectStatus')->name('update-project-status');
        Route::get('/delete-work-project/{id}','deleteWorkProject')->name('delete-project');
    });

    Route::controller(ContactController::class)->group(function (){
            Route::get('/contact-us','index')->name('contact-us');
    });

});
