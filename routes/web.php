<?php

use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\BusinessPostController;
use App\Http\Controllers\BusinessSubCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\CustomPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\FestivalPostController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectTopicController;
use App\Http\Controllers\AllQuestionsController;
use App\Http\Controllers\Api\ChapterApiController;
use App\Http\Controllers\Api\SubjectApiController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChapterQuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::post('/admin/updateRegister', [ProfileController::class, 'updateRegister']);

    Route::get('/', [DashboardController::class,'dashboard'])->name('home');
    Route::get('/admin/settings', [DashboardController::class,'settings'])->name('settings');

    Route::get('/admin/profile', function () {
        return view('auth.profile');
    });


    // Language Routes and Controller
    Route::get('/admin/language', [LanguageController::class, "index"])->name("languageList");
    Route::get('/admin/language/create', [LanguageController::class, "create"]);
    Route::post('/admin/language/store', [LanguageController::class, "store"]);
    Route::delete('/admin/language/{id}', [LanguageController::class, "destroy"]);
    Route::get('/language/edit/{id}', [LanguageController::class, "edit"]);
    Route::put('/admin/language/update', [LanguageController::class, "update"]);
    Route::post('/admin/language/status', [LanguageController::class, "updateStatus"]);

    // Category Routes and Controller
    Route::get('/admin/category', [CategoryController::class, "index"])->name("categoryList");
    Route::get('/admin/category/create', [CategoryController::class, "create"]);
    Route::post('/admin/category/store', [CategoryController::class, "store"]);
    Route::delete('/admin/category/{id}', [CategoryController::class, "destroy"]);
    Route::get('/category/edit/{id}', [CategoryController::class, "edit"]);
    Route::put('/admin/category/update', [CategoryController::class, "update"]);
    Route::post('/admin/category/status', [CategoryController::class, "updateStatus"]);

    // Category Post Routes and Controller
    Route::get('/admin/category_post', [CategoryPostController::class, "index"])->name("categoryPostList");
    Route::get('/admin/category_post/create', [CategoryPostController::class, "create"]);
    Route::post('/admin/category_post/store', [CategoryPostController::class, "store"]);
    Route::delete('/admin/category_post/{id}', [CategoryPostController::class, "destroy"]);
    Route::get('/category_post/edit/{id}', [CategoryPostController::class, "edit"]);
    Route::put('/admin/category_post/update', [CategoryPostController::class, "update"]);
    Route::post('/admin/category_post/status', [CategoryPostController::class, "updateStatus"]);

    // Business Category Routes and Controller
    Route::get('/admin/business_category', [BusinessCategoryController::class, "index"])->name("businessCategoryList");
    Route::get('/admin/business_category/create', [BusinessCategoryController::class, "create"]);
    Route::post('/admin/business_category/store', [BusinessCategoryController::class, "store"]);
    Route::delete('/admin/business_category/{id}', [BusinessCategoryController::class, "destroy"]);
    Route::get('/business_category/edit/{id}', [BusinessCategoryController::class, "edit"]);
    Route::put('/admin/business_category/update', [BusinessCategoryController::class, "update"]);
    Route::post('/admin/business_category/status', [BusinessCategoryController::class, "updateStatus"]);

    // Business Category Routes and Controller
    Route::get('/admin/business_sub_category', [BusinessSubCategoryController::class, "index"])->name("businessSubCategoryList");;
    Route::get('/admin/business_sub_category/create', [BusinessSubCategoryController::class, "create"]);
    Route::post('/admin/business_sub_category/store', [BusinessSubCategoryController::class, "store"]);
    Route::delete('/admin/business_sub_category/{id}', [BusinessSubCategoryController::class, "destroy"]);
    Route::get('/business_sub_category/edit/{id}', [BusinessSubCategoryController::class, "edit"]);
    Route::put('/admin/business_sub_category/update', [BusinessSubCategoryController::class, "update"]);
    Route::post('/admin/business_sub_category/status', [BusinessSubCategoryController::class, "updateStatus"]);

    // Festival Routes and Controller
    // Route::get('/admin/festival', [FestivalController::class, "index"])->name("festivalList");
    // Route::get('/admin/festival/create', [FestivalController::class, "create"]);
    // Route::post('/admin/festival/store', [FestivalController::class, "store"]);
    // Route::delete('/admin/festival/{id}', [FestivalController::class, "destroy"]);
    // Route::get('/festival/edit/{id}', [FestivalController::class, "edit"]);
    // Route::put('/admin/festival/update', [FestivalController::class, "update"]);
    // Route::post('/admin/festival/status', [FestivalController::class, "updateStatus"]);

    // Festival Post Routes and Controller
    Route::get('/admin/festival_post', [FestivalPostController::class, "index"])->name("festivalPostList");
    Route::get('/admin/festival_post/create', [FestivalPostController::class, "create"]);
    Route::post('/admin/festival_post/store', [FestivalPostController::class, "store"]);
    Route::delete('/admin/festival_post/{id}', [FestivalPostController::class, "destroy"]);
    Route::get('/festival_post/edit/{id}', [FestivalPostController::class, "edit"]);
    Route::put('/admin/festival_post/update', [FestivalPostController::class, "update"]);
    Route::post('/admin/festival_post/status', [FestivalPostController::class, "updateStatus"]);


     // Custom Routes and Controller
     Route::get('/admin/custom', [CustomController::class, "index"])->name("customList");;
     Route::get('/admin/custom/create', [CustomController::class, "create"]);
     Route::post('/admin/custom/store', [CustomController::class, "store"]);
     Route::delete('/admin/custom/{id}', [CustomController::class, "destroy"]);
     Route::get('/custom/edit/{id}', [CustomController::class, "edit"]);
     Route::put('/admin/custom/update', [CustomController::class, "update"]);
     Route::post('/admin/custom/status', [CustomController::class, "updateStatus"]);

     // Ciustom Post Routes and Controller
     Route::get('/admin/custom_post', [CustomPostController::class, "index"])->name("customPostList");;
     Route::get('/admin/custom_post/create', [CustomPostController::class, "create"]);
     Route::post('/admin/custom_post/store', [CustomPostController::class, "store"]);
     Route::delete('/admin/custom_post/{id}', [CustomPostController::class, "destroy"]);
     Route::get('/custom_post/edit/{id}', [CustomPostController::class, "edit"]);
     Route::put('/admin/custom_post/update', [CustomPostController::class, "update"]);
     Route::post('/admin/custom_post/status', [CustomPostController::class, "updateStatus"]);


     // Business Post Routes and Controller
     Route::get('/admin/business_post', [BusinessPostController::class, "index"])->name("businessPostList");;
     Route::get('/admin/business_post/create', [BusinessPostController::class, "create"]);
     Route::post('/admin/business_post/store', [BusinessPostController::class, "store"]);
     Route::delete('/admin/business_post/{id}', [BusinessPostController::class, "destroy"]);
     Route::get('/business_post/edit/{id}', [BusinessPostController::class, "edit"]);
     Route::put('/admin/business_post/update', [BusinessPostController::class, "update"]);
     Route::post('/admin/business_post/status', [BusinessPostController::class, "updateStatus"]);

     Route::get('/admin/all_questions_index', [AllQuestionsController::class, 'index'])->name('all_questions.index');

    Route::get('/admin/chapters/{subject_id}', [ChapterController::class, 'index'])->name('chapters.index');
    Route::get('/admin/chapters_create/{subject_id}', [ChapterController::class, 'create'])->name('chapter.create');
    Route::post('/admin/chapters_store', [ChapterController::class, 'store'])->name('chapters.store');
    Route::get('/admin/chapters_edit/{chapter_id}', [ChapterController::class, 'edit'])->name('chapters.edit');
    Route::post('/admin/chapters_update/{chapter_id}', [ChapterController::class, 'update'])->name('chapters.update');
    Route::get('/admin/chapters_delete/{chapter_id}', [ChapterController::class, 'destroy'])->name('chapters.destroy');

    Route::get('/admin/chapters_questions/{chapter_id}', [ChapterQuestionController::class, 'index'])->name('chapters_questions.index');
    Route::get('/admin/chapters_questions_create/{chapter_id}', [ChapterQuestionController::class, 'create'])->name('chapters_questions.create');
    Route::post('/admin/chapters_questions_store', [ChapterQuestionController::class, 'store'])->name('chapter_question.store');
    
   


});

Route::get('/component', function () {
    return view('component.index');
});

Route::resource('/subject', SubjectController::class);
Route::resource('/subject-topic', SubjectTopicController::class);

