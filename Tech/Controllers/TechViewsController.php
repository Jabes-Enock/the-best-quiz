<?php

namespace Tech\Controllers;

use App\Controllers\BaseController;
use Tech\Models\TechModel;

class TechViewsController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TechModel;
    }

    public function index()
    {
        return view('Tech\Views\index');
    }

    public function create()
    {
        return view('Tech\Views\new');
    }
    public function edit($id)
    {
        $tech = $this->model->find($id);

        return view('Tech\Views\edit', [
            "id" => $id,
            "technology" => $tech->technology
        ]);
    }

    public function delete($id)
    {
        $tech = $this->model->find($id);

        return view('Tech\Views\delete', [
            "id" => $id,
            "technology" => $tech->technology
        ]);
    }
}
