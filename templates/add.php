
      <main class="content__main">
        <h2 class="content__main-heading">Добавление задачи</h2>

        <form class="form" enctype="multipart/form-data" action="../add.php" method="post">
          <div class="form__row">
            <label class="form__label" for="name">Название <sup>*</sup><p class="form__message"></p></label>
            <input class="form__input <?php if ($error) {print 'form__input--error';} ?>" type="text" name="task[task_name]" id="name" value="" placeholder="Введите название"><p class="form__message"><?php if ($error) {print $error;} ?></p>
          </div>

          <div class="form__row">
            <label class="form__label" for="project">Проект <sup>*</sup></label>

            <select class="form__input form__input--select" name="task[project_id]" id="project">
			<?php foreach ($projects as $projectParameters): ?>
              <option value="<?php if (isset($projectParameters['id'])) { print $projectParameters['id']; } ?>"><?php if (isset($projectParameters['project_name'])) { print $projectParameters['project_name']; } ?></option>
			 <?php endforeach; ?>
            </select>
          </div>

          <div class="form__row">
            <label class="form__label" for="date">Дата выполнения</label>

            <input class="form__input form__input--date" type="date" name="task[deadline]" id="date" value="12-02-2011" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
          </div>

          <div class="form__row">
            <label class="form__label" for="preview">Файл</label>

            <div class="form__input-file">
              <input class="visually-hidden" type="file" name="add_file" id="preview" value="">

              <label class="button button--transparent" for="preview">
                <span>Выберите файл</span>
              </label>
            </div>
          </div>

          <div class="form__row form__row--controls">
            <input class="button" type="submit" name="" value="Добавить">
          </div>
        </form>
      </main>