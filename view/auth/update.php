<?php
require 'view/components/header.php'; 
echo $firstname;?>

    <form action='index.php?con=auth&op=editregister' method="POST"> 
        
        <div class="row">
        <div class="col-6"><label for="id"><b>ID</b></label></div>
            <div class="col-6"><input type="text" placeholder="<?= $id ?>" name="id" style="width: 50%;" readonly><br></div>

            <div class="col-6"><label for="uname"><b>Username</b></label></div>
            <div class="col-6"><input type="text" placeholder="<?= $username ?>" name="uname" style="width: 50%;"><br></div>

            <div class="col-6"><label for="fname"><b>Firstname</b></label></div>
            <div class="col-6"><input type="text" placeholder="<?= $firstname ?>" name="fname" style="width: 50%;"><br></div>

            <div class="col-6"><label for="lname"><b>Lastname</b></label></div>
            <div class="col-6"><input type="text" placeholder="<?= $lastname ?>" name="lname" style="width: 50%;"><br></div>

            <div class="col-6"><label for="email"><b>Email</b></label></div>
            <div class="col-6"><input type="text" placeholder="<?= $email ?>" name="email" style="width: 50%;"><br></div>
        </div>

        <button type="submit">Bevestig wijzigingen</button>
        
    </form>

<?php require 'view/components/footer.php'; ?>