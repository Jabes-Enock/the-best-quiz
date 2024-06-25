<?php

namespace Quiz\Controllers;

use App\Controllers\BaseController;
use Tech\Models\TechModel;

class QuizViews extends BaseController
{
    public $techModel;

    public function __construct()
    {
        $this->techModel = new TechModel;
    }
    public function index()
    {
        return view("Quiz\Views\index");
    }

    public function categoriesByTech(string|null $tech_id = null)
    {
        $tech = $this->techModel->find($tech_id);

        return view("Quiz\Views\categories_by_tech", [
            "tech_id" => $tech->id,
            "tech_name" => $tech->technology,
        ]);
    }

    public function questions(string|null $category_id = null)
    {
        return view("Quiz\Views\questions", [
            "category_id" => $category_id
        ]);
    }
}
