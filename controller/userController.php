<?php
  require_once 'model/User.class.php';

 class userController {
   private $User;

   public function __construct() {
     $this->User = new User();
   }

   // Does nothing, redirect to the home page
   public function index() {

   }

   // Presents a registerform to the client
   public function register() {
     include 'view/user/header.php';
      include 'view/user/register/registerForm.php';
     include 'view/user/footer.php';
   }

   /**
    * Controlls the register of a new user
    */
   public function createUser() {
     if ($this->User->checkIfEmailExists($_POST['clientMail']) == false) {
       // We don't have a user on that mail

       if ($_POST['clientPassword'] === $_POST['clientPasswordConfirm']) {
         // Passwords are equal
         $registerResult = $this->User->registerUser($_POST['clientMail'], $_POST['clientPassword'], 'user');

         if ($registerResult == true) {
           // Register is a succes

         }

         else if ($registerResult == false) {
           // Register has faild
         }
       }

       else {
         // Passwords are not equal
       }
     }

     else {
       // We have a user on that mail adress
     }
   }

   // Controlls the login of a client
   public function loginHandler() {
     if (ISSET($_POST['clientMail']) && ISSET($_POST['clientPassword'])) {
       // Log them in!
       $mail = $_POST['clientMail'];
       $password = $_POST['clientPassword'];
       $loginResult = $this->User->userLogin($mail, $password);

       if ($loginResult == true) {
         // Login is succes
         header("Location: " . $GLOBALS['config']['base_url'] . "page/getAllPages/");
       }

       else {
         // Login has faild
         include 'view/user/header.php';
          include 'view/admin/index/loginForm.php';
        include 'view/user/footer.php';
       }
     }

     else {
       // client came here by excident
       header("Location: " . $GLOBALS['config']['base_url'] . "admin/");
     }



   }
 }

?>
