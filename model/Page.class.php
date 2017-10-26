<?php
  require_once 'model/databaseHandler.class.php';
  require_once 'model/Security.class.php';


  class Page {
    private $DatabaseHandler;
    private $Security;

    public function __construct() {
      $this->DatabaseHandler = new db();
      $this->Security = new Security();
    }

    public function getPageContent($pageTitle) {
      $sql = "SELECT `post-content` FROM post WHERE `post-title`=:title AND `post-type`=:postType";
      $input = array(
        "title" => $this->Security->checkInput($pageTitle),
        "postType" => 'page'
      );

      $result = $this->DatabaseHandler->readData($sql, $input);

      if (!empty($result)) {
        // We have result
        foreach ($result as $page) {
          return($page['post-content']);
          break;
        }
      }

      else {
        return(false);
      }
    }
  }


?>
