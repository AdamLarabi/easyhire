<?php

$textArray = [];


if(isset($_POST['submit'])) {
    
    if(!empty($_FILES["pdf_file"]["name"])) {
        
        $fileName = basename($_FILES["pdf_file"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        
        $allowTypes = array('pdf');
        if(in_array($fileType, $allowTypes)) {
            
            include 'vendor/autoload.php';

            
            $parser = new \Smalot\PdfParser\Parser();

            
            $file = $_FILES["pdf_file"]["tmp_name"];

            
            $pdf = $parser->parseFile($file);

            
            $text = $pdf->getText();

            $textArray = explode("\n",$text);
            //$textArray = str_word_count($text, 1);
        } else {
            $statusMsg = '<p>only PDF file </p>';
        }
    } else {
        $statusMsg = '<p>Please select a PDF file </p>';
    }
} // Votre tableau de texte en PHP (à définir)

    $array2 = [];
    $array3 = [];
    $array4 = [];
    $array5 = [];
    $mot;

    for ($i = 0; $i < count($textArray); $i++) {
        if ($textArray[$i] == 'Competences : ') {
            $k = $i;
            $j = 0;
            $i++;
            while ($textArray[$i] != " ") {
                $array2[$j] = $textArray[$i];
                $i++;
                $j++;
            }
            break;
        }
    }

    for ($i = 0; $i < count($textArray); $i++) {
        if ($textArray[$i] == 'Duree d’ Experience : ') {
            $k = $i;
            $j = 0;
            $i++;
            while ($textArray[$i] != " ") {
                $array3[$j] = $textArray[$i];
                $i++;
                $j++;
            }
            break;
        }
    }

    for ($i = 0; $i < count($textArray); $i++) {
        if ($textArray[$i] == 'Certeficat : ') {
            $k = $i;
            $j = 0;
            $i++;
            while ($textArray[$i] != " ") {
                $array4[$j] = $textArray[$i];
                $i++;
                $j++;
            }
            break;
        }
    }

    for ($i = 0; $i < count($textArray); $i++) {
        if ($textArray[$i] == 'Education : ') {
            $k = $i;
            $j = 0;
            $i++;
            while ($textArray[$i] != " ") {
                for ($x = 0; $x < count($textArray); $x++) {
                    $array5[$j] = explode(" ", $textArray[$i]);
                }
                $mot = $array5[0][0];
                $i++;
                $j++;
                break;
            }
            break;
        }
    }
    echo "l'experience et:<br>";
    echo json_encode($array2) . "<br>";
    echo "les annes d'experience et:<br>";
    echo json_encode($array3) . "<br>";
    echo "les certificat et:<br>";
    echo json_encode($array4) . "<br>";
    echo "le diplome et:<br>";
    echo $mot . "<br>";
    echo json_encode($textArray); // Output the PHP array to console


?>

<script>
    /*
    var textArray = <?php echo json_encode($textArray); ?>;
    console.log(textArray.length);
        let array2=[];
        let array3=[];
        let array4=[];
        let array5=[];
        let mot;
        for(let i=0;i<textArray.length;i++){
            if(textArray[i]=='Competences : '){
                let k=i;
                let j=0;
                i++;
                while(textArray[i]!=" "){
                    array2[j]=textArray[i];
                    i++;
                    j++;
                }
                break;
            }
        }
        for(let i=0;i<textArray.length;i++){
            if(textArray[i]=='Duree d’ Experience : '){
                let k=i;
                let j=0;
                i++;
                while(textArray[i]!=" "){
                    array3[j]=textArray[i];
                    i++;
                    j++;
                }
                break;
            }
        }
        for(let i=0;i<textArray.length;i++){
            if(textArray[i]=='Certeficat : '){
                let k=i;
                let j=0;
                i++;
                while(textArray[i]!=" "){
                    array4[j]=textArray[i];
                    i++;
                    j++;
                }
                break;
            }
        }
        for(let i=0;i<textArray.length;i++){
            if(textArray[i]=='Education : '){
                let k=i;
                let j=0;
                i++;
                while(textArray[i]!=" "){
                    for(let x=0;x<textArray.length;x++){
                        array5[j]=textArray[i].split(" ");
                    }
                    mot=array5[0][0];
                    i++;
                    j++;
                    break;
                }
                break;
                //le mot ne prendre que les valeur licence master doctorat
            }
        }
        console.log(array2);
        console.log(array3);
        console.log(array4);
        console.log(mot);
    console.log(textArray); // Output the JavaScript array length to console
    */
</script>
