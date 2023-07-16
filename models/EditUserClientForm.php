<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EditUserClientForm extends Model
{
    public $fio;
    public $seriesNumbers;

    public function rules()
    {
        return [
            [['fio','seriesNumbers'], 'required', 'message' => 'Обязательно для заполнения'],
            [['seriesNumbers'], 'integer','message' => 'Параметр обязан быть числом' ],
            [['seriesNumbers'], 'string', 'length' => [10] ],
        ];
    }

}
