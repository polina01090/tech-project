<?php


namespace app\controllers;
use app\entity\Condition;
use app\models\EditConditionForm;
use app\repository\ConditionRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \yii\web\Controller;


class ConditionController extends Controller
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
                    ],
                ],
            ],
        ];
    }
    public function actionList(){
        $conditions = ConditionRepository::getConditionsAsArray([]);
        return $this->render('list', [
            'conditions'=>$conditions
        ]);
    }
    public function actionEdit($id){
        $condition = ConditionRepository::getCondition($id);
        $model = new EditConditionForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            ConditionRepository::editCondition($id,  $model->name);
            $this->redirect('list');
        }
        $model->name = $condition->name;
        return $this->render('edit', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id){
        ConditionRepository::deleteCondition($id);
        return $this->redirect('list');

    }
    public function actionAdd(){
        $model = new EditConditionForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            ConditionRepository::addCondition($model->name);
            $this->redirect('list');
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

}