<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;

echo HTML::a('Выдать книгу', ['books/out']);
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
            'template' => '{edit}',
            'buttons' => [
                'edit' => function ($url, $model, $key) {
                    return HTML::a('возрат', [
                        'back',
                        'id' => $key
                    ]);
                },
            ]
        ],

    ],
]);