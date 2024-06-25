<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTechnologiesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "auto_increment" => true,
                "constraint" => 11,
                "null" => false,
                "unsigned" => true,
            ],
            "technology" => [
                "type" => "VARCHAR",
                "constraint" => 70,
                "null" => false,
                "unique" => true,
            ],
        ]);

        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("technologies");
    }

    public function down()
    {
        $this->forge->dropTable("technologies");
    }
}
