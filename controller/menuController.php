<?php
  require_once 'model/User.class.php';

  class menuController {
    private $User;

    public function __construct() {
      $this->User = new User();
    }


    /**
     * Runs as default, presents a overview of the current page
     */
    public function index() {

    }

  }


?>
