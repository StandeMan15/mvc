<?php

class Display{

  public function CreateTable($result, $actionMode = false, $checkbox = false){

    $tableheader = false;
    $html = "";
    if($checkbox) {
      $html .= "<form action='?con={$_GET['con']}&op=delete&id={$row['id']}' method='POST'>";
    }

    $html .= "<table class='table table-hover table-responsive-sm'>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      if ($tableheader == false) {
        $html .= "<tr>";
        if($checkbox) {
          $html .= "<th><input type='checkbox' onClick='toggle(this)'></th>";
        }
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
      if($checkbox) {
        $html .= "<td><input type='checkbox' name='delete' value={$row['id']}></td>";
      }
        foreach($row as $value){
          $html .= "<td>{$value}</td>";
          //var_dump($value);
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
    if($checkbox) {
      $html .= "</form>";
    }
    return $html;
  }

  public function CreateCard($result)
  {

    $result = $result->fetch(PDO::FETCH_ASSOC);
    $html = '';

    $html .= "<div class='container'>";
    $html .= "<div class='row'>";
    foreach ($result as $key=> $value) {
      $html .= "<div class='col-3'></div>";

      $html .= "<div class='col-3'>";
      $html .= $key . ":";
      $html .= "</div>";

      $html .= "<div class='col-3'>";
      $html .= $value;
      $html .= "</div>";

      $html .= "<div class='col-3'></div>";
    }

    $html .= "</div>";
    $html .= "</div>";

    return $html;
  }

  public function CreateBlogPost($result)
  {
    $result = $result->fetch(PDO::FETCH_ASSOC);

    $html = '';



    return $html;
  }

  public function PageNavigation($pages,$page) {
    $previous = $page - 1;
    $next = $page + 1;
    $pageNumber = $page;

    $html = "";
    $html .= "<nav class='mt-4'>";

    $html .= "<ul class='pagination'>";
        if ($page == 1) {

        } else {
            $html .= "<li class='link page-item'><a class='page-link' href='?con={$_GET['con']}&page=$previous'><i class='fa fa-backward' aria-hidden='true'></i></a></li>";
        }

        for ($x = ($pageNumber -2); $x <= ($pageNumber +2); $x++) {
            if ($x <1) {
                continue;
            }
            if ($pageNumber > $pages) {
                break;
            }
            if ($x > $pages) {
                continue;
            }
            if ($page == $x) {

                $html .= "<li class='link page-item active'><a class='page-link' href='?con={$_GET['con']}&page=$x '>$x <span class=sr-only>(current)</span></a></li>";

            } else {

                $html .= "<li class='link page-item'><a class='page-link' href='?con={$_GET['con']}&page=$x '>$x </a></li>";
            }
        }

        if ($page == $pages) {

        } else {
            $html .= "<li class='link page-item'><a class='page-link' href='?con={$_GET['con']}&page=$next'><i class='fa fa-forward' aria-hidden='true'></i></a></li>";
        }

    $html .= "</ul>";
$html .= "</nav>";

  return $html;
}

  public function CreateHeader($jsonheader)
  {
   $html = "";
    if(isset($_SESSION['loggedin']) === true) {

      foreach ($jsonheader as $key=>$value) {
        $html .= "<a href=" . $value->url . ">" . $value->name . "</a>";
      }
    }
    return $html;
  }
}

?>

<script>
  function toggle(source) {
  checkboxes = document.getElementsByName('delete');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>