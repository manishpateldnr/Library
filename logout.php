<?php
session_start();
session_unset(); 
session_destroy(); 
?>
<script>
    alert("You have successfully logged out.");
</script>
<?php
header("Location: ./Slogin.php");
exit();
?>