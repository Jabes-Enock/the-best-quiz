<?php

namespace Tech\Models;

use CodeIgniter\Model;

class TechModel extends Model
{
    protected $table = 'technologies';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = \Tech\Entities\TechEntity::class;
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['technology', 'is_visible'];

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

        'technology' => [
            'label' => 'tecnologia',
            'rules' => 'required|is_unique[technologies.technology]|min_length[3]|max_length[70]'
        ],
        'is_visible' => [
            'label' => 'tornar visivel',
            'rules' => 'required|min_length[1]|max_length[1]'
        ],
    ];
    protected $validationMessages = [
        'technology' => [
            'required' => 'o campo {field} é obrigatório',
            'is_unique' => 'a tecnologia {value} ja existe no banco de dados',
            'min_length' => 'o campo {field} deve conter no minimo {param} caracteres',
            'max_length' => 'o campo {field} deve conter no máximo {param} caracteres',
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
