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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style10.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="#" class="nav_logo">eazy.he</a>
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="#" class="linkn">Home</a>
                    <a href="#" class="linkn">About</a>
                    <a href="#" class="linkn">contact</a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="home">
       <div class="content">
        
        <h3 class="alae">Uploader Votre Cv</h3>
       <div class="pdf">
        <form action="New.php" method="post" enctype="multipart/form-data">
            
            
                
                    
                    
                        <div class="upl">
                            <header>
                                <h4>Select File here</h4>
                            </header>
                            <p>Files Supported: PDF</p>
                            <input type="file" class="form-control" required name="pdf_file">
                        
                        </div>
               
                <button type="submit" class="btn btn-primary btn2" name="submit">Extract Text</button>
            
        </form>
       </div>
       </div>
        
    </section>
</body>
</html>
