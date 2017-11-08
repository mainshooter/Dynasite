<?php
  require_once 'model/User.class.php';

  class adminController {
    private $User;

    public function __construct() {
      $this->User = new User();
    }

    /**
     * Presents a login
     */
    public function index() {
      if ($this->User->checkIfClientHasAcces('*')) {
        // Logged in, redirect to the cms
        echo "CMS";
      }

      else {
        // Presents the login form
        include 'view/admin/header.php';
          include 'view/admin/index/loginForm.php';
        include 'view/admin/footer.php';
      }
    }
  }

?>
