<?php
    require 'app.php';

    //Pagina ophalen adhv huidige page_id ($v_id)
    $v_id = $_GET['q_id'] ?? 1;
    $current_page = Page::getById($v_id);
    
    $all_pages = Page::getAll();

    

    //pad naar de juist view
    $view = 'views/' . $current_page->template . '.php';
    //Indien het php bestand niet bestaat gebruik dan page.php
    if(  ! file_exists($view) ) {
        $view = 'views/page.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcademicSports</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
    include $view;
    ?>
</body>
</html>