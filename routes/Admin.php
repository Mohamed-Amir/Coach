<?php

Route::post('/admin/login', 'AuthController@login')->name('admin.login');

Route::prefix('Admin')->group(function () {
    Route::get('/login', function () {
        return view('Admin.loginAdmin');
    });
    Route::group(['middleware' => 'roles', 'roles' => ['Admin']], function () {

        Route::get('/logout/logout', 'AuthController@logout')->name('user.logout');
        Route::get('/home', 'AuthController@index')->name('admin.dashboard');

        // Profile Route
        Route::prefix('profile')->group(function () {
            Route::get('/index', 'profileController@index')->name('profile.index');
            Route::post('/index', 'profileController@update')->name('profile.update');
        });

        // Admin Routes
        Route::prefix('Admin')->group(function () {
            Route::get('/index', 'AdminController@index')->name('Admin.index');
            Route::get('/allData', 'AdminController@allData')->name('Admin.allData');
            Route::post('/create', 'AdminController@create')->name('Admin.create');
            Route::get('/edit/{id}', 'AdminController@edit')->name('Admin.edit');
            Route::post('/update', 'AdminController@update')->name('Admin.update');
            Route::get('/destroy/{id}', 'AdminController@destroy')->name('Admin.destroy');
        });

        /** Packages */
        Route::prefix('Packages')->group(function () {
            Route::get('/index', 'PackagesController@index')->name('Packages.index');
            Route::get('/allData', 'PackagesController@allData')->name('Packages.allData');
            Route::post('/create', 'PackagesController@create')->name('Packages.create');
            Route::get('/edit/{id}', 'PackagesController@edit')->name('Packages.edit');
            Route::post('/update', 'PackagesController@update')->name('Packages.update');
            Route::get('/destroy/{id}', 'PackagesController@destroy')->name('Packages.destroy');
            Route::get('/ChangeStatus/{id}', 'PackagesController@ChangeStatus')->name('Packages.ChangeStatus');

        });

        /** Package_weeks */
        Route::prefix('Package_weeks')->group(function () {
            Route::get('/index', 'Package_weeksController@index')->name('Package_weeks.index');
            Route::get('/allData', 'Package_weeksController@allData')->name('Package_weeks.allData');
            Route::post('/create', 'Package_weeksController@create')->name('Package_weeks.create');
            Route::get('/edit/{id}', 'Package_weeksController@edit')->name('Package_weeks.edit');
            Route::post('/update', 'Package_weeksController@update')->name('Package_weeks.update');
            Route::get('/destroy/{id}', 'Package_weeksController@destroy')->name('Package_weeks.destroy');

        });

        /** Week_days */
        Route::prefix('Week_days')->group(function () {
            Route::get('/index', 'Week_daysController@index')->name('Week_days.index');
            Route::get('/allData', 'Week_daysController@allData')->name('Week_days.allData');
            Route::post('/create', 'Week_daysController@create')->name('Week_days.create');
            Route::get('/edit/{id}', 'Week_daysController@edit')->name('Week_days.edit');
            Route::post('/update', 'Week_daysController@update')->name('Week_days.update');
            Route::get('/destroy/{id}', 'Week_daysController@destroy')->name('Week_days.destroy');

        });


        /** Contacts */
        Route::prefix('Contacts')->group(function () {
            Route::get('/index', 'ContactsController@index')->name('Contacts.index');
            Route::get('/allData', 'ContactsController@allData')->name('Contacts.allData');
            Route::get('/edit/{id}', 'ContactsController@edit')->name('Contacts.edit');
            Route::post('/update', 'ContactsController@update')->name('Contacts.update');
        });

        /** Contact_us */
        Route::prefix('Contact_us')->group(function () {
            Route::get('/index', 'Contact_usController@index')->name('Contact_us.index');
            Route::get('/allData', 'Contact_usController@allData')->name('Contact_us.allData');
            Route::get('/destroy/{id}', 'Contact_usController@destroy')->name('Contact_us.destroy');

        });

        /** User */
        Route::prefix('User')->group(function () {
            Route::get('/index', 'UserController@index')->name('User.index');
            Route::get('/allData', 'UserController@allData')->name('User.allData');
            Route::get('/destroy/{id}', 'UserController@destroy')->name('User.destroy');

        });
    });
});

