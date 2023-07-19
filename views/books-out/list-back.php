<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;
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
                    return HTML::a('редактировать ', [
                        'back',
                        'id' => $key
                    ]);
                },
            ]
        ],

    ],
]);