<?php
include_once("../includes/utilitiesGeneral.php");
include_once("../includes/connection.php");
$link = fConnectToDatabase();

//Shopping cart uses cookies to store cart items.
//PHP script uses an array for adding, removing and displaying the cart items.
//Cookies can contain only string data so array must be serialized.

$cookieName = "myCart2";
// retrieve cookie and unserialize into $bookArray
if (isset($_COOKIE[$cookieName])) {
   $bookArray = unserialize($_COOKIE[$cookieName]);
}
// Add items to cart
$addISBN = CleanISBN($_GET['addISBN']);
if (strlen($addISBN) > 0) {
   if (isset($addISBN, $bookArray)) {
      // Increment by +1
      $bookArray[$addISBN] += 1;
   } else {
      // Add new item to cart
      $bookArray[$addISBN] = 1;
   }
}
// Remove items from cart
$deleteISBN = CleanISBN($_GET['deleteISBN']);
if (strlen($deleteISBN) > 0) {
   if (isset($bookArray[$deleteISBN])) {
      // Deincrement by 1
      $bookArray[$deleteISBN] -= 1;
      // remove ISBN from array if qty==0
      if ($bookArray[$deleteISBN] == 0) {
         unset($bookArray[$deleteISBN]);
      }
   }
}
if (isset($bookArray)) {
   // Write cookie
   setcookie($cookieName, serialize($bookArray), time() + 60 * 60 * 24 * 180);

   //Count total books in cart
   $totalbooks = 0;
   foreach ($bookArray as $isbn => $qty) {
      $totalbooks += $qty;
   }
   setCookie('BookCount', $totalbooks, time() + 60 * 60 * 24 * 180);
}
