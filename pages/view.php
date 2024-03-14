<?php
include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style5.css">
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
        
       <div class="pdf">
       
        <div class="crud">
            <div class="head">
                <h2>DashBoard</h2>
                <p>Recrutement
                </p>
            </div>
            <div class="inputs">
                <input type="text" id="title" placeholder="title">
                <div class="price">
                    <input onkeyup="gettotal()" type="number"  id="price" placeholder="certificate">
                    <input onkeyup="gettotal()" type="number" id="taxes" placeholder="Experiance">
                    <input onkeyup="gettotal()" type="number" id="ads" placeholder="Competance">
                    <input onkeyup="gettotal()" type="number" id="discount" placeholder="diplome">
                    <small id="total"></small>
                    
                </div>
                
                <input type="number" id="count" placeholder="count">
            <input type="text" id="category" placeholder="category">
            <button id="submit">create</button>
                
            </div>
            <div class="outputs">
                <div class="searchblock">
                    <input onkeyup="searchdata(this.value)" type="text" id="search" placeholder="search">
                    <div class="btnsearch">
                        <button onclick="getsearchmood(this.id)" id="searchtitle"> search by title</button>
                        <button onclick="getsearchmood(this.id)" id="searchcategorie"> search by categorie</button>
                    </div>
                </div>
                <div id="deleteall">
                    
                </div>
                <div class="scroll">
                <table>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>price</th>
                        <th>taxes</th>
                        <th>ads</th>
                        <th>discount</th>
                        <th>total</th>
                        <th>category</th>
                        <th>update</th>
                        <th>delete</th>
                    </tr>
                   
                    <tbody id="tbdy">
                    
                    <?php 
 $sql = "SELECT * FROM 'users' WHERE 'id'=10";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){

    
        $id=  $row['id'];
        $firstname= $row['firstname']; 
        $lastname= $row['lastname'];
         $email= $row['email'];
        $gender=  $row['gender'];
        $password=  $row['password'];
        
       
?>
<tr>
    <td><?php $id ?></td>
    <td><?php $firstname ?></td>
    <td><?php $lastname ?></td>
    <td><?php $email ?></td>
    <td><?php $gender ?></td>
    <td><?php $password ?></td>
    
    
</tr>
   <?php }
   }else{
   echo "non";}?>        
          
    
        
        
   
        
        
        
                 
                     
                    </tbody>
                </table>
                </div>
            </div>
        </div>
       </div>
       </div>
        
    </section>
    <script src="main.js"></script>
</body>
</html>