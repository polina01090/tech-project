<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EditStaffForm extends Model
{
    public $name;

    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Напиши хоть что-нибудь'],
        ];
    }

}
