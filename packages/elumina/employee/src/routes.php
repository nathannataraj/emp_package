<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    Route::resource('/employee', 'Elumina\Employee\EmployeeController');
});
