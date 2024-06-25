<?php

namespace Questions\Controllers;

use App\Controllers\BaseController;
use Categories\Models\CategoriesModel;
use Questions\Models\QuestionsModel;

class QuestionsViewsController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new QuestionsModel;
    }

    public function index()
    {
        return view('Questions\Views\index');
    }

    public function create()
    {
        //there is a foreign key, see migrations for categories table
        $model = new CategoriesModel;

        $categories = $model->findAll();

        return view('Questions\Views\new', [
            "categories" => $categories
        ]);
    }
    public function edit($id)
    {
        $question = $this->model->find($id);

        return view('Questions\Views\edit', [
            "id" => $id,
            "question" => $question
        ]);
    }

    public function delete($id)
    {
        $question = $this->model->find($id);

        return view('Questions\Views\delete', [
            "id" => $id,
            "question" => $question
        ]);
    }
}
