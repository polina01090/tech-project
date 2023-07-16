<?php


namespace app\controllers;
use app\entity\UserClient;
use app\models\EditUserClientForm;
use app\repository\UserClientRepository;
use Yii;
use yii\data\ActiveDataProvider;
use \yii\web\Controller;


class UserClientController extends Controller
{
    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => UserClient::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider'=>$dataProvider
        ]);
    }
    public function actionEdit($id){
        $user = UserClientRepository::getUser($id);
        $model = new EditUserClientForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            UserClientRepository::editUser($id,  $model->fio, $model->seriesNumbers);
            $this->redirect('list');
        }
        $model->fio = $user->fio;
        $model->seriesNumbers = $user->seriesNumbers;
        return $this->render('edit', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id){
        UserClientRepository::deleteUser($id);
        return $this->redirect('list');

    }
    public function actionAdd(){
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