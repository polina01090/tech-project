<?php

namespace app\entity;

use Cassandra\Date;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property  string $name
 * @property  string $article
 * @property  date $date
 * @property  string $author
 * @property  int $count
 */

class Books extends ActiveRecord
{
    public static function tableName()
    {
        return 'books';
    }

}