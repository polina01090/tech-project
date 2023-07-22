<?php

namespace app\models;

use Yii;
use yii\base\Model;


class AddBookOutForm extends Model
{
    public $user_staff_id;
    public $user_client_id;
    public $date;
    public $date_deadline;

    public function rules()
    {
        return [
            [['user_staff_id', 'user_client_id', 'date', 'date_deadline'], 'required', 'message' => 'Обязательно для заполнения'],
            [['user_staff_id', 'user_client_id'], 'integer','message' => 'Параметр обязан быть числом' ],
            ['date_deadline', 'compare', 'compareAttribute' => 'date', 'operator' => '>'],
        ];
    }

}
