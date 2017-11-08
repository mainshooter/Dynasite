<form method="post" action="<?php echo $GLOBALS['config']['base_url'] ?>page/updatePage/<?php echo $pageID; ?>">
  <label>Title</label>
  <input type="text" name="pageTitle" value="<?php echo $pageTitle; ?>" required>

  <br>

  <label>Content</label>
  <textarea name="pageContent"><?php echo html_entity_decode($pageContent); ?></textarea>
  <br>
  <input type="submit" name="editPage" value="Opslaan">
</form>
<script src="<?php echo $GLOBALS['config']['base_url'] ?>view/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
