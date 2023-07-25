<?php


namespace app\repository;


use app\entity\Books;
use yii\i18n\Formatter;

class BookRepository
{
    public static function getBook($id){
        return Books::find()->where(['id' => $id])->one();
    }
    public static function getBooks(){
        return Books::find()->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getBooksAsArray(){
        return Books::find()->orderBy(['id' => SORT_ASC])->asArray()->all();
    }
    public static function getBookAsArray($id){
        return Books::find()->orderBy(['id' => SORT_ASC])->where(['id' => $id])->asArray()->one();
    }
    public static function getBooksCountAsArray($param, $name){
        return Books::find()->orderBy(['id' => SORT_ASC])->where($param)->andWhere(['like', 'name', $name])->asArray()->all();
    }
    public static function CountMinus($id){
        $book = Books::find()->where(['id' => $id])->one();
        $book->count -= 1;
        $book->save();
    }
    public static function CountPlus($id){
        $book = Books::find()->where(['id' => $id])->one();
        $book->count += 1;
        $book->save();
    }
    public static function addBook($name, $article, $date, $author, $count){
        $book = new Books();
        $book->name = $name;
        $book->article = $article;
        $book->date = $date;
        $book->author = $author;
        $book->count = $count;
        $book->save();
    }

    public static function deleteBook($id){
        Books::deleteAll(['id' => $id]);
    }

    public static function editBook($id,$name, $article, $date, $author, $count){
        $book = Books::find()->where(['id' => $id])->one();
        $book->name = $name;
        $book->article = $article;
        $book->date = $date;
        $book->author = $author;
        $book->count = $count;
        $book->save();
    }

}