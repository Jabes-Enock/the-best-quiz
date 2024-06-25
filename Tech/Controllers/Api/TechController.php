<?php

namespace Tech\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use Tech\Models\TechModel;

class TechController extends ResourceController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TechModel;
    }



    public function index()
    {
        $data = $this->model->orderBy('id')
            ->findAll();

        if (!$data) {
            return $this->respond(["message" => "Nenhuma tecnologia foi cadastrada"]);
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
        $tech = $this->model->find($id);

        if (!$tech) {
            return $this->respond(["message" => "tecnologia não encontrada"]);
        }

        return $this->respond($tech);
    }

    public function update($id = null)
    {
        if (!$this->request->is("json")) {
            return $this->respond(["message" => "O tipo de dado deve ser JSON"]);
        }

        $data = $this->removeWhiteSpace();

        $tech = $this->model->find($id);

        if (!$tech) {
            return $this->respond(["message" => "tecnologia não encontrada"]);
        }

        $tech->fill($data);

        if (!$tech->hasChanged()) {
            return $this->respond(["message" => "não houve alteração nos dados"]);
        }

        if (!$this->model->save($tech)) {
            return $this->respond($this->model->errors());
        }


        return $this->respondCreated();
    }


    public function delete($id = null)
    {
        $tech = $this->model->find($id);

        if (!$tech) {
            return $this->respond(["message" => "tecnologia não encontrada"]);
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
