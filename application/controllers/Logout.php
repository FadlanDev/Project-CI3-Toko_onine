<title>Halaman Logout</title>
<img src= "asset/images/thanks.gif" height="100%" width="100%"> 

<?php
session_start();
session_destroy();
?>

    <script type="text/javascript">
        alert("Anda Berhasil keluar");
        window.open("login","_self");
    </script>