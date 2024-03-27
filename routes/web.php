<?php

use App\Livewire\Issues\IssueForm;
use App\Livewire\Issues\IssueList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('issues', IssueList::class)->name('issues');

Route::get('issues/create', IssueForm::class)->name('issues.create');
Route::get('issues/{issue}', IssueForm::class)->name('issues.edit');
