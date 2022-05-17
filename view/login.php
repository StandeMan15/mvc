<?php require 'view/components/header.php'; ?>

    <form action='index.php?con=auth&op=login' method="POST"> 

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required><br>

        <button type="submit">Login</button>
    </form>

<?php require 'view/components/footer.php'; ?>