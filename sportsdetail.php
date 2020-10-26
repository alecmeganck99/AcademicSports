<?php
    include 'app.php';

    //Pagina ophalen adhv huidige page_id ($v_id)
    $v_id = $_GET['q_id'] ?? 1;
    $current_page = Page::getById($v_id);
    
    $all_pages = Page::getAll();

    //sql met parameter placeholders
    $sql = 'SELECT * FROM `sports` WHERE `id` = :s_id';

    //voorbereiding
    $pdo_statement = $db->prepare($sql);
    //uitvoeren met parameters
    $pdo_statement->execute([
            ':s_id' => $v_id
        ]);
    //resultaat opvragen
    $result = $pdo_statement->fetchObject();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/main.css">
    <title>AcademicSports | Sportdetail</title>
  </head>
  <body>
    <div class="basepage">
        <?php 
        $nav = 'nav.php';
        include $nav;
        ?>
      <div class="sportdetailpage">
        <div class="sportdetailpage__title">
          <div class="background"></div>
          <div class="container">
            <div class="sportdetailpage--info">
              <div class="sportdetailpage--info__img">
                <img
                  src="<?= $result->image; ?>"
                  alt="hp_02"
                />
              </div>
              <div class="sportdetailpage--info__txt">
                <h1><?= $result->title; ?></h1>
              </div>
            </div>
          </div>
        </div>
        <div class="sportdetailpage__info">
          <div class="container">
            <div class="sd--info">
              <div class="sd--info__box">
                <div class="sd--infobox">
                  <p class="sd--infobox__title">Primair:</p>
                  <p><?= $result->primary; ?></p>
                  <p class="sd--infobox__title">Secundair:</p>
                  <p><?= $result->secundary; ?></p>
                </div>
                <div class="sd--imgbox">
                  <img
                    src="<?= $result->detailimage; ?>"
                    alt=""
                  />
                </div>
              </div>
              <div class="sd--info__text">
                <p>
                    <?= $result->description; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="footer">
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
