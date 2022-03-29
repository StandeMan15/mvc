<?php require 'view/components/header.php';?>

    <h1>
        Update Form
    </h1>
<form action="index.php?con=content&op=update&id=<?= $html['id'] ?>" method="POST" enctype="multipart/form-data">

        <div>
            <label>Content Name:</label>
            <input type="text" name="name" value="<?= $html['product_name'] ?>">
        </div>

        <div>
            <label>Content details:</label> 
            <textarea name='other_product_details' id='other_product_details'><?= $html['other_product_details']; ?></textarea>
        </div>

        <div>
            <label>content:</label>
            <input type="text" name="email" value="<?= $html['product_price'] ?>">
        </div>

        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>


    </div>
    </div>
    <?php require 'view/components/mceFooter.php';?>