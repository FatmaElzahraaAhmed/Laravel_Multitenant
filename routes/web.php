<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {

    $array = [
        'app1.multitenant.test' => 'app1',
        'app2.multitenant.test' => 'app2'
    ];


    $host = $request->getHost();

    if (in_array($host, array_keys($array))) {
        $db = $array[$host];
        DB::purge('system');
        Config::set('database.connections.system.database', $db);
        DB::reconnect('system');
    }

    $port = $request->getPort();

    dd(DB::table('users')->get()->toArray());


    return view('welcome', compact('host'));
});
