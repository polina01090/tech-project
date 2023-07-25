<?php


namespace app\repository;


use app\entity\Condition;

class ConditionRepository
{
    public static function getCondition($id){
        return Condition::find()->where(['id' => $id])->one();
    }
    public static function getConditions(){
        return Condition::find()->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getConditionsAsArray(){
        return Condition::find()->orderBy(['id' => SORT_ASC])->asArray()->all();
    }
    public static function addCondition($name){
        $staff = new Condition();
        $staff->name = $name;
        $staff->save();
    }

    public static function deleteCondition($id){
        Condition::deleteAll(['id' => $id]);
    }

    public static function editCondition($id, $name){
        $color = Condition::find()->where(['id' => $id])->one();
        $color->name = $name;
        $color->save();
    }

}