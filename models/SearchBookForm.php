<?php

namespace app\models;

use Yii;
use yii\base\Model;


class SearchBookForm extends Model
{
    public $count;

    public function rules()
    {
        return [
            [['count']],
        ];
    }

}
