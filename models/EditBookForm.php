<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EditBookForm extends Model
{
    public $name;
    public $article;
    public $date;
    public $author;
    public $count;

    public function rules()
    {
        return [
            [['name', 'article', 'date', 'author', 'count'], 'required', 'message' => 'Обязательно для заполнения'],
            [['count'], 'integer', 'min' => 1],
        ];
    }

}
