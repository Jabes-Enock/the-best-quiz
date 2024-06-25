<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesTable extends Migration
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
            "category" => [
                "type" => "VARCHAR",
                "constraint" => 70,
                "null" => false,
                "unique" => true,
            ],
            "technology_id" => [
                "type" => "INT",
                "constraint" => 11,
                "null" => false,
                "unsigned" => true,
            ],
        ]);

        $this->forge->addPrimaryKey("id");
        $this->forge
            ->addForeignKey(
                "technology_id",
                "technologies",
                "id",
                "CASCADE",
                "CASCADE",
                "fk_categories_technologies"
            );

        $this->forge->createTable("categories");
    }

    public function down()
    {
        $this->forge->dropTable("categories");
    }
}
