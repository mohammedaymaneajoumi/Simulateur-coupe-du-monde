
<!-- 
    récupérer les données d’un formulaire envoyé via GET 
-->

<!--
    Pour créer un formulaire pour la récupération des données, 
il faut spécifier deux attributs de formulaire importants
L’attributs « method »  ... post or get
L’attributs « action » ....contine page url
<form action="" method=""> ... </form> 
-->

<!-- La ligne isset( $_GET['submit'] ) 
vérifie si le formulaire est soumis en utilisant la fonction isset(),
mais ne fonctionne que si l’input /en html/ a un attribut (name=’submit’). 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="style.css" />

</head>
<body>

<form action="index.php" method="GET" class= "d-flex-column p-3 ">

    <div class="input-group mb-3 p-3 ">
        <label for="cheese">MAROC:</label>
        <input type="number" name="a" >
        <label for="cheese">CROATIE:</label>
        <input type="number" name="b">
    </div>   
    
    <div class="input-group mb-3 p-3">
        <label for="cheese">BELQIQUE:</label>
        <input type="number"  name="c">
        <label for="cheese">CANADA:</label>
        <input type="number"  name="d">
    </div>
        
    <div class="input-group mb-3 p-3">
        <label for="cheese">MAROC:</label>
        <input type="number"  name="e">
        <label for="cheese">BELQIQUE:</label>
        <input type="number" name="f">
    </div>

    <div class="input-group mb-3 p-3">
        <label for="cheese">CROATIE:</label>
        <input type="number"  name="g">
        <label for="cheese">CANADA:</label>
        <input type="number"  name="h">
    </div>

    <div class="input-group mb-3 p-3">
        <label for="cheese">MAROC:</label>
        <input type="number"  name="i">
        <label for="cheese">CANADA:</label>
        <input type="number"  name="j">
    </div>

    <div class="input-group mb-3 p-3">
        <label for="cheese">CROATIE:</label>
        <input type="number"  name="k">
        <label for="cheese">BELQIQUE:</label>
        <input type="number"  name="l">
    </div>

    <input type="submit" name="submit" class=" m-3 "/> 
</form>

    <?php
    if ( isset( $_GET['submit'] ) ) {
    //récupérer les données du formulaire en utilisant la valeur des attributs name comme clé 
    $maro = $_GET['a']; 
    $croi = $_GET['b']; 
    $belg = $_GET['c']; 
    $cana = $_GET['d']; 
    $maro2 = $_GET['e']; 
    $belg2 = $_GET['f']; 
    $croi2 = $_GET['g']; 
    $cana2  = $_GET['h']; 
    $maro3 = $_GET['i']; 
    $cana3 = $_GET['j']; 
    $croi3 = $_GET['k']; 
    $belg3 = $_GET['l'];


    //counter 
    //tables
    // $arrayName = array('' => , );
    $point = array("MAROC" => 0, "CROATIE" => 0, "CANADA" => 0, "BELQIQUE" => 0); 
    $matches = array("MAROC" => 0, "CROATIE" => 0, "CANADA" => 0, "BELQIQUE" => 0);
    $gagnant = array('MAROC' => 0, 'CROATIE' => 0 , 'CANADA' => 0 , 'BELQIQUE' => 0);
    $null = array("MAROC" => 0 , "CROATIE" => 0, "CANADA" => 0, "BELQIQUE" => 0);
    $defaite = array("MAROC" => 0 , "CROATIE" => 0, "CANADA" => 0, "BELQIQUE" => 0);
    $goalfor = array("MAROC" => 0 , "CROATIE" => 0, "CANADA" => 0, "BELQIQUE" => 0);
    $goalin = array("MAROC" => 0 , "CROATIE" => 0, "CANADA" => 0, "BELQIQUE" => 0);

    

    //add point selon counter by if
    if($maro!="" && $croi!=""){
        
        $matches["MAROC"] += 1;
        $matches["CROATIE"] += 1;
        $goalfor["MAROC"] += $maro ;
        $goalfor["CROATIE"] += $croi ;
        $goalin["MAROC"] += $croi ;
        $goalin["CROATIE"] += $maro ;

        if($maro > $croi ){
            $point["MAROC"] += 3;
            $gagnant["MAROC"] += 1;
            $defaite["CROATIE"] += 1;

        }
        elseif ($maro < $croi ){
            $point["CROATIE"] += 3;
            $gagnant["CROATIE"] += 1;
            $defaite["MAROC"] += 1;

        }
        else {
            $point["MAROC"] += 1;
            $point["CROATIE"] += 1;
            $null["MAROC"] += 1;
            $null["CROATIE"] += 1;

        }
    }
    
    if($belg!="" && $cana!=""){

        $matches["CANADA"] += 1;
        $matches["BELQIQUE"] += 1;
        $goalfor["CANADA"] += $cana ;
        $goalfor["BELQIQUE"] += $belg ;
        $goalin["BELQIQUE"] += $cana ;
        $goalin["CANADA"] += $belg ;

        if($belg > $cana ){
            $point["BELQIQUE"] += 3;
            $gagnant["BELQIQUE"] += 1;
            $defaite["CANADA"] += 1;
            
        }
        elseif ($belg < $cana ){
            $point["CANADA"] += 3;
            $gagnant["CANADA"] += 1;
            $defaite["BELQIQUE"] += 1;
        }
        else {
            $point["BELQIQUE"] += 1;
            $point["CANADA"] += 1;
            $null["BELQIQUE"] += 1;
            $null["CANADA"] += 1;
        }
    }


    if($maro2!="" && $belg2!=""){

        $matches["MAROC"] += 1;
        $matches["BELQIQUE"] += 1;
        $goalfor["MAROC"] += $maro2 ;
        $goalfor["BELQIQUE"] += $belg2 ;
        $goalin["MAROC"] += $belg2 ;
        $goalin["BELQIQUE"] += $maro2 ;


        if($maro2 > $belg2 ){
            $point["MAROC"] += 3;
            $gagnant["MAROC"] += 1;
            $defaite["BELQIQUE"] += 1;

        }
        elseif ($maro2 < $belg2 ){
            $point["BELQIQUE"] += 3;
            $gagnant["BELQIQUE"] += 1;
            $defaite["MAROC"] += 1;

        }
        else {
            $point["MAROC"] += 1;
            $point["BELQIQUE"] += 1;
            $null["MAROC"] += 1;
            $null["BELQIQUE"] += 1;

        }
    }
    
    if($croi2!="" && $cana2!=""){

        $matches["CANADA"] += 1;
        $matches["CROATIE"] += 1;
        $goalfor["CANADA"] += $cana2 ;
        $goalfor["CROATIE"] += $croi2 ;
        $goalin["CANADA"] += $croi2 ;
        $goalin["CROATIE"] += $cana2 ;

        if($croi2 > $cana2 ){
            $point["CROATIE"] += 3;
            $gagnant["CROATIE"] += 1;
            $defaite["CANADA"] += 1;
        }
        elseif ($croi2 < $cana2 ){
            $point["CANADA"] += 3;
            $gagnant["CANADA"] += 1;
            $defaite["CROATIE"] += 1;
            
        }
        else {
            $point["CROATIE"] += 1;
            $point["CANADA"] += 1;
            $null["CROATIE"] += 1;
            $null["CANADA"] += 1;
        }
    }

    if($maro3!="" && $cana3!=""){

        $matches["MAROC"] += 1;
        $matches["CANADA"] += 1;
        $goalfor["MAROC"] += $maro3 ;
        $goalfor["CANADA"] += $cana3 ;
        $goalin["MAROC"] += $cana3 ;
        $goalin["CANADA"] += $maro3 ;

        if($maro3 > $cana3 ){
            $point["MAROC"] += 3;
            $gagnant["MAROC"] += 1;
            $defaite["CANADA"] += 1;

        }
        elseif ($maro3 < $cana3 ){
            $point["CANADA"] += 3;
            $gagnant["CANADA"] += 1;
            $defaite["MAROC"] += 1;

        }
        else {
            $point["MAROC"] += 1;
            $point["CANADA"] += 1;
            $null["MAROC"] += 1;
            $null["CANADA"] += 1;

        }
    }
    
    if($belg3!="" && $croi3!=""){

        $matches["CROATIE"] += 1;
        $matches["BELQIQUE"] += 1;
        $goalfor["CROATIE"] += $croi3 ;
        $goalfor["BELQIQUE"] += $belg3 ;
        $goalin["BELQIQUE"] += $croi3 ;
        $goalin["CROATIE"] += $belg3 ;

        if($belg3 > $croi3 ){
            $point["BELQIQUE"] += 3;
            $gagnant["BELQIQUE"] += 1;
            $defaite["CROATIE"] += 1;
        }
        elseif ($belg3 < $croi3 ){
            $point["CROATIE"] += 3;
            $gagnant["CROATIE"] += 1;
            $defaite["BELQIQUE"] += 1;
        }
        else {
            $point["BELQIQUE"] += 1;
            $point["CROATIE"] += 1;
            $null["BELQIQUE"] += 1;
            $null["CROATIE"] += 1;
        }
    }

    function cmp($a, $b) {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? 1 : -1;
    }

    uasort($point, 'cmp');
    // print_r($point);

     // those final counter into variables
    $Mfor = $goalfor["MAROC"] ;
    $Min = $goalin["MAROC"] ;
    $CRfor = $goalfor["CROATIE"];
    $CRin = $goalin["CROATIE"];
    $CNfor = $goalfor["CANADA"];
    $CNin = $goalin["CANADA"];
    $Bfor = $goalfor["BELQIQUE"];
    $Bin = $goalin["BELQIQUE"];

    // those final counter into variables 
    $diffEQ1 = $Mfor - $Min ;
    $diffEQ2 = $CRfor - $CRin ;
    $diffEQ3 = $CNfor - $CNin ;
    $diffEQ4 = $Bfor - $Bin ;


    echo "
    <table>
    <tr>
        <th>equipe</th>
        <th>point</th>
        <th>matches</th>
        <th>gagnant</th>
        <th>null</th>
        <th>defaite</th>
        <th>goalfor</th>
        <th>goalin</th>
        <th>+/-</th>

    </tr>";

    // foreach ($variable as $key => $value) {
    //     # code...
    // }
    foreach ($point as $key => $value ) {
        echo "
        <tr>
        <td>$key</td>
        <td>". $point[$key] ."</td>
        <td>". $matches[$key] ."</td>
        <td>". $gagnant[$key] ."</td>
        <td>". $null[$key] ."</td>
        <td>". $defaite[$key] ."</td>
        <td>". $goalfor[$key] ."</td>
        <td>". $goalin[$key] ."</td>
        <td></td>
    </tr>
        ";
    }
    echo 
    "
    </table>
    " ;
}

?>

</body>
</html>