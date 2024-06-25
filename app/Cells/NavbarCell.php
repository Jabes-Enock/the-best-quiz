<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class NavbarCell extends Cell
{
    public $links = [
        "technologies" => [
            "title" => "Tecnologia",
            "icon" => "mdi mdi-progress-wrench",
            "dropdown_name" => "tecnologia",
            "methods" => [
                "index" => [
                    "title" => "Ver todas",
                    "uri" => "tecnologias",
                ],
                "create" => [
                    "title" => "Adicionar",
                    "uri" => "tecnologias/adicionar",
                ],
            ]
        ],
        "categories" => [
            "title" => "Categorias",
            "icon" => "mdi mdi-shape-plus",
            "dropdown_name" => "categorias",
            "methods" => [
                "index" => [
                    "title" => "Listar",
                    "uri" => "categorias",
                ],
                "create" => [
                    "title" => "Adicionar",
                    "uri" => "categorias/adicionar",
                ],
            ]
        ],
        "questions" => [
            "title" => "Perguntas",
            "icon" => "mdi mdi-cloud-question-outline",
            "dropdown_name" => "perguntas",
            "methods" => [
                "index" => [
                    "title" => "Procurar",
                    "uri" => "perguntas",
                ],
                "create" => [
                    "title" => "Adicionar",
                    "uri" => "perguntas/adicionar",
                ],
            ]
        ],
    ];
}
