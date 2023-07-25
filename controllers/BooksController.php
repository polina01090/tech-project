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
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \yii\web\Controller;


class BooksController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['add', 'edit', 'list', 'delete','search'],
                'rules' => [
                    [
                        'actions' => ['add', 'edit', 'delete', 'list', 'search'],
                        'allow' => true,
                        'roles' => ['@'],
                    ], [
                        'actions' => ['list'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }
    public function actionList(){
        $books = BookRepository::getBooksAsArray();
        return $this->render('list', [
            'books'=>$books
        ]);

    }
    public function actionBook($id){
        $book = BookRepository::getBookAsArray($id);
        return $this->render('book', [
            'book'=>$book
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
    public function actionSearch()
    {
        $request = Yii::$app->request;
        $count = $request->get('count');
        $name = $request->get('name');
        if ($name !== null){
            $counts = BookRepository::getBooksCountAsArray(['>=', 'count', 0], $name);
            if ($count === 'yes'){
                $counts = BookRepository::getBooksCountAsArray(['>', 'count', 0], $name);
            } elseif ($count === 'no'){
                $counts = BookRepository::getBooksCountAsArray(['=', 'count', 0], $name);
            }
        }


        return $this->render('search', [
            'counts' => $counts
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