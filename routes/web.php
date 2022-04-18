<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

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
    Route::post('members/media', 'MembersController@storeMedia')->name('members.storeMedia');
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
