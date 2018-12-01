<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

require_once( "data.php" );
require_once( "functions.php" );

$page_content = include_template('index.php', [
	'show_complete_tasks' => $show_complete_tasks,
//	'task_list' => $task_list
	'connection' => $connection
]);

$layout_content = include_template('layout.php', [
	'title' => 'Дела в порядке',
	'project_list' => $project_list,
	'content' => $page_content,
	'task_list' => $task_list,
	'connection' => $connection
]);

print($layout_content);

?>
