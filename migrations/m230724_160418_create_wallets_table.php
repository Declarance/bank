<?php

use yii\db\Migration;

class m230724_160418_create_wallets_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%wallets}}', [
            'id' => $this->primaryKey(),
            'accountId' => $this->integer()->notNull(),
            'currencyId' => $this->integer()->notNull(),
            'value' => $this->decimal(8, 2)->notNull()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk-wallets-accountId',
            '{{%wallets}}',
            'accountId',
            '{{%accounts}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-wallets-currencyId',
            '{{%wallets}}',
            'currencyId',
            '{{%currencies}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%wallets}}');
    }
}
