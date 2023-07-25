<?php


namespace app\repository;


use app\entity\UserClient;

class UserClientRepository
{
    public static function getUser($id){
        return UserClient::find()->where(['id' => $id])->one();
    }
    public static function getUserAsArray($id){
        return UserClient::find()->where(['id' => $id])->asArray()->one();
    }
    public static function getUsers(){
        return UserClient::find()->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getUsersAsWhere($param){
        return UserClient::find()->orderBy(['id' => SORT_ASC])->where($param)->all();
    }
    public static function getUsersAsArray($param){
        return UserClient::find()->orderBy(['id' => SORT_ASC])->where($param)->asArray()->all();
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