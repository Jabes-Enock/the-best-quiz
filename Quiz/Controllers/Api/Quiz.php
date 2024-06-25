<?php

namespace Quiz\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use Tech\Models\TechModel;
use Categories\Models\CategoriesModel;
use Questions\Models\QuestionsModel;

class Quiz extends ResourceController
{
    protected $techModel;
    protected $categoryModel;
    protected $questionModel;

    public function __construct()
    {
        $this->techModel = new TechModel;
        $this->categoryModel = new CategoriesModel;
        $this->questionModel = new QuestionsModel;
    }


    public function getVisibleTechnologies()
    {
        $data = $this->techModel
            ->where("is_visible", 1)
            ->findAll();

        if (!$data) {
            return $this->respond(["message" => "Nenhuma tecnologia foi cadastrada"]);
        }

        return $this->respond($data);
    }

    public function getVisibleCategories()
    {
        $data = $this->categoryModel
            ->where("is_visible", 1)
            ->findAll();

        if (!$data) {
            return $this->respond(["message" => "Nenhuma tecnologia foi cadastrada"]);
        }

        return $this->respond($data);
    }

    public function categoriesByTechnology($technology_id = null)
    {
        if (!$this->techModel->find($technology_id)) {
            return $this->respond(["message" => "tecnologia não encontrada"]);
        }

        $categories = $this->categoryModel
            ->where("technology_id", $technology_id)
            ->where("is_visible", 1)
            ->findAll();

        if (count($categories) == 0) {
            return $this->respond(["message" => "nenhuma categoria cadastrada"]);
        }

        if (!$categories) {
            return $this->respond($this->categoryModel->errors());
        }

        return $this->respond($categories);
    }

    public function questionsByCategory($category_id = null)
    {
        if (!$this->categoryModel->find($category_id)) {
            return $this->respond(["message" => "categoria não encontrada"]);
        }

        $questions = $this->questionModel
            ->select("id, question, option_a, option_b, option_c, option_d")
            ->where("category_id", $category_id)
            ->paginate(1);

        if (count($questions) == 0) {
            return $this->respond(["message" => "nenhuma pergunta cadastrada"]);
        }

        if (!$questions) {
            return $this->respond($this->questionModel->errors());
        }

        return $this->respond([
            "id" => $questions[0]->id,
            "question" => $questions[0]->question,
            "options" => [
                $questions[0]->option_a,
                $questions[0]->option_b,
                $questions[0]->option_c,
                $questions[0]->option_d,
            ],
            "pages" => $this->questionModel->pager->getPageCount(),
        ]);
    }

    public function checkAnswer()
    {
        if (!$this->request->is("json")) {
            return $this->respond(["message" => "Os dados precisam ser JSON"]);
        }

        $data = $this->removeWhiteSpace();

        $rules = [
            "question_id" => [
                "label" => "ID da pergunta",
                "rules" => "required",
                "errors" => [
                    "required" => "o campo {field} é obrigatório"
                ],
            ],
            "answer" => [
                "label" => "resposta",
                "rules" => "required|in_list[option_a,option_b,option_c,option_d]",
                "errors" => [
                    "required" => "o campo {field} é obrigatório",
                    "in_list" => "o campo {field} precisa conter as seguintes opções: {param}",
                ],
            ],
        ];

        if (!$this->validateData($data, $rules)) {
            return $this->respond($this->validator->getErrors());
        }

        $question = $this->questionModel
            ->select("correct")
            ->find($data["question_id"]);

        if (!$question) {
            return $this->respond(["message" => "pergunta não encontrada"]);
        }

        if ($question->correct != $data["answer"]) {
            return $this->respond([
                "is_correct" => false,
                "correct" => $question->correct,
                "answered" => $data["answer"],
            ]);
        }

        return $this->respond([
            "is_correct" => true,
            "correct" => $question->correct,
        ]);
    }

    public function removeWhiteSpace()
    {
        $data = $this->request->getJSON(true);

        $clean_data = array_map(function ($value) {
            return trim(preg_replace("/\s+/", " ", $value));
        }, $data);

        return $clean_data;
    }
}
