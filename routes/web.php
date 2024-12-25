<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});
/* ----------------Register------------------ */
Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'studentRegister'])->name('studentRegister');
/* ----------------------Login & logout------------------------ */
Route::get('/login',function(){
    return redirect('/register');
});
Route::get('/login',[AuthController::class,'loadLogin'])->name('loadLogin');
Route::post('/login',[AuthController::class,'studentLogin'])->name('studentLogin');
Route::get('/logout',[AuthController::class,'logout']);
/* --------------------------Forget Password-------------------------------- */
Route::get('/forget-password',[AuthController::class,'forgetPasswordLoad']);
Route::post('/forget-password',[AuthController::class,'forgetPassword'])->name('forgetPassword');
/* --------------------------------Reset Password------------------------------ */
Route::get('/reset-password',[AuthController::class,'resetPasswordLoad']);
Route::post('/reset-password',[AuthController::class,'resetPassword'])->name('resetPassword');
Route::get('/thank-you',[AuthController::class,'thankYou']);



/* ---------------------------Admin Dashboard---------------------- */
Route::group(['middleware'=>['web','checkAdmin']],function(){
    Route::get('/admin/adminDashboard',[AuthController::class,'adminDashboard'])->name("adminDashboard");
    /* ==============================Departments=============================== */
    Route::get('/departments',[AdminController::class,'departmentDashLoad']);
    Route::post('/departments',[AdminController::class,'addDepartment'])->name('addDepartment');
    Route::post("/updata-data",[AdminController::class,'editDepartment'])->name('editDepartment');
    Route::post("/delete-data",[AdminController::class,'deleteDepartment'])->name('deleteDepartment');
    /* ==============================Sub Departments=============================== */
    Route::get('/sub-departments',[AdminController::class,'subDeptDashLoad']);
    Route::post('/sub-departments',[AdminController::class,'addSubDepartment'])->name('addSubDepartment');
    Route::get('/get-dept-detail/{id}',[AdminController::class,'getDeptDetais'])->name('getDeptDetais');
    Route::post('/update-sub-dept',[AdminController::class,'updateSubDept'])->name('updateSubDept');
    Route::post("/delete-sub-data",[AdminController::class,'deleteSubDepartment'])->name('deleteSubDepartment');
    /* ==============================Designations=============================== */
    Route::get('/designation',[AdminController::class,'designationDashLoad']);
    Route::post('/designation',[AdminController::class,'addDesignation'])->name('addDesignation');
    Route::post("/updata-deg-data",[AdminController::class,'editDesignation'])->name('editDesignation');
    Route::post("/delete-deg-data",[AdminController::class,'deleteDesignation'])->name('deleteDesignation');
    /* ==============================Posts & Orders=============================== */
    Route::get('/post',[AdminController::class,'postDashboardLoad']);
    Route::post('/post',[AdminController::class,'addPost'])->name('addPost');
    Route::get('/get-post-detail/{id}',[AdminController::class,'getPostDetais'])->name('getPostDetais');
    Route::post("/updata-post-data",[AdminController::class,'editPost'])->name('editPost');
    Route::post("/delete-post-data",[AdminController::class,'deletePost'])->name('deletePost');
    /* ================================varify======================================== */ //
    Route::post("/varify-data",[AuthController::class,'varifyUser'])->name('varifyUser');
    /* ========================================deactive============================== */
    Route::post("/deactive-data",[AuthController::class,'deleteUser'])->name('deleteUser');
    /* =========================================Allocation================================== */
    Route::get('/allocations',[AdminController::class,'deptOfAllocations']);  
    Route::get('/get-allocation-details/{id}',[AdminController::class,'getAlloctDetais'])->name('getAlloctDetais');  
    Route::post('/allocations',[AdminController::class,'addAllot'])->name('addAllot');
    Route::get('/get-allot-details/{id}',[AdminController::class,'getAllotDetais'])->name('getAllotDetais');
    Route::get('/get-edit-allocation-details/{id}',[AdminController::class,'getEditAlloctDetais'])->name('getEditAlloctDetais'); 
    Route::get('/get-edit-sub-dept-details/{id}',[AdminController::class,'getEditSubDeptDetais'])->name('getEditSubDeptDetais'); 
    Route::post('/edit-allocations',[AdminController::class,'editAllocation'])->name('editAllocation');
    Route::post("/delete-allot-data",[AdminController::class,'deleteAllocation'])->name('deleteAllocation');
    /* ===================================Groups=============================================== */
    Route::get('/message-groups',[AdminController::class,'loadMessageGroups']); 
    Route::post('/message-groups',[AdminController::class,'addGroup'])->name('addGroup');
    Route::get('/get-group-detail/{id}',[AdminController::class,'getGroupDetais'])->name('getGroupDetais');
    Route::post("/updata-group-data",[AdminController::class,'editGroup'])->name('editGroup');
    Route::post("/delete-group-data",[AdminController::class,'deleteGroup'])->name('deleteGroup'); 
    /* ----------------------------------Messenger Groups--------------------------------- */
    Route::get('/messenger-groups',[AdminController::class,'loadMessengerGroups']);
    Route::get('/get-user-details/{id}',[AdminController::class,'getUserDetais'])->name('getUserDetais'); 
    Route::post('/messenger-groups',[AdminController::class,'addGroupAllot'])->name('addGroupAllot');
    Route::get('/get-group-allot-details/{id}',[AdminController::class,'getGroupAllotDetais'])->name('getGroupAllotDetais');
    Route::get('/get-edit-group-user-details/{id}',[AdminController::class,'getEditUserDetais'])->name('getEditUserDetais');
    Route::get('/get-edit-group-user-change-details/{id}',[AdminController::class,'editUserDetais'])->name('editUserDetais'); 
    Route::post('/edit-messenger-groups',[AdminController::class,'editGroupAllot'])->name('editGroupAllot');
    Route::post("/delete-group-allot-data",[AdminController::class,'deleteGroupAllocation'])->name('deleteGroupAllocation');
    
});

/* ---------------------------- User Dashboard ---------------------- */
Route::group(['middleware'=>['web','checkStudent']],function(){
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    
});


/* --------------------------------------Varify Dashboard-------------------------- */
Route::group(['middleware'=>['web','varifyStudent']],function(){
    /* -------------------------------Varification-------------------------------------- */
    Route::get('/varification',[AuthController::class,'varificationLoad']);
    Route::post('/varification',[AuthController::class,'varification'])->name('varification');
});
/* ---------------------------Process Dashboard---------------------- */
Route::group(['middleware'=>['web','checkProcess']],function(){

    Route::get('/processing',[AuthController::class,'processingLoad']);
});
/* ---------------------------Super Admin Dashboard---------------------- */
Route::group(['middleware'=>['web','checkSuperAdmin']],function(){
    Route::get('superAdmin/dashboard',[AuthController::class,'superAdminDashboard'])->name('superAdminDashboard');
});
/* ------------------------------------Messenger Dashbord-------------------------- */
Route::group(['middleware'=>['web','checkMessenger']],function(){
    /* -------------------------------------Message------------------------------- */
    Route::get('/messages/{id}', [MessageController::class, 'index'])->name('Messenger');
    Route::get('/fetch-messages', [MessageController::class, 'fetchMessages'])->name('fetchMessages');
    Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('sendMessage');
    /* =======================================Profile======================== */
    Route::get('/user/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/user/profileview', [AdminController::class, 'profile'])->name('profileview');
    Route::get('/user/profileedit', [AdminController::class, 'edit'])->name('profileedit');
    Route::post('/user/updateProfile', [AdminController::class, 'updateProfile'])->name('updateProfile');
    /* ===================================Groups============================= */
    Route::get('/messenger/groups', [AdminController::class, 'groupDestribution'])->name('groupDestribution');
    Route::get('/messenger/mesenger_groups/{id}', [AdminController::class, 'messengerGroupsView'])->name('messengerGroupsView');
});
