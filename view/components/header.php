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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>MVC</title>
</head>

<body>


<div class="header">
  <h1>My Website</h1>
  <p>With a <b>flexible</b> layout.</p>
</div>

<?php


    $getfiles = file_get_contents(__DIR__.'../../assets/loggedinheader.json');
    $loggedin = json_decode($getfiles);

    $getfiles = file_get_contents(__DIR__.'../../assets/loggedoutheader.json');
    $loggedout = json_decode($getfiles);

    $getfiles = file_get_contents(__DIR__.'../../assets/dropdownheader.json');
    $dropdown = json_decode($getfiles);

    if (isset($_SESSION['loggedin']) === false) { ?>
      <div class='navbar'>
      <?= $this->Display->CreateHeader($loggedout); ?>
      </div>

    <?php } elseif (isset($_SESSION['loggedin']) === true) { ?>
      <div class='navbar'>
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><i class="fa fa-user" aria-hidden="true"></i></button>
            <div id="myDropdown" class="dropdown-content">
          <?= $this->Display->CreateHeader($dropdown); ?>
            </div>
        </div>
        <?= $this->Display->CreateHeader($loggedin); ?>

      </div>
    <?php } ?>

<div class="row">
  <div class="side">
    <h2>About Me</h2>
    <h5>Photo of me:</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>



  </div>
  <div class="main">

<script>
  /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>