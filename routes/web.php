<?php



Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');

//EMPLOYEE ROUTES ARE HERE--------------------
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert-employee','EmployeeController@store');
Route::get('/all-employee', 'EmployeeController@AllEmployee')->name('all.employee');



