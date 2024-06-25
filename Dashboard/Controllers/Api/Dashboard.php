<?php

namespace Dashboard\Controllers\Api;

use Categories\Models\CategoriesModel;
use CodeIgniter\RESTful\ResourceController;
use Questions\Models\QuestionsModel;
use Tech\Models\TechModel;

class Dashboard extends ResourceController
{
    protected $techModel;
    protected $categoriesModel;
    protected $questionModel;


    public function __construct(Type $var = null)
    {
        $this->techModel = new TechModel;
        $this->categoriesModel = new CategoriesModel;
        $this->questionModel = new QuestionsModel;
    }

    public function resumeResources()
    {
        $techs = $this->techModel->countAll();
        $categories = $this->categoriesModel->countAll();
        $questions = $this->questionModel->countAll();

        return $this->respond([
            ["name" => "tecnologias", "quantity" => $techs],
            ["name" => "categorias", "quantity" => $categories],
            ["name" => "perguntas", "quantity" => $questions]
        ]);
    }

    public function categoriesJoinQuestions()
    {
        $categories = $this->categoriesModel->findAll();

        $questionsFiltered = [];

        foreach ($categories as $key => $category) {
            $questions = $this->questionModel
                ->distinct()
                ->where("category_id", $category->id)
                ->findAll();

            $questionsFiltered[$key] = [
                "category" => $category->category,
                "questions" => count($questions)
            ];
        }

        return $this->respond($questionsFiltered);
    }
}
