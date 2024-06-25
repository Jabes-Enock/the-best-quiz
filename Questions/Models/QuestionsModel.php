<?php

namespace Questions\Models;

use CodeIgniter\Model;

class QuestionsModel extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = \Questions\Entities\QuestionsEntity::class;
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'question',
        'correct',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'category_id',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        "question" => [
            "label" => "pergunta",
            "rules" =>
                [
                    "required",
                    "is_unique[questions.question]",
                    "max_length[200]",
                    "min_length[15]"
                ],
        ],
        "correct" => [
            "label" => "resposta correta",
            "rules" => [
                "required",
                "max_length[255]"
            ],
        ],
        "option_a" => [
            "label" => "opção A",
            "rules" => [
                "required",
                "max_length[255]",
                "min_length[5]"
            ],
        ],
        "option_b" => [
            "label" => "opção B",
            "rules" => [
                "required",
                "max_length[255]",
                "min_length[5]"
            ],
        ],
        "option_c" => [
            "label" => "opção C",
            "rules" => [
                "required",
                "max_length[255]",
                "min_length[5]"
            ],
        ],
        "option_d" => [
            "label" => "opção D",
            "rules" => [
                "required",
                "max_length[255]",
                "min_length[5]"
            ],
        ],
        "category_id" => [
            "label" => "categoria",
            "rules" => [
                "required"
            ],
        ],
    ];

    protected $validationMessages = [
        "question" => [
            "required" => "o campo {field} é obrigatório",
            "is_unique" => "essa questão já existe no banco de dados",
            "max_length" => "o campo {field} deve conter no máximo {param} caracteres",
            "min_length" => "o campo {field} deve conter no mínimo {param} caracteres",
        ],
        "correct" => [
            "required" => "o campo {field} é obrigatório",
            "max_length" => "o campo {field} deve conter no máximo {param} caracteres",
            "min_length" => "o campo {field} deve conter no mínimo {param} caracteres",
        ],
        "option_a" => [
            "required" => "o campo {field} é obrigatório",
            "max_length" => "o campo {field} deve conter no máximo {param} caracteres",
            "min_length" => "o campo {field} deve conter no mínimo {param} caracteres",
        ],
        "option_b" => [
            "required" => "o campo {field} é obrigatório",
            "max_length" => "o campo {field} deve conter no máximo {param} caracteres",
            "min_length" => "o campo {field} deve conter no mínimo {param} caracteres",
        ],
        "option_c" => [
            "required" => "o campo {field} é obrigatório",
            "max_length" => "o campo {field} deve conter no máximo {param} caracteres",
            "min_length" => "o campo {field} deve conter no mínimo {param} caracteres",
        ],
        "option_d" => [
            "required" => "o campo {field} é obrigatório",
            "max_length" => "o campo {field} deve conter no máximo {param} caracteres",
            "min_length" => "o campo {field} deve conter no mínimo {param} caracteres",
        ],
        "category_id" => [
            "required" => "o campo {field} é obrigatório"
        ],
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
