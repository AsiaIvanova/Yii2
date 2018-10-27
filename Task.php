<?php

namespace app\models;


use yii\base\Model;

class Task extends Model
{
    public $task;
    public $responsible;
    public $deadline;

    public function rules()
    {
        return [
            [['task', 'responsible', 'deadline'], 'required']
        ];
    }
}