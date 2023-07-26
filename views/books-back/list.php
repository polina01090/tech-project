<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;
use yii\i18n\Formatter;

/** @var $books_back */
/** @var $users_staffs */
/** @var $conditions */
$formatter = new Formatter();
?>
<table class="table_books">
    <thead>
    <tr>
        <th>id</th>
        <th>Сотрудник</th>
        <th>ID выдачи</th>
        <th>Дата сдачи книги</th>
        <th>Состояние книги</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books_back as $row):?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $users_staffs[$row['user_staff_id']]; ?></td>
            <td><?php echo $row['out_id']; ?></td>
            <td><?php echo $formatter->asDate($row['date'], 'php:d.m.Y'); ?></td>
            <td><?php echo $conditions[$row['condition_id']]; ?></td>
            <td><a href="/books-back/edit?id=<?=$row['id']?>"><img class="edit" src="/images/edit.png" alt=""></a></td>
            <td><a href="/books-back/delete?id=<?=$row['id']?>"><img class="delete" src="/images/delete.png" alt=""></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
