<?php
    // $books comes from the controller
    $res = $books;
?>
<nav>
    <a href="create">Create</a>
    <a href="delete">Delete</a>
    <a href="update">Update</a>
</nav>
<br>

<?php if($id && $single): ?>
    <form action="" method="POST">
        <div>
            <label style="display: block" for="title">Name</label>
            <input style="margin-bottom: 20px" type="text" name="title" id="title" value="<?= $single->title ?>">
        </div>
        <div>
            <label style="display: block" for="author">Author</label>
            <input style="margin-bottom: 20px" type="text" name="author" id="author" value="<?= $single->author ?>">
        </div>
        <div>
            <label style="display: block" for="img">Image</label>
            <input style="margin-bottom: 20px" type="text" name="img" id="img" value="<?= $single->img ?>">
        </div>
        <input type="submit" value="Update">
    </form>
<?php else: ?>
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
                        <a href="?id=<?= $row->id ?>">
                            <?= $row->id ?>
                        </a>
                    </td>
                    <td>
                        <a href="?id=<?= $row->id ?>">
                            <?= $row->title ?>
                        </a>
                    </td>
                    <td>
                        <a href="?id=<?= $row->id ?>">
                            <?= $row->author ?>
                        </a>
                    </td>
                    <td>
                        <a href="?id=<?= $row->id ?>">
                            <img style="max-height: 100px" src="<?= $row->img ?>" alt="book-cover">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif;?>

