<?php

namespace Questions\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use Questions\Models\QuestionsModel;

class QuestionsController extends ResourceController
{

    protected $model;
    public function __construct()
    {
        $this->model = new QuestionsModel;
    }
    public function index()
    {
        $questions = $this->model->findAll();

        if (!$questions) {
            return $this->respond(["message" => "nenhuma questão cadastrada"]);
        }

        return $this->respond($questions);
    }

    public function filter(string|null $text = null)
    {
        $data = $this->model
            ->like("question", $text)
            ->orLike("option_a", $text)
            ->orLike("option_b", $text)
            ->orLike("option_c", $text)
            ->orLike("option_d", $text)
            ->findAll();

        if (!$data) {
            return $this->respond(["message" => "nenhuma questão encontrada com essa descrição"]);
        }

        return $this->respond($data);
    }

    public function create()
    {
        if (!$this->request->is("json")) {
            return $this->respond(["message" => "O tipo de dado deve ser JSON"]);
        }

        $data = $this->removeWhiteSpace();

        if (!$this->model->save($data)) {
            return $this->respond($this->model->errors());
        }

        return $this->respondCreated();
    }

    public function show($id = null)
    {
        $question = $this->model->find($id);

        if (!$question) {
            return $this->respond(["message" => "questão não encontrada"]);
        }

        return $this->respond($question);
    }

    public function update($id = null)
    {
        if (!$this->request->is("json")) {
            return $this->respond(["message" => "O tipo de dado deve ser JSON"]);
        }

        $question = $this->model->find($id);

        if (!$question) {
            return $this->respond(["message" => "questão não encontrada"]);
        }

        $data = $this->removeWhiteSpace();

        $question->fill($data);

        if (!$question->hasChanged()) {
            return $this->respond(["message" => "nenhum dado foi alterado"]);
        }

        if (!$this->model->save($question)) {
            return $this->respond($this->model->errors());
        }

        return $this->respondCreated();
    }

    public function delete($id = null)
    {
        $question = $this->model->find($id);

        if (!$question) {
            return $this->respond(["message" => "questão não encontrada"]);
        }

        if (!$this->model->delete($id)) {
            return $this->respond($this->model->errors());
        }

        return $this->respondCreated();
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
