<div class="right_col" role="main">
  <div class="row top_tiles">
    <?php foreach($tiles as $tile): ?>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="<?= $tile['icon'] ?>"></i></div>
        <div class="count"><?= $tile['value'] ?></div>
        <h3><?= $tile['title'] ?></h3>
        <p><?= $tile['subtitle'] ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>