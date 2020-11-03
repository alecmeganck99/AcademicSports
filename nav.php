<div class="menu">
    <h1 class="menu__title">
        <a href="index.php">Academic<span>Sports</span></a>
    </h1>
    <div class="menu__links">
        <?php if ($user_id ) : ?>
            <?php
                foreach($all_pages as $page) {
                    echo '<p><a href="index.php?q_id=' . $page['page_id'] . '">' . $page['name'] . '</a></p>';
                }
                echo '<p><a href="create.php">C<span>reate sport</span></a></p>';
            ?>
        <?php else : ?>
            <?php
                foreach($all_pages as $page) {
                    echo '<p><a href="index.php?q_id=' . $page['page_id'] . '">' . $page['name'] . '</a></p>';
                }
            ?>
        <?php endif; ?>
    </div>
    <div class="menu__login">
        <?php if ($user_id ) : ?>
            <p><?= $user->username; ?></p><a href="logoff.php">Uitloggen</a>
        <?php else : ?>
            <a href="login.php">login</a> <a href="register.php">registreer</a>
        <?php endif; ?>
    </div>
</div>