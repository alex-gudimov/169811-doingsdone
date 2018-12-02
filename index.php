<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

require_once( "functions.php" );

$page_content = include_template('index.php', [
	'show_complete_tasks' => $show_complete_tasks,
	'connection' => $connection
]);

$layout_content = include_template('layout.php', [
	'title' => 'Дела в порядке',
	'content' => $page_content,
	'connection' => $connection
]);

print($layout_content);

?>
