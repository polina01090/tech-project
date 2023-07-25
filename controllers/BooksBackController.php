<?php


namespace app\controllers;
use app\entity\Books;
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


class BooksBackController extends Controller
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
                    ], [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }
    public function actionEdit($id){
        $book = BookBackRepository::getBookBack($id);
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
            BookBackRepository::editBookBack($id,  $model->user_staff_id, $model->date, $model->condition_id);
            $this->redirect('list');
        }
        $model->user_staff_id = $book->user_staff_id;
        $model->date = $book->date;
        $model->condition_id = $book->condition_id;
        return $this->render('edit', [
            'model' => $model,
            'conditions' => $conditionsArray,
            'users_staffs' => $userStaffArray,
        ]);
    }
    public function actionDelete($id){
        BookBackRepository::deleteBookBack($id);
        return $this->redirect('list');

    }

    public function actionList(){
        $users_staffs = UserStaffRepository::getUsers();
        $conditions = ConditionRepository::getConditions();
        $books_back = BookBackRepository::getBooksBackAsArray();
        $userStaffArray = [];
        foreach ($users_staffs as $user_staff){
            $userStaffArray[$user_staff->id] = $user_staff->fio;
        }
        $conditionsArray = [];
        foreach ($conditions as $condition){
            $conditionsArray[$condition->id] = $condition->name;
        }

        return $this->render('list', [
            'books_back'=>$books_back,
            'conditions' => $conditionsArray,
            'users_staffs' => $userStaffArray,
        ]);
    }
    public function actionAdd($id){
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
        $book_id = BookOutRepository::getBookOut($id)->book_id;
        $model = new AddBookBackForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            BookBackRepository::addBookBack($model->user_staff_id, $id, $model->date, $model->condition_id);
            BookRepository::CountPlus($book_id);
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
            'users_staffs' => $userStaffArray,
            'conditions' => $conditionsArray

        ]);
    }

}