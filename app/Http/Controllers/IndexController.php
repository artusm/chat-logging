<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * GET /
     *
     * Display the main page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $config = config('main');

        return app('view')->make('index', [
            'servers' => json_encode($config['servers'], JSON_UNESCAPED_UNICODE),
            'metaData' => $config['metaData'],
            'navBarItems' => json_encode($config['navBarItems'], JSON_UNESCAPED_UNICODE),
            'projectName' => json_encode($config['projectName'], JSON_UNESCAPED_UNICODE)
        ]);
    }
}