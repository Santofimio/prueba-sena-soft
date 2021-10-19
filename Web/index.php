
<?php

include_once "../Lib/helpers.php";
// include_once "../View/Partials/head.php";
// include_once "../View/Partials/navbar.php";
// include_once "../View/Partials/menu.php";
echo "<div class='container'>";

if(isset($_GET['modulo'])) {
  loadForms();
}else{
    echo "<a href='".getUrl("Email","Email","getView")."'>correo</a>";
//   include_once "../View/Partials/dashboard.php";
}
echo "</div>";

// include_once "../View/Partials/footer.php";
?>