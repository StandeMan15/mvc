<?php require 'view/components/header.php';?>

<h1>
    Dierentuin Abonnement
</h1>

<form action="index.php?con=zoo&op=calculateCosts" method="post">
    <label for="adult">Aantal volwassenen</label><br>
    <input onkeyup="createFieldsAdult(this.value,'adult')" type="number" max="8" id="adult" placeholder="Aantal volwassenen">
    <div id="result_adult"></div>

    <!-- <label for="couple">Aantal Echtparen</label><br>
    <input onkeyup="createFieldsCouple(this.value,'couple')" type="number" max="8" id="couple" placeholder="Aantal echtparen">
    <div id="result_couple"></div> -->

    <input type="radio" id="notmarried" name="notmarried" value="ongehuwd">
    <label for="notmarried">Ongehuwd</label><br>
  
    <input type="radio" id="married" name="married" value="gehuwd">
    <label for="married">Gehuwd</label><br> 

    <label for="family">Gezin met kinderen</label><br>
    <input onkeyup="createFieldsFamily(this.value,'family')" type="number" max="8" id="family" placeholder="Aantal Kinderen">
    <div id="result_family"></div>

    <input type="submit" value="Submit"><br>
</form>

</div>
</div>

<script>

    function createFieldsAdult(value, person){
        boxes = "";
        var adult = document.getElementById("adult").value;
        for(i=0 ;i <value; i++) {
            boxes += `<input id="adult_${i}" name="adult_${i}" type="date" required>`;
           // boxes += '<b>Volwassene ' + (i+1) + '</b>: <input type="date" id="adult' + i + ' name="box' + i + ' /><br/>';
        }
        console.log(boxes);
        document.getElementById("result_adult").innerHTML = boxes;
    }

    // function createFieldsCouple(value, person){
    //     boxes = "";
    //     var couple = document.getElementById("couple").value;
    //     for(i=0 ;i <value; i++) {
    //         boxes += `<input id="couple_${i}" name="family_${i}" type="date" required>`;
    //         boxes += `<input id="couple_${i}" name="family_${i}" type="date" required>`;
    //         // boxes += '<b>Echtpaar ' + (i+1) + '</b>: <input type="date" id="couple'  + i + ' name="box' + i + ' /><br/>';
    //         // boxes += '<b>Echtpaar ' + (i+1) + '</b>: <input type="date" id="couple' + i + ' name="box' + i + ' /><br/>';
    //     }
    //     console.log(boxes);
    //     document.getElementById("result_couple").innerHTML = boxes;
    // }

    function createFieldsFamily(value, person){
        boxes = "";
        var family = document.getElementById("family").value;
        for(i=0 ;i <value; i++) {
            boxes += `<input id="family_${i}" name="family_${i}" type="date" required>`;
            //boxes += '<b>Kind ' + (i+1) + '</b>: <input type="date" id="family'  + i + ' name="box' + i + ' /><br/>';
        }
        console.log(boxes);
        document.getElementById("result_family").innerHTML = boxes;
    }

</script>
<?php require 'view/components/footer.php';?>
