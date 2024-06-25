<?php

namespace Tech\Entities;

use CodeIgniter\Entity\Entity;

class TechEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
