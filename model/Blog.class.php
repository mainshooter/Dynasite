<?php
  require_once 'model/databaseHandler.class.php';
  require_once 'model/Security.class.php';

  class Blog {
    private $DatabaseHandler;
    private $Security;

    public function __construct() {
      $this->DatabaseHandler = new db();
      $this->Security = new Security();
    }

    public function getHomeBlogPosts() {
      $sql = "SELECT `post-title`,`post-content` FROM post WHERE `post-type`=:postType ORDER BY `post`.`postID` DESC LIMIT 2";
      $input = array(
        "postType" => 'blog'
      );

      $result = $this->DatabaseHandler->readData($sql, $input);
      if (!empty($result)) {
        // We have result
        $blogPosts = [];
        foreach ($result as $blog) {
          $blogPosts[] = $blog;
        }
        return($blogPosts);
      }

      else {
        return(false);
      }
    }
  }

?>
