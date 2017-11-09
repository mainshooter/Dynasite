<div>
  <p>Weet u zeker dat u de pagina: <?php echo $pageTitle; ?> wilt verwijderen</p>
  <a href="<?php echo $GLOBALS['config']['base_url'] ?>page/delete/<?php echo $pageID; ?>"><button type="button">Ja</button></a>
  <a href="<?php echo $GLOBALS['config']['base_url'] ?>page/getAllPages/<?php echo $pageID; ?>"><button type="button">Nee</button></a>
</div>
