<?php

namespace app\models;

use Yii;
use yii\base\Model;


class AddBookBackForm extends Model
{
    public $user_staff_id;
    public $date;
    public $condition_id;

    public function rules()
    {
        return [
            [['user_staff_id','date', 'condition_id'], 'required', 'message' => 'Обязательно для заполнения'],
        ];
    }

}
