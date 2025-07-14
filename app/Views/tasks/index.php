<h2>Task List</h2>
<a href="/tasks/create">Add Task</a>
<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= esc($task['title']) ?></td>
            <td><?= $task['created_at'] ?></td>
            <td>
                <a href="/tasks/edit/<?= $task['id'] ?>">Edit</a>
                <a href="/tasks/delete/<?= $task['id'] ?>" onclick="return confirm('Delete this task?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
