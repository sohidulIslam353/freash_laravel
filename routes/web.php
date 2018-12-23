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
Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
Route::post('/update-employee/{id}','EmployeeController@UpdateEmployee');

//customers routes are here-------------------
Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer','CustomerController@Store');