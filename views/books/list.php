<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use \app\entity\Books;
use yii\helpers\Html;
use yii\i18n\Formatter;

$formatter = new Formatter();
/** @var $books */
?>
<?php if (!Yii::$app->user->isGuest): ?>
<?php endif; ?>
<table class="table_books">
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
            <td><?php echo $formatter->asDate($row['date'], 'php:d.m.Y'); ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['count']; ?></td>
            <?php if (!Yii::$app->user->isGuest): ?>
                <td><a href="/books/edit?id=<?= $row['id'] ?>"><img class="edit" src="/images/edit.png" alt=""></a></td>
                <td><a href="/books/delete?id=<?= $row['id'] ?>"><img class="delete" src="/images/delete.png"
                                                                      alt=""></a></td>
                <td><?php if ($row['count'] > 0): ?><a href="/books-out/add?id=<?= $row['id'] ?>">Выдать</a><?php endif; ?></td>


            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>