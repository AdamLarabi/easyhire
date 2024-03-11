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
            echo $text;

            
            $textArray = str_word_count($text, 1);
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
    console.log(textArray[1]); 
</script>
