<?php
require 'view/components/header.php';

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

?>

<a href="?con=auth&op=delete"><button type="button" class="btn btn-danger">Verwijder</button></a>
<a href="<?= $previous ?>"><button type="button" class="btn btn-secondary">Terug</button></a>


<?php require 'view/components/footer.php'; ?>