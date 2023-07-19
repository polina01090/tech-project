<?php

namespace app\entity;

use Cassandra\Date;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $user_staff_id
 * @property int $out_id
 * @property date $date
 * @property int $condition_id
 */

class BooksBack extends ActiveRecord
{
    public static function tableName()
    {
        return 'back_books';
    }

}