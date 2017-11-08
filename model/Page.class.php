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
      $sql = "SELECT `post-content`, `post-title` FROM post WHERE `post-title`=:title AND `post-type`=:postType";
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

    /**
     * gets all pages from the db
     * @return [arr] [The result from the DB]
     */
    public function getAllPages() {
      $sql = "SELECT * FROM post WHERE `post-type`=:postType";
      $input = array(
        "postType" => 'page',
      );

      $result = $this->DatabaseHandler->readData($sql, $input);

      if (!empty($result)) {
        return($result);
      }

      else {
        return(false);
      }
    }

    public function getPage($pageID) {
      $sql = "SELECT * FROM post WHERE `post-type`=:postType AND postID=:postID LIMIT 1";
      $input = array(
        "postType" => $this->Security->checkInput('page'),
        "postID" => $this->Security->checkInput($pageID)
      );

      $result = $this->DatabaseHandler->readData($sql, $input);

      if (!empty($result)) {
        // We have result
        return($result);
      }

      else {
        return(false);
      }
    }

    /**
     * Updates a page
     * @param  [INT] $pageID      [The ID of the page]
     * @param  [string] $pageTitle   [The title of the page]
     * @param  [string] $pageContent [The content of the page]
     */
    public function updatePage($pageID, $pageTitle, $pageContent) {
      $sql = "UPDATE `post` SET `post-title`=:postTitle, `post-content`=:postContent WHERE `postID`=:postID";
      $input = array(
        "postTitle" => $this->Security->checkInput($pageTitle),
        "postContent" => $this->Security->checkInput($pageContent),
        "postID" => $this->Security->checkInput($pageID),
      );
      $this->DatabaseHandler->UpdateData($sql, $input);
    }
  }


?>
