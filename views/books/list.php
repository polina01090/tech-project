<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;

/** @var $books */
?>
<a href="add">Добавить книгу</a>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Имя</th>
        <th>Артикул</th>
        <th>Дата поступления</th>
        <th>Автор</th>
        <th>Количество</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['article']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['count']; ?></td>
            <td><a href="edit?id=<?=$row['id']?>"><img src="../../web/images/edit.png" alt="" style="width: 30px; height: 30px"></a></td>
            <td><a href="delete?id=<?=$row['id']?>">удалить</a></td>
            <td><a href="/books-out/add?id=<?=$row['id']?>">Выдать</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
