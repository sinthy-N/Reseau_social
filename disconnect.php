<?php
//Se déconnecter
session_start();
session_destroy();
echo "<script>window.location.href = './createAccount.php'</script>";