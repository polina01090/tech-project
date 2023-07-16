<?php

namespace app\entity;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property  string $fio
 * @property  int $staff_id
 */

class UserStaff extends ActiveRecord
{
    public static function tableName()
    {
        return 'users_staff';
    }

}