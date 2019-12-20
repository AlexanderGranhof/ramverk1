<h1>delete</h1>
<nav>
    <a href="../book">Home</a>
</nav>
<br>

<form action="delete" method="POST">
    <select name="bookid">
        <?php foreach($books as $row): ?>
            <option value="<?= $row->id ?>"><?= $row->title ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Delete">
</form>