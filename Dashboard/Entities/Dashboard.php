<?php

namespace Dashboard\Entities;

use CodeIgniter\Entity\Entity;

class Dashboard extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
