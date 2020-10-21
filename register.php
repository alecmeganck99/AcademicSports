<?php
    include 'app.php';

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
            $sql = 'INSERT INTO `users` (`username`, `email`, `tel`, `password`)
                    VALUES (:username, :email, :tel, :password)';
            $pdo_statement = $db->prepare($sql);
            $pdo_statement->execute( [ 
                ':username' => $_POST['username'] ?? '',
                ':email' => $_POST['email'] ?? '',
                ':tel' => $_POST['tel'] ?? '',
                ':password' => password_hash( $_POST['password'], PASSWORD_DEFAULT ),
            ] );
    
            $user_id = $db->lastInsertId();
            $_SESSION['user_id'] = $user_id;
            header('location: index.php');
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
          <form method="POST">
            <h2>Vul hier uw gegevens in</h2>
            <label for="username">Naam *</label>
            <input type="text" name="username" id="username" required />
            <label for="email">E-mail *</label>
            <input type="email" name="email" id="email" required />
            <label for="password">Wachtwoord *</label>
            <input type="password" name="password" id="password" required />
            <label for="tel">Telefoon</label>
            <input type="tel" name="tel" id="tel" />
            <button type="submit" name="register">Registreer</button>
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
