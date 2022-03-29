<?php require 'view/components/header.php';?>

    <h1>
        Create Form
    </h1>
    <form action="index.php?con=content&op=create" method="POST">
    <div>
        <label>Product name:</label>
        <input type="text" name="product_name">
    </div>

    <div>
        <label>Product price:</label>
        <input type="text" name="product_price">
    </div>
    
    <div>
        <label>supplier ID:</label>
        <input type="text" name="supplier_id">
    </div>

    <div>
        <label>Product type code:</label>
        <input type="text" name="product_type_code">
    </div>

    <div>
        <label>Other product details:</label>
        <textarea id="other_product_details" type="text" name="other_product_details"></textarea>
    </div>

    <div>
        <input type="reset">
        <input type="submit" name="submit" value="Submit">
    </div>
  </form>


    </div>
</div>
<?php require 'view/components/mceFooter.php';?>