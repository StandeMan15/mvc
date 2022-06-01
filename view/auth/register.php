<?php
require 'view/components/header.php'; ?>

    <form action='index.php?con=auth&op=registreer' method="POST"> 
        
        <div class="row">
            <div class="col-6"><label for="uname"><b>Username</b></label></div>
            <div class="col-6"><input type="text" placeholder="Enter Username" name="uname" style="width: 50%;" required><br></div>

            <div class="col-6"><label for="fname"><b>Firstname</b></label></div>
            <div class="col-6"><input type="text" placeholder="Enter Firstname" name="fname" style="width: 50%;" required><br></div>

            <div class="col-6"><label for="lname"><b>Lastname</b></label></div>
            <div class="col-6"><input type="text" placeholder="Enter Username" name="lname" style="width: 50%;" required><br></div>

            <div class="col-6"><label for="email"><b>Email</b></label></div>
            <div class="col-6"><input type="text" placeholder="Enter email" name="email" style="width: 50%;" required><br></div>

            <div class="col-6"> <label for="psw"><b>Password</b></label></div>
            <div class="col-6"><input type="password" placeholder="Enter Password" name="psw" required><br></div>
        </div>

        <button type="submit">Registreer</button>
        
    </form>

<?php require 'view/components/footer.php'; ?>