<div class="menu">
    <h1 class="menu__title">
        <a href="index.php">Academic<span>Sports</span></a>
    </h1>
    <div class="menu__links">
        <!-- <p>
        <a href="pages/sports.html">s<span>porten</span></a>
        </p>
        <p>
        <a href="#">c<span>lubs</span></a>
        </p>
        <p>
        <a href="#">p<span>ersonalcoaches</span></a>
        </p>
        <p>
        <a href="#">c<span>ontact</span></a>
        </p> -->
        <?php
            foreach($all_pages as $page) {
                echo '<p><a href="index.php?q_id=' . $page['page_id'] . '">' . $page['name'] . '</a></p>';
            }
        ?>
    </div>
    <div class="menu__login">
        <a href="register.php">registreer</a>
        <a href="#">login</a>
    </div>
</div>