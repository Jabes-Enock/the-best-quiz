<?php

namespace Categories\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = \Categories\Entities\Categories::class;
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'category',
        'technology_id',
        'is_visible',
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
        'category' => [
            'label' => 'categoria',
            'rules' => 'required|is_unique[categories.category]|min_length[3]|max_length[70]'
        ],
        'technology_id' => [
            'label' => 'tecnologia',
            'rules' => 'required|min_length[1]|max_length[11]'
        ],
        'is_visible' => [
            'label' => 'tornar visivel',
            'rules' => 'required|min_length[1]|max_length[1]'
        ],
    ];
    protected $validationMessages = [
        'category' => [
            'required' => 'O campo {field} é obrigatório',
            'is_unique' => 'A categoria {value} já existe no banco de dados',
            'min_length' => 'A {field} deve contem no mínimo {param} caracteres.',
            'max_length' => 'A {field} deve contem no máximo {param} caracteres.'
        ],
        'technology_id' => [
            'required' => 'O campo {field} é obrigatório',
        ],
        'is_visible' => [
            'required' => 'o campo {field} é obrigatório',
            'min_length' => 'o campo {field} deve conter no minimo {param} caracteres',
            'max_length' => 'o campo {field} deve conter no máximo {param} caracteres',
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
