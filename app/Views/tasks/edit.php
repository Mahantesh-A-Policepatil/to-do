<h2>Edit Task</h2>
<form method="post" action="/tasks/update/<?= $task['id'] ?>">
    <input type="text" name="title" value="<?= esc($task['title']) ?>" required>
    <button type="submit">Update</button>
</form>
<a href="/tasks">Back</a>
