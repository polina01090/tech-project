<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;
use yii\i18n\Formatter;

/** @var $books_out */
/** @var $book_back_id */
/** @var $books_art */
/** @var $users_staff */
/** @var $users_client */
$formatter = new Formatter();

?>
<table class="table_books">
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
            <td><a href="/books/book?id=<?=$row['book_id']?>"><?php echo $books_art[$row['book_id']]; ?></a></td>
            <td><?php echo $users_staff[$row['user_staff_id']]; ?></td>
            <td><?php echo $users_client[$row['user_client_id']]; ?></td>
            <td><?php echo $formatter->asDate($row['date'], 'php:d.m.Y'); ?></td>
            <td><?php echo $formatter->asDate($row['date_deadline'], 'php:d.m.Y'); ?></td>
            <td><a href="edit?id=<?= $row['id'] ?>"><img class="edit" src="/images/edit.png" alt=""></a></td>
            <td><a href="delete?id=<?= $row['id'] ?>"><img class="delete" src="/images/delete.png" alt=""></a></td>
            <td><?php if (!in_array($row['id'], $book_back_id)): ?><a href="/books-back/add?id=<?= $row['id'] ?>">Возрат</a><?php endif; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
