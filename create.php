<?php
    include 'app.php';

    $v_id = $_GET['q_id'] ?? 1;
    $current_page = Page::getById($v_id);
    $all_pages = Page::getAll();
    $view = 'views/' . $current_page->template . '.php';
    if(  ! file_exists($view) ) {
        $view = 'views/page.php';
    }

    if( isset($_POST['add'] ) ) {
        //SQL om all info op te vragen van de huidige page_id ($v_id)
        $sql = 'INSERT INTO `sports` (`title`, `image`, `description`, `primary`, `secundary`, `detailimage`)
                VALUES (:title, :image, :description, :primary, :secundary, :detailimage)';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ 
            ':title' => $_POST['title'] ?? '',
            ':image' => $_POST['image'] ?? '',
            ':description' => $_POST['description'] ?? '',
            ':primary' => $_POST['primary'] ?? '',
            ':secundary' => $_POST['secundary'] ?? '',
            ':detailimage' => $_POST['detailimage'] ?? '',
        ] );
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/main.css">
    <title>AcademicSports | Create sport</title>
  </head>
  <body>
    <div class="basepage">
        <?php 
        $nav = 'nav.php';
        include $nav;
        ?>
      <div class="createpage">
        <div class="createpage__title">
          <div class="background"></div>
            <div class="createpage--info">
                <div class="createpage--info__txt">
                <h1>Create Sport</h1>
                </div>
            </div>
        </div>
        <div class="createpage__form">
          <form method="POST">
            <h2>Vul hier uw gegevens in</h2>
            <div class="cp">
                <div class="cp__base cp__left">
                    <label for="title">Naam *</label>
                    <input type="text" name="title" id="title" required />
                    <label for="image">Link image *</label>
                    <input type="text" name="image" id="image" required />
                    <label for="description">Uitleg *</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="cp__base cp__right">
                    <label for="primary">Primary *</label>
                    <input type="text" name="primary" id="primary" required />
                    <label for="secundary">Secundary *</label>
                    <input type="text" name="secundary" id="secundary" />
                    <label for="detailimage">Detail image *</label>
                    <input type="text" name="detailimage" id="detailimage" required />
                </div>
            </div>
            <button type="submit" name="add">Toevoegen</button>
          </form>
        </div>
        <div class="footer registerpage__footer">
          <p>Copyright © 2020 by AcademicSports</p>
          <div class="footer__images">
            <img
              src="./images/footer/alexander-jawfox-Kl2t5U6Gkm0-unsplash.jpg"
              alt=""
            />
            <img
              src="./images/footer/anastase-maragos-X2QjAnzvws8-unsplash.jpg"
              alt=""
            />
            <img
              src="./images/footer/hayley-kim-design-eot-ka5dM7Q-unsplash.jpg"
              alt=""
            />
            <img
              src="./images/footer/hipcravo-5UbIqV58CW8-unsplash.jpg"
              alt=""
            />
            <img
              src="./images/footer/john-fornander-TAZoUmDqzXk-unsplash.jpg"
              alt=""
            />
            <img
              src="./images/footer/meghan-holmes-buWcS7G1_28-unsplash.jpg"
              alt=""
            />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
