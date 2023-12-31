<?php


namespace app\repository;


use app\entity\UserStaff;

class UserStaffRepository
{
    public static function getUser($id){
        return UserStaff::find()->where(['id' => $id])->one();
    }
    public static function getUsers(){
        return UserStaff::find()->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getUsersAsArray(){
        return UserStaff::find()->orderBy(['id' => SORT_ASC])->asArray()->all();
    }
    public static function addUser($fio, $staff_id){
        $user = new UserStaff();
        $user->fio = $fio;
        $user->staff_id = $staff_id;
        $user->save();
    }

    public static function deleteUser($id){
        UserStaff::deleteAll(['id' => $id]);
    }

    public static function editUser($id, $fio, $staff_id){
        $user = UserStaff::find()->where(['id' => $id])->one();
        $user->fio = $fio;
        $user->staff_id = $staff_id;
        $user->save();
    }

}