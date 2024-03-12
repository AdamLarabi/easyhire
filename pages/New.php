<?php

$textArray = [];


if(isset($_POST['submit'])) {
    
    if(!empty($_FILES["pdf_file"]["name"])) {
        
        $fileName = basename($_FILES["pdf_file"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        
        $allowTypes = array('pdf');
        if(in_array($fileType, $allowTypes)) {
            
            include '../extrator/vendor/autoload.php';

            
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
}
?>


<script>
    
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
</script>

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
