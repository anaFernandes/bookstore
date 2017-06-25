?>
<!DOCTYPE html>
<html>
   <head>
      <title>Basic Shopping Cart -- GeekBooks.com</title>
      <link rel="stylesheet" href="/sandvig/mis314/assignments/bookstore/styleSheet.css" type="text/css">
   </head>
   <body>

      <?php
      include_once("../includes/header.php");
      ?>

      <div class="pageContainer">
         <div class="leftColumn">
            <?php include "../includes/menu.php" ?>
         </div>
         <div class="content">
            <p class="centeredText">
               <?php
               echo $totalbooks . " item";
               if ($totalbooks != 1)
                  echo 's';
               echo ' in your cart'
               ?>
            </p>

               <?php
               //To do:
               // 1. Build sql statement containing ISBNs. Use foreach loop.
               // 2. Execute sql and display book titles, prices, qty, etc.
               if (count($bookArray)) {
                  echo "<table id='cart'><tr><th>ISBN</th><th>Qty</th><th>Add/Remove</th></tr>";
                  foreach ($bookArray as $isbn => $qty) {
                     echo "
                     <tr>
                        <td>
                           <a class='booktitle' href='ProductPage.php?isbn=$isbn'>$isbn</a> </td>
                        <td>$qty</td>
                        <td>
                           <a href='?addISBN=$isbn'>Add</a><br>
                           <a href='?deleteISBN=$isbn'>Remove</a>
                        </td>
                     </tr>";
                  }
               }
               ?>
            </table>
            <p class="centeredText"><a href="index.php">Basic Cart Home</a></p>
         </div>
      </div>
