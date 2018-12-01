
USE doingsdone;

-- добавить пользователей в БД
	
INSERT INTO users SET email = 'user1@mail.bu', user_name = 'user1', password = 'secret1';
INSERT INTO users SET email = 'user2@mail.bu', user_name = 'user2', password = 'secret2';

-- добавить в БД проекты для пользователя user1

INSERT INTO projects (project_name, user_id) VALUES ('Входящие_usr1', 1), ('Учеба_usr1', 1), ('Работа_usr1', 1), ('Домашние дела_usr1', 1), ('Авто_usr1', 1);

-- добавить в БД проекты для пользователя user2

INSERT INTO projects (project_name, user_id) VALUES ('Входящие_usr2', 2), ('Учеба_usr2', 2), ('Работа_usr2', 2), ('Домашние дела_usr2', 2), ('Авто_usr2', 2);

-- добавить в БД задачи для пользователя user1

INSERT INTO tasks SET status = 0, project_id = 3, user_id =1, task_name = 'Собеседование в IT компании_usr1', deadline = '2018-12-01';
INSERT INTO tasks SET status = 0, project_id = 3, user_id =1, task_name = 'Выполнить тестовое задание_usr1', deadline = '2018-11-25';
INSERT INTO tasks SET status = 1, project_id = 2, user_id =1, task_name = 'Сделать задание первого раздела_usr1', deadline = '2018-12-21';
INSERT INTO tasks SET status = 0, project_id = 1, user_id =1, task_name = 'Встреча с другом_usr1', deadline = '2018-12-22';
INSERT INTO tasks SET status = 0, project_id = 4, user_id =1, task_name = 'Купить корм для кота_usr1';
INSERT INTO tasks SET status = 0, project_id = 4, user_id =1, task_name = 'Заказать пиццу_usr1';

-- добавить в БД задачи для пользователя user2

INSERT INTO tasks SET status = 0, project_id = 3, user_id =2, task_name = 'Собеседование в IT компании_usr2', deadline = '2018-12-01';
INSERT INTO tasks SET status = 0, project_id = 3, user_id =2, task_name = 'Выполнить тестовое задание_usr2', deadline = '2018-11-25';
INSERT INTO tasks SET status = 1, project_id = 2, user_id =2, task_name = 'Сделать задание первого раздела_usr2', deadline = '2018-12-21';
INSERT INTO tasks SET status = 0, project_id = 1, user_id =2, task_name = 'Встреча с другом_usr2', deadline = '2018-12-22';
INSERT INTO tasks SET status = 0, project_id = 4, user_id =2, task_name = 'Купить корм для кота_usr2';
INSERT INTO tasks SET status = 0, project_id = 4, user_id =2, task_name = 'Заказать пиццу_usr2';

-- получить список из всех проектов для одного пользователя

SELECT * FROM projects WHERE user_id = 1 ORDER BY id ASC;

-- получить список из всех задач для одного проекта

SELECT * FROM tasks WHERE project_id = 3 AND user_id =1;

-- пометить задачу как выполненную

UPDATE tasks SET status = 1, completed_at = current_timestamp  WHERE id = 2;

-- получить все задачи для завтрашнего дня 

-- INSERT INTO tasks SET status = 0, project_id = 3, task_name = 'Тестовая задача на завтра', deadline = '2018-11-29';

SELECT * FROM tasks WHERE deadline = ADDDATE(CURDATE(), INTERVAL +1 DAY);

-- обновить название задачи по её идентификатору

UPDATE tasks SET task_name = 'Обновление названия тестовой задачи на завтра' WHERE id = 13;