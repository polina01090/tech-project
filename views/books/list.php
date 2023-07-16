<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;

echo HTML::a('Добавить книгу', ['books/add']);
/** @var ActiveDataProvider $dataProvider */
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'article',
        'date',
        'author',
        'count',
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