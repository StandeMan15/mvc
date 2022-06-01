<?php

class Display{

  public function CreateTable($result, $actionMode = false){
    //        die(var_dump($actionMode));

    $tableheader = false;
    $html = "";
    $html .= "<table class='table table-hover table-responsive-sm'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      
      if ($tableheader == false) {
        $html .= "<tr>";
        foreach ($row as $key => $value) {
          $html .= "<th>{$key}</th>";
        }
        if ($actionMode) {
          $html .= "<th>Actions</th>";
        }
        $html .= "</tr>";
        $tableheader = true;
      }

      $html .= "<tr>";

      foreach($row as $value){
        $html .= "<td>{$value}</td>";
    }

      if ($actionMode) {
        $html .= "<td style='display: flex; justify-content: space-between;'>";
        $html .= "<a href='?con={$_GET['con']}&op=update&id={$row['id']}'><i class='fa fa-edit'></i></a>";
        $html .= "<a href='?con={$_GET['con']}&op=delete&id={$row['id']}'><i class='fa fa-trash'></i></a>";
        $html .= "<a href='?con={$_GET['con']}&op=read&id={$row['id']}'><i class='fa fa-eye'></i></a>";
        $html .= "</td>";
      }
      $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
  }



  public function CreateCardContact($result){

    $result = $result->fetch(PDO::FETCH_ASSOC);

    $html = '';

    $html .= "<div class='card'>";
    $html .= "<img src='view/assets/image/{$result['avatar']}' alt='Avatar' style='width:100%'>";
    $html .= "<div class='container'>";
    $html .= "<h4><b>{$result['name']}</b></h4>";
    $html .= "<p>{$result['phone']}</p>";
    $html .= "<p>{$result['email']}</p>";
    $html .= "<p>{$result['location']}</p>";
  
    $html .= "</div>";
    $html .= "</div>";

    return $html;

  }

  public function CreateCardProduct($result){

    $result = $result->fetch(PDO::FETCH_ASSOC);

    $html = '';

    $html .= "<div class='card'>";
    $html .= "<div class='container'>";
    $html .= "<h4><b>{$result['product_name']}</b></h4>";
    $html .= "<p>{$result['product_price']}</p>";
  
    $html .= "</div>";
    $html .= "</div>";

    return $html;

  }

  public function CreateCardContent($result){

    $result = $result->fetch(PDO::FETCH_ASSOC);

    $html = '';

    $html .= "<div class='card'>";
    //$html .= "<img src='view/assets/image/{$result['avatar']}' alt='Avatar' style='width:100%'>";
    $html .= "<div class='container'>";
    $html .= "<h4><b>{$result['content_name']}</b></h4>";
    $html .= "<p>{$result['content_type']}</p>";
    $html .= "<p>{$result['content_html']}</p>";
    $html .= "<p>{$result['content_url']}</p>";
  
    $html .= "</div>";
    $html .= "</div>";

    return $html;

  }

  public function PageNavigation($pages, $page){

    $html = "";
    $html .= "<nav class='mt-4'>";

    $html .= "<ul class='pagination'>";
        for ($x = 1; $x <= $pages; $x++) {
            if ($page == $x) {

                $html .= '<li class="link page-item active"><a class="page-link" href="?con=products&page=' . $x . '">' . $x . '<span class="sr-only">(current)</span></a></li>';
            
            } else {

                $html .= '<li class="link page-item"><a class="page-link" href="?con=products&page=' . $x . '">' . $x . '</a></li>';
            }
        }
    $html .= "</ul>";
$html .= "</nav>";

  return $html;


  }

  public function CreateHeader($jsonheader)
  {
   
    if(isset($_SESSION['loggedin']) === true) {

      foreach ($jsonheader as $key=>$value) {
        return "<a href=" . $value->name . ">" . $value->url . "</a>"; 
      } 
    }    
  }
}

?>