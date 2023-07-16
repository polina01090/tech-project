<?php

namespace app\entity;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property  string $fio
 * @property  int $seriesNumbers
 */

class UserClient extends ActiveRecord
{
    public static function tableName()
    {
        return 'users_client';
    }

}