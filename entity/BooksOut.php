<?php

namespace app\entity;

use Cassandra\Date;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $book_id
 * @property int $user_staff_id
 * @property int $user_client_id
 * @property date $date
 * @property date $date_deadline
 */

class BooksOut extends ActiveRecord
{
    public static function tableName()
    {
        return 'out_books';
    }

}