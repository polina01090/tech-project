<?php


namespace app\controllers;
use app\entity\Staff;
use app\models\EditStaffForm;
use app\repository\StaffRepository;
use Yii;
use yii\data\ActiveDataProvider;
use \yii\web\Controller;


class StaffController extends Controller
{
    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => Staff::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider'=>$dataProvider
        ]);
    }
    public function actionEdit($id){
        $color = StaffRepository::getStaff($id);
        $model = new EditStaffForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            StaffRepository::editStaff($id,  $model->name);
            $this->redirect('list');
        }
        $model->name = $color->name;
        return $this->render('edit', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id){
        StaffRepository::deleteStaff($id);
        return $this->redirect('list');

    }
    public function actionAdd(){
        $model = new EditStaffForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            StaffRepository::addStaff($model->name);
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

}