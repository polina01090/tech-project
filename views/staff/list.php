<?php
/** @var $staffs */
?>
<table class="table_books">
    <thead>
    <tr>
        <th>id</th>
        <th>Название</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($staffs as $row):?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><a href="edit?id=<?=$row['id']?>"><img class="edit" src="/images/edit.png" alt=""></a></td>
            <td><a href="delete?id=<?=$row['id']?>"><img class="delete" src="/images/delete.png" alt=""></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

