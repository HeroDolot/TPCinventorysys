<?php
    session_start();

    if(isset($_SESSION['authentication'])!='abc123'){
      header('location:../../');
    }

?> 