<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
    Route::get('/verified', function () {
        $data['status']=session('status');
        return view('thank-you',$data);
    })->name('member_verify_response');
Route::get('/members/verify/{token}', 'Admin\MembersController@verifyUser')->name('member_verify_link');
Route::get('members/resend_email/{id}', 'Admin\MembersController@resend_email')->name('members.resend_email');
Route::get('/members-registration', 'Admin\MembersController@signUpCreate')->name('member_signup');
Route::post('members/register', 'Admin\MembersController@SignUpStore')->name('members.SignUpStore');
Route::post('members/media', 'Admin\MembersController@storeMedia')->name('members.storeMedia');
Route::post('members/ckmedia', 'Admin\MembersController@storeCKEditorImages')->name('members.storeCKEditorImages');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Members
    Route::delete('members/destroy', 'MembersController@massDestroy')->name('members.massDestroy');
    Route::get('members/resend_email/{id}', 'MembersController@resend_email')->name('members.resend_email');
    Route::get('members/print_details/{id}', 'MembersController@print_details')->name('members.print_details');
    Route::get('members/template/{template}', 'MembersController@template')->name('members.email');
    Route::put('members/save_template/{template}', 'MembersController@update_template')->name('templates.update');
    Route::post('members/media', 'MembersController@storeMedia')->name('members.storeMedia');
    Route::post('members/register', 'MembersController@SignUpStore')->name('members.SignUpStore');
    Route::post('members/ckmedia', 'MembersController@storeCKEditorImages')->name('members.storeCKEditorImages');
    Route::resource('members', 'MembersController');

    // Family
    Route::delete('families/destroy', 'FamilyController@massDestroy')->name('families.massDestroy');
    Route::post('families/media', 'FamilyController@storeMedia')->name('families.storeMedia');
    Route::post('families/ckmedia', 'FamilyController@storeCKEditorImages')->name('families.storeCKEditorImages');
    Route::resource('families', 'FamilyController');

    // Mandaat
    Route::delete('mandaats/destroy', 'MandaatController@massDestroy')->name('mandaats.massDestroy');
    Route::resource('mandaats', 'MandaatController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
