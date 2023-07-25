<?php


namespace app\repository;


use app\entity\Staff;

class StaffRepository
{
    public static function getStaff($id){
        return Staff::find()->where(['id' => $id])->one();
    }
    public static function getStaffs(){
        return Staff::find()->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getStaffsAsArray(){
        return Staff::find()->orderBy(['id' => SORT_ASC])->all();
    }
    public static function addStaff($name){
        $staff = new Staff();
        $staff->name = $name;
        $staff->save();
    }

    public static function deleteStaff($id){
        Staff::deleteAll(['id' => $id]);
    }

    public static function editStaff($id, $name){
        $color = Staff::find()->where(['id' => $id])->one();
        $color->name = $name;
        $color->save();
    }

}