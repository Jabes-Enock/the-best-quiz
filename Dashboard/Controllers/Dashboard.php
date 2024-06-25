<?php

namespace Dashboard\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('Dashboard\Views\index');
    }
}
