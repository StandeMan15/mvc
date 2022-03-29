<?php require 'view/components/header.php';?>


    <form action="index.php?con=products&op=delete&id=<?=$html['product_id']?>" method="POST">
    
    <input type="submit" name="submit" value="JA">
    
    <a href="index.php"> Nee</a>

  </form>


    </div>
</div>
<?php require 'view/components/footer.php';?>