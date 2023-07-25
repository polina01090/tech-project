<?php

/** @var yii\web\View $this */

/** @var $clients */
/** @var $books */
/** @var $users_clients */
/** @var $books_name */

/** @var $backs */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form class="center" id="user_search" action="search" method="get" name="search_book">
    <label class="search">имя клиента<input name="name" type="text"></label>
    <label class="search">без книг<input name="book" type="radio" value="no"></label>
    <label class="search">с книгами<input name="book" type="radio" value="yes"></label>
    <input type="reset" value="Очистить">
    <input type="submit" value="поиск">
</form>
<?php if (!empty($books)): ?>
    <table class="table_books">
        <thead>
        <tr>
            <th>id</th>
            <th>Фио</th>
            <th>Книга</th>
            <th>Дата выдачи книги</th>
            <th>Дата сдачи книги</th>
        </tr>

        </thead>
        <tbody>
        <?php foreach ($books as $index => $book): ?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $users_clients[$book['user_client_id']]; ?></td>
                <td><a href="/books/book?id=<?=$book['book_id']?>"><?php echo $books_name[$book['book_id']]; ?></a></td>
                <td><?php echo $book['date']; ?></td>
                <?php if ($book['id'] === key($backs)): ?>
                    <td><?php echo $book['date']; ?></td>
                <?php else: ?>
                    <td>не сдано</td>
                <?php endif ?>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php if (empty($books) and !empty($clients)): ?>
    <table class="table_books">
        <thead>
        <tr>
            <th>id</th>
            <th>Фио</th>
        </tr>

        </thead>
        <tbody>
        <?php foreach ($clients as $index => $client): ?>
            <tr>
                <td><?php echo $client['id']; ?></td>
                <td><?php echo $users_clients[$client['id']]; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>
