<form method="post" action="<?php echo $GLOBALS['config']['base_url'] ?>page/updatePage">
  <label>Title</label>
  <input type="text" name="pageTitle" value="<?php echo $pageTitle; ?>" required>

  <br>

  <label>Content</label>
  <textarea name="pageContent"><?php echo $pageContent; ?></textarea>
  <br>
  <input type="submit" name="editPage" value="Opslaan">
</form>
