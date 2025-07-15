<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .sidebar {
            min-height: 100vh; /* Full height */
        }
    </style>
</head>
<body>

<!-- Header -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">📝 Task Manager</a>

        <?php if (session()->get('isLoggedIn')): ?>
            <div class="dropdown ms-auto">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="userDropdown"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    👤 <?= esc(session()->get('user_name')) ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="/logout">🚪 Logout</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</nav>


<!-- Page Layout -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar py-4 text-white">

            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" href="#">
                            📋 Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tasks">
                            ✅ View Tasks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tasks/create">
                            ➕ Add New Task
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            ⚙️ Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/logout">🚪 Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary">Your Task List</h2>
                <a href="/tasks/create" class="btn btn-success">➕ Add Task</a>
            </div>

            <?php if (empty($tasks)): ?>
                <div class="alert alert-info">No tasks found. Click "Add Task" to get started!</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Created At</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tasks as $task): ?>
                            <tr>
                                <td><?= esc($task['title']) ?></td>
                                <td><?= $task['created_at'] ?></td>
                                <td class="text-end">
                                    <a href="/tasks/edit/<?= $task['id'] ?>"
                                       class="btn btn-sm btn-outline-primary me-2">✏️ Edit</a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-task-id="<?= $task['id'] ?>">🗑️ Delete
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure you want to delete this task?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger" id="confirmDeleteBtn">Yes, Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const deleteModal = document.getElementById('deleteModal');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const taskId = button.getAttribute('data-task-id');
        confirmDeleteBtn.href = `/tasks/delete/${taskId}`;
    });
</script>

</body>
</html>
