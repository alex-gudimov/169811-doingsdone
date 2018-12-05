<?php

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

function taskCount ($project_id) {
	$connection = mysqli_connect('localhost', 'root', '', 'doingsdone');
	mysqli_set_charset($connection, 'utf8');
	
	$sql = "SELECT COUNT(`id`) AS `total_count` FROM `tasks` WHERE `user_id` = 1 AND `project_id` = " . (int) $project_id;
	$task_count_query = mysqli_query($connection, $sql);
	$taskCount = mysqli_fetch_assoc($task_count_query);
	
	if (isset($taskCount['total_count'])) {
		return $taskCount['total_count'];
	}
}


function projectMapping () {
	$connection = mysqli_connect('localhost', 'root', '', 'doingsdone');
	mysqli_set_charset($connection, 'utf8');
	
	$sql = "SELECT * FROM `projects` WHERE `user_id` = 1 ORDER BY `id`ASC";
	$projects_query = mysqli_query($connection, $sql);
	$projects = mysqli_fetch_all($projects_query, MYSQLI_ASSOC);
	
	if (isset($projects)) {
		return $projects;
	}	
}

function taskByProjectMapping ($project_id) {
	$connection = mysqli_connect('localhost', 'root', '', 'dd_template');
	mysqli_set_charset($connection, 'utf8');
	
	$sql = "SELECT * FROM `tasks` WHERE `user_id` = 1 AND `project_id` = " . (int) $project_id;
	$tasks_query = mysqli_query($connection, $sql);
	$tasks = mysqli_fetch_all($tasks_query, MYSQLI_ASSOC);

	if (isset($tasks)) {
		return $tasks;
	}
}

function taskMapping () {
	$connection = mysqli_connect('localhost', 'root', '', 'doingsdone');
	mysqli_set_charset($connection, 'utf8');
	
	$sql = "SELECT * FROM `tasks` WHERE `user_id` = 1 ORDER BY `id`ASC";
	$tasks_query = mysqli_query($connection, $sql);
	$tasks = mysqli_fetch_all($tasks_query, MYSQLI_ASSOC);
	
	if (isset($tasks)) {
		return $tasks;
	}
}

?>