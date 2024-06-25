<?php

namespace Categories\Controllers;

use App\Controllers\BaseController;
use Categories\Models\CategoriesModel;
use Tech\Models\TechModel;

class CategoriesViewsController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new CategoriesModel;
    }

    public function index()
    {
        return view('Categories\Views\index');
    }

    public function create()
    {
        //there is a foreign key, see migrations for categories table
        $model = new TechModel;

        $tech = $model->findAll();

        return view('Categories\Views\new', [
            "techs" => $tech
        ]);
    }
    public function edit($id)
    {
        $category = $this->model->find($id);

        return view('Categories\Views\edit', [
            "id" => $id,
            "category" => $category
        ]);
    }

    public function delete($id)
    {
        $category = $this->model->find($id);

        return view('Categories\Views\delete', [
            "id" => $id,
            "category" => $category->category
        ]);
    }
}
