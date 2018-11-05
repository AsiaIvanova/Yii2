<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181104_110913_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'responsible_id' => $this->primaryKey(11),
            'task_name' => $this->string(50),
            'task_description' => $this->string(250),
            'deadline' => $this->date(),
            'manager_id' => $this->integer(11)
        ]);

        $this->addForeignKey("fk_users_tasks", "users", "id", "tasks", "responsible_id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
