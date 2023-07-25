<?php


namespace app\repository;


use app\entity\Books;
use app\entity\BooksBack;
class BookBackRepository
{
    public static function getBookBack($id){
        return BooksBack::find()->where(['id' => $id])->one();
    }
    public static function getBookBackAsArray($param){
        return BooksBack::find()->orderBy(['id' => SORT_ASC])->where($param)->asArray()->one();
    }
    public static function getBooksBack(){
        return BooksBack::find()->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getBooksBackAsArray(){
        return BooksBack::find()->orderBy(['id' => SORT_ASC])->asArray()->all();
    }
    public static function addBookBack($user_staff_id, $out_id, $date, $condition_id){
        $book = new BooksBack();
        $book->user_staff_id = $user_staff_id;
        $book->out_id = $out_id;
        $book->date = $date;
        $book->condition_id = $condition_id;
        $book->save();
    }
    public static function editBookBack($id, $user_staff_id, $date, $condition_id){
        $book = BooksBack::find()->where(['id' => $id])->one();
        $book->user_staff_id = $user_staff_id;
        $book->date = $date;
        $book->condition_id = $condition_id;
        $book->save();
    }

    public static function deleteBookBack($id){
        BooksBack::deleteAll(['id' => $id]);
    }

}