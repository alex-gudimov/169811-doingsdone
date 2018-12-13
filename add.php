<?php

require_once( "functions.php" );


 $page_content = include_template('add.php', [
	'projects' => projectMapping()

 ]);

$connection = mysqli_connect('localhost', 'root', '', 'doingsdone');
mysqli_set_charset($connection, 'utf8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$task = $_POST['task'];
	
	if (empty($task[task_name])) {
		
		$error = 'Необходимо заполнить поле';
		
		$page_content = include_template('add.php', [
		'error' => $error,
		'projects' => projectMapping()

		]);
		
	} else {
		 
		$filename = $_FILES['add_file']['name'];
		$task['task_file'] = $filename;
		$file_path = __DIR__ . '/';
		move_uploaded_file($_FILES['add_file']['tmp_name'], $file_path . $filename);
	
		if ((int) $task[deadline] === 0) {
	
			$sql = 'INSERT INTO tasks (created_at, completed_at, status, project_id, user_id, task_name, file_add, deadline) VALUES(NOW(), 0, 0, ?, 1, ?, ?, NULL)';
	
			$stmt = db_get_prepare_stmt($connection, $sql, [$task[project_id], $task[task_name], $task[task_file]]);
			$res = mysqli_stmt_execute($stmt);
	
		} else {
		
			$sql = 'INSERT INTO tasks (created_at, completed_at, status, project_id, user_id, task_name, file_add, deadline) VALUES(NOW(), 0, 0, ?, 1, ?, ?, ?)';
	
			$stmt = db_get_prepare_stmt($connection, $sql, [$task[project_id], $task[task_name], $task[task_file], $task[deadline]]);
			$res = mysqli_stmt_execute($stmt);
		
	}
	
	if ($res) {
		
		header("Location: index.php");
		
	} else {
		
		$page_content = 'Ошибка';	
		
	}
	

	
	$page_content = include_template('add.php', [
		'error' => $error,
		'projects' => projectMapping()

		]);
		
	}
	
}



$layout_content = include_template('layout.php', [
	'title' => 'Добавление задачи',
	'content' => $page_content,
	'projects' => projectMapping()
]);

print($layout_content);
