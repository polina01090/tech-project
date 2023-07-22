<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;

/** @var $books_out */
/** @var $book_back_id */
/** @var $books_art */
/** @var $users_staff */
/** @var $users_client */
var_dump($book_back_id);
?>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Артикул товара</th>
        <th>Сотрудник</th>
        <th>Клиент</th>
        <th>Дата</th>
        <th>Срок</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books_out as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $books_art[$row['book_id']]; ?></td>
            <td><?php echo $users_staff[$row['user_staff_id']]; ?></td>
            <td><?php echo $users_client[$row['user_client_id']]; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['date_deadline']; ?></td>
            <td><a href="edit?id=<?= $row['id'] ?>"><img src="../../web/images/edit.png" alt="" style="width: 30px; height: 30px"></a></td>
            <td><a href="delete?id=<?= $row['id'] ?>">удалить</a></td>
            <?php if (!in_array($row['id'], $book_back_id)): ?>
                <td><a href="/books-back/add?id=<?= $row['id'] ?>">Возрат</a></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
