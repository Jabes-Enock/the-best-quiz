<?php

namespace Quiz\Entities;

use CodeIgniter\Entity\Entity;

class Quiz extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
