<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;
use yii\i18n\Formatter;

/** @var $book */
$formatter = new Formatter();
?>
<h1 style="color: white">Информация о книге</h1>
<div class="text_info"><href class="head_info">ID:</href><?=$book['id']?></div>
<div class="text_info"><href class="head_info">Название:</href><?=$book['name']?></div>
<div class="text_info"><href class="head_info">Артикул:</href><?=$book['article']?></div>
<div class="text_info"><href class="head_info">Автор:</href><?=$book['author']?></div>
<div class="text_info"><href class="head_info">Дата поступления:</href><?=$formatter->asDate($book['date'], 'php:d.m.Y'); ?></div>
<div class="text_info"><href class="head_info">Количество:</href><?=$book['count']?></div>