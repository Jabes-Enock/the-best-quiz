<?php

namespace Tech\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsVisibleColumnToTechnologiesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("technologies", [
            "is_visible" => [
                "type" => "INT",
                "constraint" => 1
            ]
        ]);

        $this->forge->processIndexes("technologies");
    }

    public function down()
    {
        $this->forge->dropColumn("technologies", "is_visible");
    }
}
