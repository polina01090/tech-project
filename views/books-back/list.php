<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;

/** @var $books_back */
/** @var $users_staffs */
/** @var $conditions */
?>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Сотрудник</th>
        <th>ID выдачи</th>
        <th>Дата Выдачи</th>
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
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $conditions[$row['condition_id']]; ?></td>
            <td><a href="edit?id=<?=$row['id']?>"><img src="../../web/images/edit.png" alt="" style="width: 30px; height: 30px"></a></td>
            <td><a href="delete?id=<?=$row['id']?>">удалить</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
