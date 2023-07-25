<?php

use yii\db\Migration;

class m230724_155855_create_currencies_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%currencies}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'exchangeWeight' => $this->decimal(8, 2)->defaultValue(1)->notNull(),
            'isActive' => $this->tinyInteger()->defaultValue(1)->notNull(),
        ]);


        $this->batchInsert('{{%currencies}}', ['name'], [
            ['RUB'], ['USD'], ['EUR']
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%currencies}}');
    }
}
