<?php
    session_start();
    require 'db.php';
    include 'app.php';
    
    //Routing
    $v_id = $_GET['q_id'] ?? 1;

    //SQL om page_id, slug en name op te vragen van alle paginas
    $sql = 'SELECT `page_id`, `slug`, `name` FROM `pages` ORDER BY `sort_order`';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute();
    $all_pages = $pdo_statement->fetchAll();

    //SQL om all info op te vragen van de huidige page_id ($v_id)
    $sql = 'SELECT * FROM `pages` WHERE `page_id` = :p_id';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute( [ ':p_id' => $v_id ] );
    $current_page = $pdo_statement->fetchObject();

    //pad naar de juist view
    $view = 'views/' . $current_page->template . '.php';
    //Indien het php bestand niet bestaat gebruik dan page.php
    if(  ! file_exists($view) ) {
        $view = 'views/page.php';
    }

    if( isset($_POST['register'] ) ) {

    
        //TODO: validatie op velden... (bv lengte van wachtwoord)
        //TODO: Controle of email adres reeds gebruikt wordt
        $sql = 'SELECT COUNT(`email`) as total from `users` WHERE `email` = :email';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ 
        ':email' => $_POST['email'] ?? '',
        ] );
        $total = (int) $pdo_statement->fetchColumn();
    
        if($total > 0) {
            echo 'email bestaat al...';
        } else {
    
            //SQL om all info op te vragen van de huidige page_id ($v_id)
            $sql = 'INSERT INTO `users` (`name`, `email`, `tel`, `password`)
                    VALUES (:name, :email, :tel, :password)';
            $pdo_statement = $db->prepare($sql);
            $pdo_statement->execute( [ 
                ':name' => $_POST['name'] ?? '',
                ':email' => $_POST['email'] ?? '',
                ':tel' => $_POST['email'] ?? '',
                ':password' => password_hash( $_POST['password'], PASSWORD_DEFAULT ),
            ] );
    
            $user_id = $db->lastInsertId();
            echo 'Gebruiker ' . $user_id . ' is aangemaakt';
    
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/main.css">
    <title>AcademicSports | Registreer</title>
  </head>
  <body>
    <div class="basepage">
        <?php 
        $nav = 'nav.php';
        include $nav;
        ?>
      <div class="registerpage">
        <div class="registerpage__title">
          <div class="background"></div>
          <div class="container">
            <div class="registerpage--info">
              <div class="registerpage--info__img">
                <img src="./images/register/register.png" alt="hp_02" />
              </div>
              <div class="registerpage--info__txt">
                <h1>Nieuw bij AcademicSports?</h1>
                <p>
                  Bent u nieuw bij AcademicSports en heeft u zin om ons
                  assortiment van sporten te verbreden. Maak dan nu een gratis
                  account en stel zelf nieuwe oefeningen voor!
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="registerpage__form">
          <form action="#">
            <h2>Vul hier uw gegevens in</h2>
            <label for="name">Naam *</label>
            <input type="text" name="name" id="name" required />
            <label for="email">E-mail *</label>
            <input type="email" name="email" id="email" required />
            <label for="password">Wachtwoord *</label>
            <input type="password" name="password" id="password" required />
            <label for="tel">Telefoon</label>
            <input type="tel" name="tel" id="tel" />
            <a href="#">Registeren</a>
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
