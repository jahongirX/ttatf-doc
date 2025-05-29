<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m220806_094151_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'name' => $this->integer()->notNull(),
            'created_date' => $this->dateTime()->defaultExpression("NOW()"),
            'updated_date' => $this->dateTime()->defaultExpression("NOW()"),
            'status' => $this->integer()->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group}}');
    }
}
