<?php

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

require_once( "functions.php" );

// Нет параметра - выводим все задачи
if (!isset($_GET['project_id'])) {
	
	$title = 'Дела в порядке';
	$page_content = include_template('index.php', [
		'tasks'							=> taskMapping (),
		'show_complete_tasks' 	=> $show_complete_tasks

	]);
	
// Параметр здесь точно есть, проверяем, что нет по нему задач и выводим 404	
} else if ((int) taskCount((int) $_GET['project_id']) === 0) {
	
	http_response_code(404);
	$title = '404';
	$page_content = '404 - Ничего не найдено';
	
// Если мы добрались до сюда, то параиетр есть и по нему есть задачи	
} else {
	
	$title = 'Дела в порядке - задачи по проекту';
	$page_content = include_template('index.php', [
		'tasks'							=> taskByProjectMapping ((int) $_GET['project_id']),
		'show_complete_tasks' 	=> $show_complete_tasks
	]);
	
}

$layout_content = include_template('layout.php', [
	'title' => $title,
	'content' => $page_content,
	'projects' => projectMapping()
]);

print($layout_content);

?>
