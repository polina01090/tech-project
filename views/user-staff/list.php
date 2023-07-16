<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Staff;
use yii\helpers\Html;

echo HTML::a('Добавить сотрудника', ['user-staff/add']);
/** @var ActiveDataProvider $dataProvider */
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'fio',
        'staff',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{edit} {delete}',
            'buttons' => [
                'edit' => function ($url, $model, $key) {
                    return HTML::a('редактировать', [
                        'edit',
                        'id' => $key
                    ]);
                },
                'delete' => function ($url, $model, $key) {
                    return HTML::a('удалить', [
                        'delete',
                        'id' => $key
                    ]);
                }
            ]
        ],

    ],
]);