<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/tasks">📝 Task Manager</a>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-success mb-4">➕ Add New Task</h2>

    <form method="post" action="/tasks/store" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter task title" required>
        </div>
        <div class="d-flex justify-content-between">
            <a href="/tasks" class="btn btn-secondary">← Back</a>
            <button type="submit" class="btn btn-success">Save Task</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

