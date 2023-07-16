<?php

namespace app\models;

use Yii;
use yii\base\Model;


class AddBookOutForm extends Model
{
    public $book_id;
    public $user_staff_id;
    public $user_client_id;
    public $date;
    public $date_deadline;

    public function rules()
    {
        return [
            [['book_id','user_staff_id', 'user_client_id', 'date', 'date_deadline'], 'required', 'message' => 'Обязательно для заполнения'],
            [['book_id','user_staff_id', 'user_client_id'], 'integer','message' => 'Параметр обязан быть числом' ],
            ['date_deadline', 'compare', 'compareAttribute' => 'date', 'operator' => '>'],
        ];
    }

}
