<?php


namespace app\controllers;

use app\entity\BooksBack;
use app\entity\BooksOut;
use app\models\AddBookBackForm;
use app\models\AddBookOutForm;
use app\models\EditBookForm;
use app\repository\BookBackRepository;
use app\repository\BookOutRepository;
use app\repository\BookRepository;
use app\repository\ConditionRepository;
use app\repository\UserClientRepository;
use app\repository\UserStaffRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \yii\web\Controller;


class BooksOutController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['add', 'edit', 'list', 'delete'],
                'rules' => [
                    [
                        'actions' => ['add', 'edit', 'list', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }
    public function actionList(){
        $books_out = BookOutRepository::getBooksOutAsArray([]);
        $books_back_id = BookBackRepository::getBooksBack();
        $books_backArr = [];
        foreach ($books_back_id as $book_back_id){
            $books_backArr[$book_back_id->id] = $book_back_id->out_id;
        }
        $books_art = BookRepository::getBooks();
        $books_artArray = [];
        foreach ($books_art as $book_art){
            $books_artArray[$book_art->id] = $book_art->article;
        }
        $users_staffs = UserStaffRepository::getUsers();
        $userStaffArray = [];
        foreach ($users_staffs as $user_staff){
            $userStaffArray[$user_staff->id] = $user_staff->fio;
        }
        $users_clients = UserClientRepository::getUsers();
        $userClientArray = [];
        foreach ($users_clients as $users_client){
            $userClientArray[$users_client->id] = $users_client->fio;
        }
        return $this->render('list', [
            'books_out'=>$books_out,
            'books_art' => $books_artArray,
            'users_staff' => $userStaffArray,
            'users_client' => $userClientArray,
            'book_back_id' => $books_backArr,
        ]);
    }
    public function actionEdit($id){
        $users_staffs = UserStaffRepository::getUsers();
        $userStaffArray = [];
        foreach ($users_staffs as $user_staff){
            $userStaffArray[$user_staff->id] = $user_staff->fio;
        }
        $users_client = UserClientRepository::getUsers();
        $userClientArray = [];
        foreach ($users_client as $user_client){
            $userClientArray[$user_client->id] = $user_client->fio;
        }
        $book = BookOutRepository::getBookOut($id);
        $model = new AddBookOutForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            BookOutRepository::editBookOut($id, $model->user_staff_id, $model->user_client_id, $model->date, $model->date_deadline);
            $this->redirect('list');
        }
        $model->user_staff_id = $book->user_staff_id;
        $model->user_client_id = $book->user_client_id;
        $model->date = $book->date;
        $model->date_deadline = $book->date_deadline;
        return $this->render('edit', [
            'model' => $model,
            'users_staffs' => $userStaffArray,
            'users_client' => $userClientArray,
        ]);
    }
    public function actionDelete($id){
        BookOutRepository::deleteBookOut($id);
        return $this->redirect('list');

    }



    public function actionAdd($id){
        $users_staffs = UserStaffRepository::getUsers();
        $userStaffArray = [];
        foreach ($users_staffs as $user_staff){
            $userStaffArray[$user_staff->id] = $user_staff->fio;
        }
        $users_client = UserClientRepository::getUsers();
        $userClientArray = [];
        foreach ($users_client as $user_client){
            $userClientArray[$user_client->id] = $user_client->fio;
        }
        $model = new AddBookOutForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            BookOutRepository::addBookOut($id, $model->user_staff_id, $model->user_client_id, $model->date, $model->date_deadline);
            BookRepository::CountMinus($id);
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
            'users_staffs' => $userStaffArray,
            'users_client' => $userClientArray,
        ]);
    }

}