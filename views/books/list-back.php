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
        'user_staff',
        'out_id',
        'date',
        'condition',
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