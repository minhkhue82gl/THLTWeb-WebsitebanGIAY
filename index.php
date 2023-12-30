<?php

if (isset($_GET['act'])) {
  switch ($_GET['act']) {
    case 'nike':
      include "viewUser/header.php";
      include "viewUser/nike.php";
      break;
    case 'adidas':
      include "viewUser/header.php";
      include "viewUser/adidas.php";
      break;
    case 'mlb':
      include "viewUser/header.php";
      include "viewUser/mlb.php";
      break;
    case 'vans':
      include "viewUser/header.php";
      include "viewUser/vans.php";
      break;
    case 'puma':
      include "viewUser/header.php";
      include "viewUser/puma.php";
      break;
    case 'login':
      include "main/login.php";
      break;
    case 'signup':
      include "main/signup.php";
      break;
    case 'cart':
      include "viewUser/header.php";
      include "viewUser/cart.php";
      break;
    default:
      include "viewUser/header.php";
      include "viewUser/section.php";
      break;
  }
} else {
  include "viewUser/header.php";
  include "viewUser/section.php";
}

include "viewUser/footer.php";
