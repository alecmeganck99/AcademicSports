<?php
    include 'app.php';

    $v_id = $_GET['q_id'] ?? 1;
    $current_page = Page::getById($v_id);
    
    $all_pages = Page::getAll();

    $view = 'views/' . $current_page->template . '.php';
    if(  ! file_exists($view) ) {
        $view = 'views/page.php';
    }

    $message = '';
    if( isset($_POST['login'] ) ) {

        $user = User::getUserByEmail( $_POST['email'] );
        
        if( isset($user->email) ) {
            if( password_verify ( $_POST['password'], $user->password) )
            {
                $_SESSION['user_id'] = $user->user_id;
                header('location: index.php');
    
            }
            else {
                echo 'E-mail en/of wachtwoord is verkeerd';
            }
        }else {
            echo 'E-mail en/of wachtwoord is verkeerd';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/main.css">
    <title>AcademicSports | Login</title>
  </head>
  <body>
    <div class="basepage">
        <?php 
        $nav = 'nav.php';
        include $nav;
        ?>
      <div class="loginpage">
        <div class="lp--box">
          <div class="background"></div>
          <div class="container">
            <div class="lp--insidebox">
              <div class="lp--insidebox__img">
                <img src="./images/register/register.png" alt="login image" />
              </div>
              <div class="lp--insidebox__form">
                <h1>welkom terug bij AcademicSports?</h1>
                <form method="POST">
                  <label for="email">E-mail *</label>
                  <input type="email" name="email" id="email" required />
                  <label for="password">Wachtwoord *</label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    required
                  />
                  <button type="submit" name="login">Inloggen</button>
                <?php if($message) : ?>
                    <div class="alert"><?= $message; ?></div>
                <?php endif; ?>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="fillin"></div>
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
