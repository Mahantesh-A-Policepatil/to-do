<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <div style="margin:20px;">
        <form method="post" action="/store">
            <input type="text" name="title" required>
            <button type="submit">Add Task</button>
        </form>
    </div>
    <div style="margin:20px;">
        <table border="1" cellpadding="10" cellspacing="0" >
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= $task['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
