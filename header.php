<?php
$metahttpequiv = "<meta http-equiv=\"x-ua-compatible\" content='ie=edge'>";
$metaCharset = "<meta charset='utf-8'>";
$metaViewport = "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
$headTitle = "<title>$title</title>";
?>

<!doctype html>
<html class="no-js" lang="nl" dir="ltr">
  <head>
      <?php
      echo $metahttpequiv,
      $metaCharset,
      $metaViewport,
      $headTitle;
      ?>

    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
  <header>
      <?php echo'<h1>'.$title.'</h1>'?>
      <ul class="dropdown menu" data-dropdown-menu>
          <li class=is-dropdown-submenu-parent"><a href="index.php">Home</a></li>
          <li><a href="">Projecten</a>
              <ul class="menu">
                  <li><a href="">Reizen in Finland</a></li>
                  <li><a>Profielwerkstuk</a></li>
                  <li><a>Klussen thuis</a></li>
                  <li><a>Hobbyprojecten</a></li>
                  <li><a>Vakken op school</a></li>
                  <li><a>Op reis naar Thailand</a></li>
                  <li><a>Op reis naar Tsjechië</a></li>
                  <li><a>Vakken op de middelbare school</a></li>
              </ul>
          </li>
          <li><a href="">Werkplaats</a></li>
          <li><a href="">Mijn Verhaal</a></li>
          <li><a href="">Personalia</a></li>
          <li><a href="">Blog</a></li>
          <li><a href="">Contact</a></li>
<!--          --><?php
//          if(isset($_SESSION['IDgebruiker'])) {
//              echo '<li><a href="ingelogd.php">Admin</a></li>';
//          }
//          ?>
      </ul>
  </header>
