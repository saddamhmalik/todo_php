<!DOCTYPE html>
<html>

<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .completed {
            text-decoration: line-through;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container m-5 my-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">To-Do List</h2>
            </div>
            <div class="card-body">
                <form method="post" action="/add_task" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="new_task" class="form-control" placeholder="Enter a new task" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Add Task</button>
                        </div>
                    </div>
                </form>
                <ul class="list-group">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span
                                    class="<?php echo $row['completed'] ? 'completed' : ''; ?>"><?php echo $row['description']; ?></span>
                                <div class="btn-group">
                                    <form method="post" action="/complete_task" class="mb-0">
                                        <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit"
                                            class="btn btn-success btn-sm <?php echo $row['completed'] ? 'disabled' : ''; ?>">
                                            <?php echo $row['completed'] ? 'Completed' : 'Complete'; ?>
                                        </button>
                                    </form>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li class="list-group-item">No tasks found.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(taskId) {
            if (confirm("Are you sure you want to delete this task?")) {
                var form = document.createElement("form");
                form.method = "post";
                form.action = "/delete_task";

                var taskIdInput = document.createElement("input");
                taskIdInput.type = "hidden";
                taskIdInput.name = "task_id";
                taskIdInput.value = taskId;
                form.appendChild(taskIdInput);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>

</html>