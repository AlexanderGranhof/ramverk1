<?php
    // $books comes from the controller
    $res = $books
?>
<nav>
    <a href="book/create">Create</a>
    <a href="book/delete">Delete</a>
</nav>
<br>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Author</th>
    </tr>
    <tbody>
        <?php foreach ($res as $row): ?>
            <tr>
                <td>
                    <?= $row->id ?>
                </td>
                <td>
                    <?= $row->title ?>
                </td>
                <td>
                    <?= $row->author ?>
                </td>
                <td>
                    <img style="max-height: 100px" src="<?= $row->img ?>" alt="book-cover">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>