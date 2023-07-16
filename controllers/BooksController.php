<?php


namespace app\controllers;
use app\entity\Books;
use app\entity\BooksOut;
use app\models\AddBookOutForm;
use app\models\EditBookForm;
use app\repository\BookOutRepository;
use app\repository\BookRepository;
use app\repository\UserClientRepository;
use app\repository\UserStaffRepository;
use Yii;
use yii\data\ActiveDataProvider;
use \yii\web\Controller;


class BooksController extends Controller
{
    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => Books::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider'=>$dataProvider
        ]);
    }
    public function actionListOut(){
        $dataProvider = new ActiveDataProvider([
            'query' => BooksOut::find()
                ->select(['out_books.id','books.name as book','users_staff.fio as user_staff', 'users_client.fio as user_client', 'out_books.date', 'out_books.date_deadline'])
                ->LeftJoin('books', 'out_books.book_id = books.id')
                ->LeftJoin('users_staff', 'out_books.user_staff_id = users_staff.id')
                ->LeftJoin('users_client', 'out_books.user_client_id = users_client.id')
                ->asArray(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list-out', [
            'dataProvider'=>$dataProvider
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
    public function actionOut(){
        $books = BookRepository::getBooks();
        $booksArray = [];
        foreach ($books as $book){
            if ($book->count > 0){
                $booksArray[$book->id] = $book->name;
            }

        }
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
            BookOutRepository::addBookOut($model->book_id, $model->user_staff_id, $model->user_client_id, $model->date, $model->date_deadline);
            BookRepository::CountMinus($model->book_id);
            $this->redirect('list-out');
        }
        return $this->render('out', [
            'model' => $model,
            'books' => $booksArray,
            'users_staffs' => $userStaffArray,
            'users_client' => $userClientArray,
        ]);
    }

}