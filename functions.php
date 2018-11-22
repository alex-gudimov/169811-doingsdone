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

function taskCount ($taskList, $project) {
	$taskCount = 0;
	foreach ($taskList as $task_key => $task_item) {
		if ($task_item['catrgory'] == $project) {
			$taskCount = $taskCount + 1;
		}
	}
	return $taskCount;
}

?>