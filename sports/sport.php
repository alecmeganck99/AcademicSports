<div class="sports--blocks__block">
  <a class="sports--block" href="sportsdetail.php?q_id=<?= $sport["id"]; ?>">
    <div class="sports--block__imagebox">
      <img
        src="<?= $sport["image"] ; ?>"
        alt="running"
      />
    </div>
    <div class="sports--block__titlebox">
      <p><?= $sport["title"] ; ?></p>
    </div>
    <div class="sports--block__infobox">
      <p class="infobox--title">Primair:</p>
      <p><?= $sport["primary"] ; ?></p>
      <p class="infobox--title">Secundair:</p>
      <p><?= $sport["secundary"] ; ?></p>
    </div>
  </a>
</div>