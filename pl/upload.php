<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $uploadDir = '../upload/pl/' . date('Ymd') . '/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadSuccess = true;
    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $originalFileName = $_FILES['files']['name'][$key];
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $fileBaseName = pathinfo($originalFileName, PATHINFO_FILENAME);
        
        $counter = 1;
        $newFileName = "{$name}-{$surname}-{$counter}-{$fileBaseName}.{$fileExtension}";
        $uploadFile = $uploadDir . $newFileName;

        // Check for existing file and increment counter
        while (file_exists($uploadFile)) {
            $counter++;
            $newFileName = "{$name}-{$surname}-{$counter}-{$fileBaseName}.{$fileExtension}";
            $uploadFile = $uploadDir . $newFileName;
        }

        // Save the file
        if (!move_uploaded_file($tmp_name, $uploadFile)) {
            $uploadSuccess = false;
            break;
        }
    }

    if ($uploadSuccess) {
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error");
    }
    exit();
}
?>
