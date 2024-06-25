<?php

namespace Categories\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsVisibleColumnToCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("categories", [
            "is_visible" => [
                "type" => "INT",
                "constraint" => 1,
                "null" => false
            ]
        ]);

        $this->forge->processIndexes("categories");
    }

    public function down()
    {
        $this->forge->dropColumn("categories", "is_visible");
    }
}
