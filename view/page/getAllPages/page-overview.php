<div class="darker-background">
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
              <a href='" . $GLOBALS['config']['base_url'] . "page/delete/" . $pages['postID'] . "'>Verwijderen</a>
            </td>
          </tr>
        ";
      }

    ?>
  </table>
</div>
