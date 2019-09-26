<?php
function log_out_user() {
    unset($_SESSION['user_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['email']);
    return true;
  }
log_out_user();

redirect_to(url_for('login.php'));

?>
