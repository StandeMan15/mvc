<?php

require_once "model/DataHandler.php";


class ZooLogic {

  public function __construct()
  {
    $this->DataHandler = new Datahandler("localhost", "mysql", "mvc", "root", "");
    //$this->FileUpload = new FileUpload();
  }

  public function __destruct(){

  }

  public function calculateCosts() {

    $current_date = 2022-05-11;
    $standard_date = 2010-05-11;

    $notmarried = false;
    $married = false;
    $adult_count = 0;
    $family_children_count = 0;

      foreach($_POST as $key=>$value) {
        if(str_contains($key, 'notmarried')) {
          $notmarried = true;
          $notmarriedage = date_diff(date_create($value), date_create($current_date));
        }
        if(str_contains($key, 'married')) {
          $married = true;
          $marriedage = date_diff(date_create($value), date_create($current_date));
        }
        if(str_contains($key,'adult')) {
          $adult_count++;
          $adultage = date_diff(date_create($value), date_create($current_date));
        }
        if(str_contains($key,'family')) {
          $family_children_count++;
          $childage = date_diff(date_create($value), date_create($current_date));

        }
      }

      $temp_costs = 0;

      // kijk naar hoeveel kinderen er in het gezin zitten afhankelijk daarvan bepaal je de prijs
      if ($family_children_count == "1") {
        $temp_costs += 71;
      } elseif ($family_children_count == "2") {
        $temp_costs += 82;
      } elseif ($family_children_count > "2") {
        $temp_res = ($family_children_count - 2);
        $temp_costs += (82 + ($temp_res * 11));
      } else {
        $temp_costs += $temp_costs;
      }
      // echo "<pre>";
      // var_dump($adultage);

      //  kijk naar hoeveel volwassenen er zijn, en of ze 65+ zijn of niet daarvan bepaal je de prijs
      if (($marriedage < "65") && ($married)) {
        $temp_costs += 61;

      } elseif (($marriedage > "65") && ($married)) {
        $temp_costs += 65;

      } elseif (($marriedage < "65") && ($notmarried)) {
        $temp_costs += (30 * $adult_count);

      } elseif (($marriedage > "65") && ($notmarried)) {
        $temp_costs += (26 * $adult_count);

      } else {
        $temp_costs += $temp_costs;
      }



      if (($adult_count == 1) && ($adultage < "65")) {
        $temp_costs += 30;
      } elseif (($adult_count == 1) && ($adultage > "65")) {
        $temp_costs += 26;
      } elseif (($adult_count == 2) && ($adultage < "65")) {
        $temp_costs += 61;
      } elseif (($adult_count == 2) && ($adultage > "65")) {
        $temp_costs += 65;
      } elseif (($adult_count > 2) && ($agadultagee > "65")) {
        $temp_res = $adult_count - 2;
        $temp_costs += 65 + ($temp_res * 26);
      } else {
        $temp_costs = $temp_costs;
      }

      //zet het tijdelijke bedrag om naar een vast bedrag, die je niet meer mag aanpassen
      $result = $temp_costs;
      return $result;
  }

}