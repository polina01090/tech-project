<?php


namespace app\controllers;

use app\entity\UserClient;
use app\models\EditUserClientForm;
use app\repository\BookBackRepository;
use app\repository\BookOutRepository;
use app\repository\BookRepository;
use app\repository\UserClientRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \yii\web\Controller;


class UserClientController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['add', 'edit', 'list', 'delete', 'search'],
                'rules' => [
                    [
                        'actions' => ['add', 'edit', 'list', 'delete', 'search'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionSearch()
    {
        $request = Yii::$app->request;
        $radio = $request->get('book');
        $name = $request->get('name');
        $counts = BookOutRepository::getBooksOutAsArray([]);
        $result_client = [];
        $result_books = [];
        $books = BookRepository::getBooks();
        $booksArray = [];
        foreach ($books as $book){$booksArray[$book->id] = $book->name;}
        $backs = BookBackRepository::getBooksBack();
        $backsArray = [];
        foreach ($backs as $back){$backsArray[$back->out_id] = $back->date;}
        $clientsArr = [];
        $clients = [];
        $users = UserClientRepository::getUsers();
        if ($name !== null) {
            $users = UserClientRepository::getUsersAsWhere(['like', 'fio', $name]);
            $clients = UserClientRepository::getUsersAsArray(['like', 'fio', $name]);
        }
        foreach ($users as $user){$clientsArr[$user->id] = $user->fio;}
        if ($radio === 'yes') {
            foreach ($counts as $id) {
                if ((array_search($id['user_client_id'], array_column($clients, 'id'))) !== false) {
                    $result_client[] = UserClientRepository::getUserAsArray($id['user_client_id']);
                    $result_books[] = BookOutRepository::getBookOutAsArray(['id' => $id['id']]);
                }
            }
        } elseif ($radio === 'no') {
            foreach ($clients as $id) {
                if ((array_search($id['id'], array_column($counts, 'user_client_id'))) === false) {
                    $result_client[] = UserClientRepository::getUserAsArray($id['id']);
                }
            }
        } else{
            $result_client = $clients;
        }


        return $this->render('search', [
            'clients' => $result_client,
            'books' => $result_books,
            'users_clients' => $clientsArr,
            'books_name' => $booksArray,
            'backs' => $backsArray
        ]);
    }


    public function actionList()
    {
        $books = BookRepository::getBooks();
        $booksArray = [];
        foreach ($books as $book){
            $booksArray[$book->id] = $book->name;
        }
        $users = UserClientRepository::getUsersAsArray([]);
        return $this->render('list', [
            'users'=>$users,
            'books' => $booksArray
        ]);

    }

    public function actionEdit($id)
    {
        $user = UserClientRepository::getUser($id);
        $model = new EditUserClientForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            UserClientRepository::editUser($id, $model->fio, $model->seriesNumbers);
            $this->redirect('list');
        }
        $model->fio = $user->fio;
        $model->seriesNumbers = $user->seriesNumbers;
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        UserClientRepository::deleteUser($id);
        return $this->redirect('list');

    }

    public function actionAdd()
    {
        $model = new EditUserClientForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            UserClientRepository::addUser($model->fio, $model->seriesNumbers);
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

}