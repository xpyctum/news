<?php

use yii\db\Migration;

class m161111_101608_init extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string('127')->notNull()->unique(),
            'title' => $this->string('256')->notNull(),
            'description' => $this->text(),
            'content' => $this->text(),
            'image' => $this->string('256'),
            'status' => $this->smallInteger(1),
            'created_at' => $this->integer()->unsigned(),
            'updated_at' => $this->integer()->unsigned(),
            'deleted_at' => $this->integer()->unsigned()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
