<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$project_list = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$task_list = [
	[
		'subject' => 'Собеседование в IT компании',
		'date_complite' => '01.12.2018',
		'catrgory' => 'Работа',
		'performed' => 'Нет',
	],	
	[
		'subject' => 'Выполнить тестовое задание',
		'date_complite' => '25.12.2018',
		'catrgory' => 'Работа',
		'performed' => 'Нет',
	],
	[
		'subject' => 'Сделать задание первого раздела',
		'date_complite' => '21.12.2018',
		'catrgory' => 'Учеба',
		'performed' => 'Да',
	],
	[
		'subject' => 'Встреча с другом',
		'date_complite' => '22.12.2018',
		'catrgory' => 'Входящие',
		'performed' => 'Нет',
	],
	[
		'subject' => 'Купить корм для кота',
		'date_complite' => 'Нет',
		'catrgory' => 'Домашние дела',
		'performed' => 'Нет',
	],
	[
		'subject' => 'Заказать пиццу',
		'date_complite' => 'Нет',
		'catrgory' => 'Домашние дела',
		'performed' => 'Нет',
	]
];

function taskCount ($taskList, $project) {
	$taskCount = 0;
	foreach ($taskList as $task_key => $task_item) {
		if ($task_item['catrgory'] == $project) {
			$taskCount = $taskCount + 1;
		}
	}
	return $taskCount;
}

require_once( "functions.php" );

$page_content = include_template('index.php', [
	'show_complete_tasks' => $show_complete_tasks,
	'task_list' => $task_list
]);
$layout_content = include_template('layout.php', [
	'title' => 'Дела в порядке',
	'project_list' => $project_list,
	'content' => $page_content,
	'task_list' => $task_list
]);

print($layout_content);

?>
