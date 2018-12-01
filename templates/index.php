               <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?= ($show_complete_tasks == 1) ? 'checked' : '' ?>>
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">
                    <tr class="tasks__item task">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                                <span class="checkbox__text">Сделать главную страницу Дела в порядке</span>
                            </label>
                        </td>

                        <td class="task__file">
                            <a class="download-link" href="#">Home.psd</a>
                        </td>

                        <td class="task__date"></td>
                    </tr>
					<?php foreach (taskMapping ($connection)  as $task_item): ?>
					<tr class="tasks__item task <?= ($task_item['status'] == 1) ? 'task--completed' : '';

					date_default_timezone_set("Europe/Moscow");					
					$dt_end = strtotime($task_item['deadline']);
					$dt_now = time();
					$dt_diff = floor(($dt_end - $dt_now)/3600);
					
					
					if ($task_item['status'] == 1 || $task_item['deadline'] == null) {
						echo '';
					} elseif ($dt_diff <= 24) {
						echo 'task--important';
					}

					?>">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                                <span class="checkbox__text"><?= htmlspecialchars($task_item['task_name']);?></span>
                            </label>
                        </td>

                        <td class="task__date">
                            <?php  if ($task_item['deadline'] == null) {
								print '';
							} else { 
							print (htmlspecialchars((new DateTime($task_item['deadline']))->format('d.m.Y')));} ?>
                        </td>

                        <td class="task__date"></td>
                    </tr>
					<?php endforeach; ?>
                    <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
					<?php if ($show_complete_tasks == 1): ?>
						<tr class="tasks__item task task--completed">
							<td class="task__select">
								<label class="checkbox task__checkbox">
									<input class="checkbox__input visually-hidden" type="checkbox" checked>
									<span class="checkbox__text">Записаться на интенсив "Базовый PHP"</span>
								</label>
							</td>
							<td class="task__date">10.10.2018</td>

							<td class="task__controls">
							</td>
						</tr>
					<?php endif; ?>
                </table>