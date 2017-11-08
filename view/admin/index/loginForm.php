<form method="post" action="<?php echo $GLOBALS['config']['base_url'] ?>user/loginHandler/">
  <label>E-mail</label>
  <input type="mail" name="clientMail" required>
  <br>
  <label>Wachtwoord</label>
  <input type="password" name="clientPassword" required>

  <br>
  <input type="submit" name="clientLogin" value="Login">
</form>
<p>Heeft u nog geen account? Klik dan <a href="<?php echo $GLOBALS['config']['base_url'] ?>user/register/">hier</a>.</p>
