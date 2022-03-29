<?php require 'view/components/header.php';?>

    <h1>
        Update Form
    </h1>
<form action="index.php?con=products&op=update&id=<?= $html['product_id'] ?>" method="POST" enctype="multipart/form-data">

        <div>
            <label>Product Name:</label>
            <input type="text" name="name" value="<?= $html['product_name'] ?>">
        </div>

        <div>
            <label>Product details:</label> 
            <textarea name='other_product_details' id='other_product_details'><?= $html['other_product_details']; ?></textarea>
        </div>

        <div>
            <label>Product Price:</label>
            <input type="text" name="email" value="<?= $html['product_price'] ?>">
        </div>

        <div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>


    </div>
    </div>
    <?php require 'view/components/mceFooter.php';?>