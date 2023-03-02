Todo list by using php

PROBLEM STATEMENT:

Create a simple TODO web App with following features. Preferred Language: PHP

• Add Task

• Delete Task

• Mark as Completed

• List of Tasks

• List of Completed Tasks

• List of Pending Tasks

DESCRIPTION OF THE PROJECT:

This is a PHP script that creates a simple TODO list application. The script uses sessions to keep track of the tasks and completed tasks.

The script starts by calling session_start() to start a PHP session. It then retrieves the tasks and completed tasks from the session, or initializes them as empty arrays if they don't exist.

If the HTTP request method is POST, the script checks if a new task should be added, a task should be deleted, or a task should be marked as completed. If any of these actions are taken, the script updates the appropriate arrays in the session.

The HTML section of the script creates a form for adding new tasks and displays the list of tasks, completed tasks, and pending tasks. The completed tasks are displayed in a separate list from the pending tasks.

The script also includes some basic styling using CSS.

OUTPUT SCREENSHOT

![image](https://user-images.githubusercontent.com/85669685/222546116-4368148e-15ae-4ee3-bbde-d2091a8d44d2.png)
