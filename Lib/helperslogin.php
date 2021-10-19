<?php
@session_start();
if (!isset($_SESSION['auth'])) {
    redirect("login.php");
}else if(!($_SESSION['rol_id']==1 || $_SESSION['rol_id']==2)){
	redirect("index.php");
}

