<form method="post" action="<?php echo $GLOBALS['config']['base_url'] ?>user/createUser/">
  <h3>Maak een account aan!</h3>
  <label>Uw mail</label>
  <input type="mail" name="clientMail">
  <br>

  <label>Wachtwoord</label>
  <input type="password" name="clientPassword">
  <br>

  <label>Bevestig uw wachtwoord</label>
  <input type="password" name="clientPasswordConfirm">
  <br>
  <input type="submit" name="clientRegister" value="Registreer">

</form>
