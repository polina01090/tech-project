<?php


namespace app\controllers;
use app\entity\UserStaff;
use app\models\EditUserStaffForm;
use app\repository\UserStaffRepository;
use app\repository\StaffRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \yii\web\Controller;


class UserStaffController extends Controller
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
    public function actionList(){
        $users = UserStaffRepository::getUsersAsArray();
        $staffs = StaffRepository::getStaffs();
        $staffsArray = [];
        foreach ($staffs as $staff){
            $staffsArray[$staff->id] = $staff->name;
        }
        return $this->render('list', [
            'users'=>$users,
            'staffs' => $staffsArray
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