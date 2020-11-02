<div class="basepage">
    <?php 
        $nav = 'nav.php';
        include $nav;
    ?>
  <div class="sportspage">
    <div class="sportspage__title">
      <div class="background"></div>
      <div class="container">
        <div class="sportspage--info">
          <div class="sportspage--info__img">
            <img src="./images/coaches/pexels-pixabay-414029.png" alt="hp_02" />
          </div>
          <div class="sportspage--info__txt">
            <h1>het aanbod van onze coaches!</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="sportspage__coaches">
      <div class="container">
        <div class="coaches--blocks">
          <!-- start box coaches -->
            <?php

                $sql = 'SELECT * FROM `coaches`';

                //voorbereiding
                $pdo_statement = $db->prepare($sql);
                //uitvoeren
                $pdo_statement->execute();
                //resultaat opvragen
                $result = $pdo_statement->fetchAll();

                foreach($result as $sport) {
                    include 'coaches/coach.php';
                }

            ?>
          <!-- end box coaches -->
        </div>
      </div>
    </div>
    <div class="fillin fillintop"></div>
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
        <img src="./images/footer/hipcravo-5UbIqV58CW8-unsplash.jpg" alt="" />
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
