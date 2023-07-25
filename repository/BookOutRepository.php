<?php


namespace app\repository;


use app\entity\Books;
use app\entity\BooksOut;

class BookOutRepository
{
    public static function getBookOut($id){
        return BooksOut::find()->where(['id' => $id])->one();
    }
    public static function getBooksOut(){
        return BooksOut::find()->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getBooksOutAsArray($count){
        return BooksOut::find()->orderBy(['id' => SORT_ASC])->where($count)->asArray()->all();
    }
    public static function getBookOutAsArray($count){
        return BooksOut::find()->orderBy(['id' => SORT_ASC])->where($count)->asArray()->one();
    }
    public static function addBookOut($book_id, $user_staff_id, $user_client_id, $date, $date_deadline){
        $book = new BooksOut();

        $book->book_id = $book_id;
        $book->user_staff_id = $user_staff_id;
        $book->user_client_id = $user_client_id;
        $book->date = $date;
        $book->date_deadline = $date_deadline;
        $book->save();
    }

    public static function deleteBookOut($id){
        BooksOut::deleteAll(['id' => $id]);
    }

    public static function editBookOut($id, $user_staff_id, $user_client_id, $date, $date_deadline){
        $book = BooksOut::find()->where(['id' => $id])->one();
        $book->user_staff_id = $user_staff_id;
        $book->user_client_id = $user_client_id;
        $book->date = $date;
        $book->date_deadline = $date_deadline;
        $book->save();
    }

}