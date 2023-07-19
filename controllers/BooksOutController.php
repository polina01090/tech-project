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
use \yii\web\Controller;


class BooksOutController extends Controller
{
    public function actionList(){
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
        return $this->render('list', [
            'dataProvider'=>$dataProvider
        ]);
    }
    public function actionListBack(){
        $dataProvider = new ActiveDataProvider([
            'query' => BooksBack::find()
                ->select(['back_books.id','users_staff.fio as user_staff','back_books.out_id', 'back_books.date', 'condition.name as condition'])
                ->LeftJoin('users_staff', 'back_books.user_staff_id = users_staff.id')
                ->LeftJoin('condition', 'back_books.condition_id = condition.id')
                ->asArray(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider'=>$dataProvider
        ]);
    }
    public function actionBack($id){
        $users_staffs = UserStaffRepository::getUsers();
        $userStaffArray = [];
        foreach ($users_staffs as $user_staff){
            $userStaffArray[$user_staff->id] = $user_staff->fio;
        }
        $conditions = ConditionRepository::getConditions();
        $conditionsArray = [];
        foreach ($conditions as $condition){
            $conditionsArray[$condition->id] = $condition->name;
        }
        $model = new AddBookBackForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            BookBackRepository::addBookBack($model->user_staff_id, $id, $model->date, $model->condition_id);
            $this->redirect('list-back');
        }
        return $this->render('back', [
            'model' => $model,
            'users_staffs' => $userStaffArray,
            'condition' => $conditionsArray

        ]);
    }


    public function actionAdd(){
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
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
            'books' => $booksArray,
            'users_staffs' => $userStaffArray,
            'users_client' => $userClientArray,
        ]);
    }

}