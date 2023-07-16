<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EditUserStaffForm extends Model
{
    public $fio;
    public $staff_id;

    public function rules()
    {
        return [
            [['fio','staff_id'], 'required', 'message' => 'Обязательно для заполнения'],
            [['staff_id'], 'integer','message' => 'Параметр обязан быть числом' ],
        ];
    }

}
