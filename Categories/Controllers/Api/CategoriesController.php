<?php

namespace Categories\Controllers\Api;

use Categories\Models\CategoriesModel;
use CodeIgniter\RESTful\ResourceController;

class CategoriesController extends ResourceController
{
    protected $model;

    public function __construct()
    {
        $this->model = new CategoriesModel;
    }

    public function index()
    {
        $categories = $this->model->findAll();

        if (!$categories) {
            return $this->respond(["message" => "nenhuma categoria cadastrada"]);
        }

        return $this->respond($categories);
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
        $category = $this->model->find($id);

        if (!$category) {
            return $this->respond(["message" => "categoria não encontrada"]);
        }

        return $this->respond($category);
    }

    public function update($id = null)
    {
        if (!$this->request->is("json")) {
            return $this->respond(["message" => "O tipo de dado deve ser JSON"]);
        }

        $category = $this->model->find($id);

        if (!$category) {
            return $this->respond(["message" => "categoria não encontrada"]);
        }

        $data = $this->removeWhiteSpace();

        $category->fill($data);

        if (!$category->hasChanged()) {
            return $this->respond(["message" => "nenhum dado foi alterado"]);
        }

        if (!$this->model->save($category)) {
            return $this->respond($this->model->errors());
        }

        return $this->respondCreated();
    }

    public function delete($id = null)
    {
        $category = $this->model->find($id);

        if (!$category) {
            return $this->respond(["message" => "categoria não encontrada"]);
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
