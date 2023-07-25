<?php

use yii\db\Migration;

class m230724_160231_create_accounts_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%accounts}}', [
            'id' => $this->primaryKey(),
            'defaultCurrencyId' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-accounts-defaultCurrencyId',
            '{{%accounts}}',
            'defaultCurrencyId',
            '{{%currencies}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%accounts}}');
    }
}
