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
            <img src="./images/homepage/hp_02.png" alt="hp_02" />
          </div>
          <div class="sportspage--info__txt">
            <h1>het aanbod van onze sporten!</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="sportspage__sports">
      <div class="container">
        <div class="sports--blocks">
          <!-- start box sports -->
            <?php

                $sql = 'SELECT * FROM `clubs`';

                //voorbereiding
                $pdo_statement = $db->prepare($sql);
                //uitvoeren
                $pdo_statement->execute();
                //resultaat opvragen
                $result = $pdo_statement->fetchAll();

                foreach($result as $sport) {
                    include 'clubs/club.php';
                }

            ?>
          <!-- end box sports -->
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
