<?php


namespace app\repository;


use app\entity\UserClient;

class UserClientRepository
{
    public static function getUser($id){
        return UserClient::find()->where(['id' => $id])->one();
    }
    public static function getUsers(){
        return UserClient::find()->all();
    }
    public static function addUser($fio, $seriesNumber){
        $user = new UserClient();
        $user->fio = $fio;
        $user->seriesNumbers = $seriesNumber;
        $user->save();
    }

    public static function deleteUser($id){
        UserClient::deleteAll(['id' => $id]);
    }

    public static function editUser($id, $fio, $seriesNumber){
        $user = UserClient::find()->where(['id' => $id])->one();
        $user->fio = $fio;
        $user->seriesNumbers = $seriesNumber;
        $user->save();
    }

}