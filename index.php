<?php
session_start();

$tasks = isset($_SESSION['tasks']) ? $_SESSION['tasks'] : array();
$completed_tasks = isset($_SESSION['completed_tasks']) ? $_SESSION['completed_tasks'] : array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_task']) && !empty($_POST['task_name'])) {
        $tasks[] = $_POST['task_name'];
        $_SESSION['tasks'] = $tasks;
    }
    if (isset($_POST['delete_task']) && isset($_POST['task_index'])) {
        $index = $_POST['task_index'];
        unset($tasks[$index]);
        $_SESSION['tasks'] = $tasks;
    }
    if (isset($_POST['mark_completed']) && isset($_POST['task_index'])) {
        $index = $_POST['task_index'];
        $completed_tasks[] = $tasks[$index];
        unset($tasks[$index]);
        $_SESSION['tasks'] = $tasks;
        $_SESSION['completed_tasks'] = $completed_tasks;
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><br><br>
    <title>TODO LIST</title>
    <style>
        body {
            background-color:#68A4A5;
            font-family: "Times New Roman", Times, serif;
            font-size: 10px;
            margin: auto;
            width: 50%;
            padding: 10px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            padding: 0;
            margin-bottom: 0;
        }
        p{
            text-align:center;
            color:black;
        }
        h3{
            text-align:center;
            color:#4C8055;
        }
        div{
            border:2px solid black;
            background-color:#D9DAD9;#68A4A5;
        }
        b{
            color:#4C8055;
            font-size: 15px;
        }
    </style>
</head>
<body><div>
    <center><h1>TODO LIST</h1></center><br>

    <form method="post">
    &nbsp&nbsp&nbsp<label for="task_name"><b>ADD YOUR TASK</b></label>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="task_name" name="task_name">
    &nbsp&nbsp&nbsp&nbsp<button type="submit" name="add_task">ADD</button>
    </form>

    <h3>TASKS</h3>
    <?php if (count($tasks) > 0): ?>
        <ul>
            <?php foreach ($tasks as $index => $task): ?>
                <li>
                    <form method="post">
                        <input type="hidden" name="task_index" value="<?= $index ?>">
                        <?= $task ?>
                        &nbsp&nbsp&nbsp&nbsp<button type="submit" name="delete_task">DELETE</button>
                        &nbsp&nbsp&nbsp&nbsp<button type="submit" name="mark_completed">MARK AS COMPLETED</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>NO TASKS.</p>
    <?php endif; ?>

    <h3>COMPLETED TASKS</h3>
    <?php if (count($completed_tasks) > 0): ?>
        <center><ul>
            <?php foreach ($completed_tasks as $task): ?>
                <li class="completed"><?= $task ?></li>
            <?php endforeach; ?>
        </ul></center>
    <?php else: ?>
        <p>NO COMPLETED TASKS.</p>
    <?php endif; ?>

    <h3>PENDING TASKS</h3>
    <?php $pending_tasks = array_diff($tasks, $completed_tasks); ?>
    <?php if (count($pending_tasks) > 0): ?>
        <ul>
            <?php foreach ($pending_tasks as $task): ?>
                <li><?= $task ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>NO PENDING TASKS.</p>
    <?php endif; ?><br><br></div>
</body>
</html>