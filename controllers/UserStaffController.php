<?php


namespace app\controllers;
use app\entity\UserStaff;
use app\models\EditUserStaffForm;
use app\repository\UserStaffRepository;
use app\repository\StaffRepository;
use Yii;
use yii\data\ActiveDataProvider;
use \yii\web\Controller;


class UserStaffController extends Controller
{
    public function actionList(){
        $dataProvider = new ActiveDataProvider([
            'query' => UserStaff::find()
                ->select(['users_staff.id','users_staff.fio', 'staff.name as staff'])
                ->LeftJoin('staff', 'users_staff.staff_id = staff.id')
                ->asArray(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider'=>$dataProvider
        ]);
    }
    public function actionEdit($id){
        $staffs = StaffRepository::getStaffs();
        $staffsArray = [];
        foreach ($staffs as $staff){
            $staffsArray[$staff->id] = $staff->name;
        }
        $user = UserStaffRepository::getUser($id);
        $model = new EditUserStaffForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            UserStaffRepository::editUser($id,  $model->fio, $model->staff_id);
            $this->redirect('list');
        }
        $model->fio = $user->fio;
        $model->staff_id = $user->staff_id;
        return $this->render('edit', [
            'model' => $model,
            'staffs' => $staffsArray
        ]);
    }
    public function actionDelete($id){
        UserStaffRepository::deleteUser($id);
        return $this->redirect('list');

    }
    public function actionAdd(){
        $staffs = StaffRepository::getStaffs();
        $staffsArray = [];
        foreach ($staffs as $staff){
            $staffsArray[$staff->id] = $staff->name;
        }
        $model = new EditUserStaffForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            UserStaffRepository::addUser($model->fio, $model->staff_id);

            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
            'staffs' => $staffsArray
        ]);
    }

}