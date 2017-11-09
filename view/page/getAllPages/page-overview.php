<div class="darker-background">
  <a href="<?php echo $GLOBALS['config']['base_url'] ?>page/createPage/"><button type="button">Nieuwe pagina</button></a>
  <table>
    <tr>
      <th>Pagina titel</th>
      <th>Bewerk opties</th>
    </tr>
    <?php

      foreach ($allPages as $pages) {
        echo "
          <tr>
            <td>" . $pages['post-title'] . "</td>
            <td>
              <a href='" . $GLOBALS['config']['base_url'] . "page/edit/" . $pages['postID'] . "'>Bewerken</a>
              <a href='" . $GLOBALS['config']['base_url'] . "page/deletePage/" . $pages['postID'] . "'>Verwijderen</a>
            </td>
          </tr>
        ";
      }

    ?>
  </table>
</div>
