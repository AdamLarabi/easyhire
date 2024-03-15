

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
                <a href="../pages/home.php" class="linkn">Home</a>
                    <a href="../Homepages/Apropos.html" class="linkn">About</a>
                    <a href="../Homepages/contactez.html" class="linkn">contact</a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="home">
       <div class="content">
        
        <h3 class="alae">Uploader Votre Cv</h3>
       <div class="pdf">
        <form action="../extrator/pdftotext.php" method="post" enctype="multipart/form-data">
            
            
                
                    
                    
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
    <script>var textArray = <?php echo json_encode($textArray); ?>;
    console.log(textArray);</script>
</body>
</html>
