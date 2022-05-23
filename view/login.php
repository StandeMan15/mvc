<?php
require 'view/components/header.php'; ?>

    <form action='index.php?con=auth&op=login' method="POST"> 
        
        <div class="row">
        <div class="col-6"><label for="uname"><b>Username</b></label></div>
        <div class="col-6"><input type="text" placeholder="Enter Username" name="uname" style="width: 50%;" required><br></div>

        <div class="w-100"></div>
        <div class="col-6"> <label for="psw"><b>Password</b></label></div>
        <div class="col-6"><input type="password" placeholder="Enter Password" name="psw" required><br></div>
        </div>

        <button type="submit">Login</button>
        <button><a href='index.php?con=auth&op=registreer'>Registreer</a></button>
    </form>

<?php require 'view/components/footer.php'; ?>