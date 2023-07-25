<?php
/** @var $users */

?>
<table class="table_books">
    <thead>
    <tr>
        <th>id</th>
        <th>Фио</th>
        <th>Серия и номер паспорта</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fio']; ?></td>
            <td><?php echo $row['seriesNumbers']; ?></td>
            <td><a href="edit?id=<?= $row['id'] ?>"><img class="edit" src="/images/edit.png" alt=""></a></td>
            <td><a href="delete?id=<?= $row['id'] ?>"><img class="delete" src="/images/delete.png" alt=""></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

