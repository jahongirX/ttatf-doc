<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m220806_094142_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(255)->notNull(),
            'group_id' => $this->integer(10)->notNull(),
            'phone_number_one' => $this->string(255)->notNull(),
            'phone_number_parent' => $this->string(255)->notNull(),
            'created_date' => $this->dateTime()->defaultExpression("NOW()"),
            'updated_date' => $this->dateTime()->defaultExpression("NOW()"),
            'status' => $this->integer(10)->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
