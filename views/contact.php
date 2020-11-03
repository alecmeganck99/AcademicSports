<div class="basepage">
    <?php 
    $nav = 'nav.php';
    include $nav;
    ?>
    <div class="contactpage">
    <div class="contactpage__title">
        <div class="background"></div>
        <div class="contactpage--info">
            <div class="contactpage--info__txt">
            <h1>Contact</h1>
            </div>
        </div>
    </div>
    <div class="contactpage__form">
        <form method="POST">
        <h2>Vul hier uw gegevens in</h2>
        <label for="username">Naam *</label>
        <input type="text" name="username" id="username" required />
        <label for="email">E-mail *</label>
        <input type="email" name="email" id="email" required />
        <label for="message">Bericht *</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
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