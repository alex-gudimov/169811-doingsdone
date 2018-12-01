<?php

// Data Base Connection

$connection = mysqli_connect('localhost', 'root', '', 'dd_template');
mysqli_set_charset($connection, 'utf8');

// Data Base Connection --- END BLOCK

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function taskCount ($db_connection, $project_id) {
	$sql = "SELECT COUNT(`id`) AS `total_count` FROM `tasks` WHERE `user_id` = 1 AND `project_id` = $project_id";
	$task_count_query = mysqli_query($db_connection, $sql);
	$taskCount = mysqli_fetch_assoc($task_count_query);
	return $taskCount['total_count'];
}


function projectMapping ($db_connection) {
	$sql = "SELECT * FROM `projects` WHERE `user_id` = 1 ORDER BY `id`ASC";
	$projects_query = mysqli_query($db_connection, $sql);
	$projects = mysqli_fetch_all($projects_query, MYSQLI_ASSOC);
	return $projects;	 
}

function taskMapping ($db_connection) {
	$sql = "SELECT * FROM `tasks` WHERE `user_id` = 1 ORDER BY `id`ASC";
	$tasks_query = mysqli_query($db_connection, $sql);
	$tasks = mysqli_fetch_all($tasks_query, MYSQLI_ASSOC);
	return $tasks;	 
}

?>