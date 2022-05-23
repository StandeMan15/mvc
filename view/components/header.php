<?php

if (!isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>MVC</title>
</head>

<body>


<div class="header">
  <h1>My Website</h1>
  <p>With a <b>flexible</b> layout.</p>
</div>

    <div class='navbar'>
          <div class="row">
          <div class="col-10">
            <a href='index.php?con=products'>Products</a>
            <a href='index.php?con=contacts'>Contacts</a>
            <a href='index.php?con=content'>Content</a>
            <a href='index.php?con=zoo'>Zoo</a>
          </div>
          <div class="col-2">
            <?php 
            
                if ($_SESSION['loggedin'] == false) { ?>
                  <a href='index.php?con=auth&op=showlogin'>Login</a>
                  <a href='index.php?con=auth&op=registreer'>Registreer</a>

                <?php } elseif ($_SESSION['loggedin'] == true) { ?>
                  <a href='index.php?con=auth&op=logout'>Logout</a>

                <?php } ?>
          </div>
          
    </div>
  </div> 

<div class="row">
  <div class="side">
    <h2 onclick=>About Me</h2>
    <?php 
      echo "Logged in is " . $_SESSION['loggedin'];
      ?>
    <h5>Photo of me:</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>


    
  </div>
  <div class="main">

    <?= isset($msg) ? "<div  class='full-button'> Added user, click <a href='/index.php?con=contacts'>here</a> to go back to last page" . $msg . "</div>" : null; ?>