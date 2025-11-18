<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philippos Asset Management | Прикрепите файлы</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../phasset.svg">
    <link rel="icon" type="image/png" sizes="16x16" href="../phasset.svg">
	<link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="upload-container">
      <img src="../phasset.svg" alt="Philippos Asset Management logo">
      <h2>Загрузите подтверждение платежа / Фото документов</h2>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" style="margin-bottom: 15px;" placeholder="Имя" required>
        <input type="text" name="surname" placeholder="Фамилия" required>
        <input type="file" name="files[]" id="file-upload" class="custom-file-input" multiple required>
        <label for="file-upload" class="custom-file-label">
          <img width="60" height="60" src="/add-file.svg" alt="add-file"/>
          <span id="file-label-text">Прикрепите файлы тут</span>
        </label>
        <br>
        <p style="color: #171620; font-style: italic;">Как правильно сделать фото? смотреть <a href="../template.png" target="_blank" style="color:#171620; text-decoration-line: underline;">шаблон</a>
        </p>
        <br>
        <div style="display: flex; justify-content: center;">
          <button type="submit">Загрузить</button>
          <button class="topup">Пополнить</button>
        </div> 
      </form>
      <div class="message"> <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'success') {
                    echo '
																		<p class="success">Файлы успешно загружены.</p>';
                } elseif ($_GET['status'] == 'error') {
                    echo '
																		<p class="error">Попробуйте позже...</p>';
                }
            }
            ?> </div>
    </div>
    <script>
      document.getElementById('file-upload').addEventListener('change', function() {
        var fileName = this.files.length > 0 ? this.files.length + ' file(s) selected' : 'Drag or drop file here';
        document.getElementById('file-label-text').textContent = fileName;
      });
    </script>
  </body>
</html>