<?php

/*
|--------------------------------------------------------------------------
| Systems Web Routes
|--------------------------------------------------------------------------
|
| Base route
|
*/

Route::group(['namespace' => 'Systems', 'prefix' => 'systems'], function () {
    Route::get('settings', [
        'as'   => 'dashboard.systems.settings',
        'uses' => 'SettingController@index',
    ]);

    Route::post('settings', [
        'as'   => 'dashboard.systems.settings',
        'uses' => 'SettingController@store',
    ]);

    Route::resource('users', 'UserController', ['names' => [
        'index'   => 'dashboard.systems.users',
        'create'  => 'dashboard.systems.users.create',
        'edit'    => 'dashboard.systems.users.edit',
        'update'  => 'dashboard.systems.users.update',
        'store'   => 'dashboard.systems.users.store',
        'destroy' => 'dashboard.systems.users.destroy',
    ]]);

    Route::resource('roles', 'RoleController', ['names' => [
        'index'   => 'dashboard.systems.roles',
        'create'  => 'dashboard.systems.roles.create',
        'edit'    => 'dashboard.systems.roles.edit',
        'update'  => 'dashboard.systems.roles.update',
        'store'   => 'dashboard.systems.roles.store',
        'destroy' => 'dashboard.systems.roles.destroy',
    ]]);

    Route::resource('backup', 'BackupController', ['names' => [
        'index'    => 'dashboard.systems.backup',
        'create'   => 'dashboard.systems.backup.create',
        'download' => 'dashboard.systems.backup.download',
        'destroy'  => 'dashboard.systems.backup.destroy',
    ]]);

    Route::resource('schema', 'SchemaController', ['names' => [
        'index' => 'dashboard.systems.schema.index',
        'show'  => 'dashboard.systems.schema.show',
    ]]);

    /*
     * Logs Dashboard
    Route::get('/test1', [
        'as' => 'log-viewer::dashboard',
        'uses' => 'LogController@index',
    ]);
    */
    Route::resource('logs', 'LogController', ['names' => [
        'index'    => 'dashboard.systems.logs.index',
        'show'     => 'dashboard.systems.logs.show',
        'download' => 'dashboard.systems.logs.show',
        'destroy'  => 'dashboard.systems.logs.destroy',
    ]]);

    Route::get('/logs2', [
        'as'   => 'log-viewer::logs.list',
        'uses' => 'LogController@listLogs',
    ]);

    Route::delete('delete', [
        'as'   => 'log-viewer::logs.delete',
        'uses' => 'LogController@delete',
    ]);

    Route::get('/test3/{test}', [
        'as'   => 'log-viewer::logs.show',
        'uses' => 'LogController@show',
    ]);

    Route::get('download', [
        'as'   => 'log-viewer::logs.download',
        'uses' => 'LogController@download',
    ]);

    Route::get('path-template', [
        'as'   => 'dashboard::partials.path',
        'uses' => function () {
            return view('dashboard::partials.path');
        },
    ]);

    Route::get('icons', [
        'as'   => 'dashboard::icons',
        'uses' => function () {
            $res = [
                ['code' => 'ad', 'icon' => '/bower_components/flag-icon-css/flags/1x1/ad.svg', 'label' => 'Метка 1'],
                ['code' => 'ae', 'icon' => '/bower_components/flag-icon-css/flags/1x1/ae.svg', 'label' => 'Метка 2'],
                ['code' => 'af', 'icon' => '/bower_components/flag-icon-css/flags/1x1/af.svg', 'label' => 'Метка 3'],
                ['code' => 'ag', 'icon' => '/bower_components/flag-icon-css/flags/1x1/ag.svg', 'label' => 'Метка 4'],
            ];

            return json_encode($res);
        },
    ]);

    $this->get('test4/{level}', [
        'as'   => 'log-viewer::logs.filter',
        'uses' => 'LogController@showByLevel',
    ]);
});