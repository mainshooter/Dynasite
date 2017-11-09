<form method="post" action="<?php echo $GLOBALS['config']['base_url'] ?>page/create/">
  <label>Title</label>
  <input type="text" name="pageTitle" value="" required>

  <br>

  <label>Content</label>
  <textarea name="pageContent"></textarea>
  <br>
  <input type="submit" name="editPage" value="Opslaan">
</form>
<script src="<?php echo $GLOBALS['config']['base_url'] ?>view/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
