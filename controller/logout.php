<?php
session_start();
session_destroy();
echo"
<script>
alert('loged out');
window.location.href='../views/login.php'
</script>
";
exit();
?>
