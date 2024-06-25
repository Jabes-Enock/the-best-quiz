<?php

namespace Questions\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuestionsTableMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 11,
                "auto_increment" => true,
                "null" => false,
                "unsigned" => true,
            ],
            "question" => [
                "type" => "TEXT",
                "constraint" => 1000,
                "null" => false,
                "unique" => true,
            ],
            "correct" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => false,
            ],
            "option_a" => [
                "type" => "TEXT",
                "constraint" => 600,
                "null" => false,
            ],
            "option_b" => [
                "type" => "TEXT",
                "constraint" => 600,
                "null" => false,
            ],
            "option_c" => [
                "type" => "TEXT",
                "constraint" => 600,
                "null" => false,
            ],
            "option_d" => [
                "type" => "TEXT",
                "constraint" => 600,
                "null" => false,
            ],
            "category_id" => [
                "type" => "INT",
                "constraint" => 11,
                "null" => false,
                "unsigned" => true,
            ],
        ]);

        $this->forge->addPrimaryKey("id");
        $this->forge->addForeignKey(
            "category_id",
            "categories",
            "id",
            "CASCADE",
            "CASCADE",
            "fk_questions_categories",
        );
        $this->forge->createTable("questions");
    }

    public function down()
    {
        $this->forge->dropPrimaryKey("questions", "id");
        $this->forge->dropForeignKey("questions", "fk_questions_categories");
        $this->forge->dropTable("questions");
    }
}
