<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/style.css">
    <title>Document</title>
</head>
<body>
    <?php require 'view/components/header.php';?>

    <h1>
        Create Form
    </h1>
    <form action="index.php?con=contacts&op=create" method="POST" enctype="multipart/form-data">
    <div>
        <label>Name:</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Phone:</label>
        <input type="number" name="phone">
    </div>
    
    <div>
        <label>Email:</label>
        <input type="email" name="email">
    </div>

    <div>
        <label>Address:</label>
        <textarea name="location"></textarea>
    </div>

    <div>
        <label>Avatar uploaden:</label>
        <input type="file" name="file">
    </div>

    <div>
        <input type="reset">
        <input type="submit" name="submit" value="Submit">
    </div>
  </form>


    </div>
</div>
<?php require 'view/components/footer.php';?>
    
</body>
</html>