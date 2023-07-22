<?php


namespace app\controllers;
use app\entity\Books;
use app\entity\BooksOut;
use app\models\AddBookOutForm;
use app\models\EditBookForm;
use app\models\SearchBookForm;
use app\repository\BookOutRepository;
use app\repository\BookRepository;
use app\repository\BooksSearchRepository;
use app\repository\UserClientRepository;
use app\repository\UserStaffRepository;
use Yii;
use yii\data\ActiveDataProvider;
use \yii\web\Controller;


class BooksController extends Controller
{
    public function actionList(){
        $books = BookRepository::getBooksAsArray();
        return $this->render('list', [
            'books'=>$books
        ]);

    }
    public function actionEdit($id){
        $book = BookRepository::getBook($id);
        $model = new EditBookForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            BookRepository::editBook($id,  $model->name, $model->article, $model->date, $model->author, $model->count);
            $this->redirect('list');
        }
        $model->name = $book->name;
        $model->article = $book->article;
        $model->date = $book->date;
        $model->author = $book->author;
        $model->count = $book->count;
        return $this->render('edit', [
            'model' => $model,
        ]);
    }
    public function actionSearch(){
        $data = json_decode(file_get_contents('php://input'), true);
        $name = $data['name'];
        var_dump($data);


        echo json_encode([
            "res" => $name
        ]);

        return $this->render('search', [
            'data' => $data
        ]);
    }
    public function actionDelete($id){
        BookRepository::deleteBook($id);
        return $this->redirect('list');

    }
    public function actionAdd(){
        $model = new EditBookForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            BookRepository::addBook($model->name, $model->article, $model->date, $model->author, $model->count);
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

}