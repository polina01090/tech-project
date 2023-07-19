<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;

echo HTML::a('Выдать книгу', ['books-out/add']);
/** @var ActiveDataProvider $dataProvider */
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'book',
        'user_staff',
        'user_client',
        'date',
        'date_deadline',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{back} {edit}',
            'buttons' => [
                'back' => function ($url, $model, $key) {
                    return HTML::a('возрат', [
                        'back',
                        'id' => $key
                    ]);
                },
                'edit' => function ($url, $model, $key) {
                    return HTML::a('редактировать ', [
                        'back',
                        'id' => $key
                    ]);
                },
            ]
        ],

    ],
]);