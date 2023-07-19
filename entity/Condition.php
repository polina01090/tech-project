<?php

namespace app\entity;

use Cassandra\Date;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property  string $name
 */

class Condition extends ActiveRecord
{
    public static function tableName()
    {
        return 'condition';
    }

}