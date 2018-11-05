<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property string $task_name
 * @property string $task_description
 * @property string $deadline
 * @property int $responsible_id
 * @property int $manager_id
 *
 * @property Users $users
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deadline'], 'safe'],
            [['manager_id'], 'integer'],
            [['task_name'], 'string', 'max' => 50],
            [['task_description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_name' => 'Task Name',
            'task_description' => 'Task Description',
            'deadline' => 'Deadline',
            'responsible_id' => 'Responsible ID',
            'manager_id' => 'Manager ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'responsible_id']);
    }
}
