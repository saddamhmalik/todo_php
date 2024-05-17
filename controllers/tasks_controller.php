<?php
require_once BASE_PATH . '/db_connection.php';
class TasksController
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function index()
    {
        $sql = "SELECT * FROM tasks";
        $result = $this->conn->query($sql);

        require_once BASE_PATH .'/views/tasks_view.php';
    }

    public function store()
    {
        $task_description = $_POST["new_task"];

        // Check for duplicate tasks
        $sql = "SELECT * FROM tasks WHERE description = '$task_description'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO tasks (description, completed) VALUES ('$task_description', 0)";
            if ($this->conn->query($sql) === TRUE) {
                echo "New task added successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
        } else {
            echo "Error: Task already exists.";
        }

        header('Location: /');
        exit;
    }

    public function complete()
    {
        $task_id = $_POST["task_id"];
        $sql = "UPDATE tasks SET completed = 1 WHERE id = $task_id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Task marked as completed.";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        header('Location: /');
        exit;
    }

    public function delete()
    {
        $task_id = $_POST["task_id"];
        $sql = "DELETE FROM tasks WHERE id = $task_id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Task deleted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        header('Location: /');
        exit;
    }
}