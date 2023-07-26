<?php

/** @var yii\web\View $this */

/** @var $counts */

$formatter = new Formatter();
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\i18n\Formatter;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form class="center" action="search" method="get" name="search_book">
    <label>имя книги<input name="name" type="text"></label>
    <label>в наличии<input name="count" type="radio" value="yes"></label>
    <label>нет в наличии<input name="count" type="radio" value="no"></label>
    <input type="submit" value="поиск">
    <input type="reset" value="очистить">
</form>
<?php if (!empty($counts)): ?>
    <table class="table_books">
        <thead>
        <tr>
            <th>id</th>
            <th>Имя</th>
            <th>Артикул</th>
            <th>Дата поступления</th>
            <th>Автор</th>
            <th>Количество</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($counts as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['article']; ?></td>
                <td><?php echo $formatter->asDate($row['date'], 'php:d.m.Y'); ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['count']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>
