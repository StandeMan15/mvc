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
    <?php require 'view/components/header.php'; ?>

    <h1>
        Update Form
    </h1>
    <form action="index.php?con=contacts&op=update&id=<?= $html['id'] ?>" method="POST" enctype="multipart/form-data">

        <div>
            <label>Avatar:</label>
            <img src='view/assets/image/<?= $html['avatar'] ?>' alt='Avatar' style='width:10%'>
        </div>

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="<?= $html['name'] ?>">
        </div>

        <div>
            <label>Phone:</label>
            <input type="number" name="phone" value="<?= $html['phone'] ?>">
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $html['email'] ?>">
        </div>

        <div>
            <label>Address:</label>
            <input type="text" name="location" value="<?= $html['location'] ?>">
        </div>

        <div>
            <label>Avatar uploaden:</label>
            <input type="file" name="file" value="<?= $html['avatar'] ?>">
        </div>

        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>


    </div>
    </div>
    <?php require 'view/components/footer.php'; ?>

</body>

</html>