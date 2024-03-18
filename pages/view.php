<?php
include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style7.css">
    <title>Document</title>
</head>
<body>
<header class="header">
        <nav class="nav">
            <a href="#" class="nav_logo">eazy.he</a>
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="home.php" class="linkn">Home</a>
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
                <input type="text" id="compte" placeholder="competance">
                <input type="text" id="dipl" placeholder="diplome">
                <input type="text" id="certi" placeholder="certificat">
                
                <div class="price">
                    <input onkeyup="score()" type="number"  id="price" placeholder="competance-score">
                    <input onkeyup="score()" type="number" id="taxes" placeholder="certificat-score">
                    <input onkeyup="score()" type="number" id="ads" placeholder="anne-score">
                    <input onkeyup="score()" type="number" id="discount" placeholder="diplome-score">
                    <small id="total"></small>
                    
                </div>
                
                
                
            </div>
            <div class="outputs">
                <div class="searchblock">
                    
                    <div class="btnsearch">
                        <button onclick="search()" id="searchtitle">search</button>
                        
                        
                    </div>
                </div>
                <p id="error" style=" text-align: center;
  background-color: #005af0;
  padding: 5px; border-radius : 5px; display:none;"></p>
                <div id="deleteall">
                    
                </div>
                <div class="scroll">
                <table>
                    <tr>
                        <th>id</th>
                        <th>idx</th>
                        <th>diplome</th>
                        <th>certificat</th>
                        <th>Experiance</th>
                        <th>Competance</th>
                        <th>Score</th>
                        <th>contact</th>
                        <th>delete</th>
                    </tr>
                   
                    <tbody id="tbdy">
                    
                    <?php 
 $sql = "SELECT * FROM lire_cv";
 $result = $conn->query($sql);
 
 $cvData = array();
 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
         $id = $row['id_li'];
         $firstname = $row['idc']; 
         $lastname = $row['diplom'];
         $email = $row['certificat'];
         $gender = $row['ann_exp'];
         $password = $row['competence'];
         $cvData[] = $row;
         $cvDataJSON = json_encode($cvData);

        }
    } else {
        echo "Aucune donnée disponible.";
    }
echo "<script>var cvData = " . $cvDataJSON . ";</script>";
 ?>
 
 
 
 <script>
let compte = document.getElementById("compte");
let certi = document.getElementById("certi");
let dipl = document.getElementById("dipl");

let competance = document.getElementById("price");
let certificat = document.getElementById("taxes");
let anne = document.getElementById("ads");
let diplom = document.getElementById("discount");
let total = document.getElementById("total");

 let cvArray = [];

// Vérifier si les données sont présentes
if (typeof cvData !== 'undefined') {
    // Parcourir les données récupérées depuis PHP
    for (let i = 0; i < cvData.length; i++) {
        // Créer un objet CV à partir des données
        let cv = {
    id: cvData[i]['id_li'],
    idc: cvData[i]['idc'],
    diplom: cvData[i]['diplom'],
    certificat: cvData[i]['certificat'],
    ann_exp: cvData[i]['ann_exp'],
    competence: cvData[i]['competence'],
    score: {
        scom: null,
        scer: null,
        sdip: null,
        sann: null,
        stotal: null
    }
};


        // Ajouter l'objet CV au tableau
        cvArray.push(cv);
    }
    console.log(cvArray); 
} else {
    console.log("Aucune donnée disponible.");
}
function redirectToEmail(email) {
        window.location.href = "mailto:" + email;
    }
function showdata(){
    let table = '';
    for(let i = 0; i < cvArray.length; i++){
       
        table += `<tr>
            <td>${i}</td>
            <td>${cvArray[i].idc}</td>
            <td>${cvArray[i].diplom}</td>
            <td>${cvArray[i].certificat}</td>
            <td>${cvArray[i].ann_exp}</td>
            <td>${cvArray[i].competence}</td>
            <td></td>
            <td><button onclick="redirectToEmail('${cvArray[i].idc}')" style ="padding:10px;">email</button></td>
            
        </tr>`;
    }
    document.getElementById("tbdy").innerHTML = table;
    // Faites quelque chose avec la variable "table", par exemple, l'insérer dans votre tableau HTML
}
function redirectToEmail(email) {
        window.location.href = "mailto:" + email;
    }
showdata()
function gettotal(){
    if(parseFloat(competance.value)<=10 ||(parseFloat(anne.value)<=10)||(parseFloat(anne.value)<=10)||(parseFloat(diplom.value)<=10)){
        let result = (+comptance.value + +diplom.value + +certificat.value + +anne.value);
    total.innerHTML = result
    total.style.background = "green"
    }
    else{
        total.innerHTML = 'les champes doit etre inf a 10';
        total.style.background ="red"; 
    }
}

// Parcourez chaque objet dans cvArray
function splice1(j, data) {
    let comp = cvArray[j].competence.split(":").map(skill => skill.trim().toLowerCase());
    let coms = [];

    for (let i = 0; i < comp.length; i++) {
        let skills = comp[i].split(",").map(skill => skill.trim().toLowerCase());
        coms = coms.concat(skills);
    }

    return coms.includes(data.toLowerCase());
}

for (let i = 0; i < cvArray.length; i++) {
        if (competance.value !== '') {
            if(title.value !=""){
                if(splice1(i,title.value)){
                    cvArray[i].score.scom=competance.value;
                }

            }
        }}



function score() {
    for (let i = 0; i < cvArray.length; i++) {
        cvArray[i].score = {
            scom: 0,
            scer: 0,
            sdip: 0,
            sann: 0,
            stotal: 0
        };
    }

    for (let i = 0; i < cvArray.length; i++) {
        if (competance.value !== '') {
            if(compte.value !=""){
                if(splice1(i,compte.value)){
                    cvArray[i].score.scom=parseFloat(competance.value);
                }

            }
            else{
                if(cvArray[i].competence!=""){
                cvArray[i].score.scom=parseFloat(competance.value)+cvArray[i].competence.split(',').length;  
            }}
        }


        if (diplom.value !== '') {
            if(dipl.value !=""){
                if(dipl.value==cvArray[i].diplom){
                    cvArray[i].score.sdip=parseFloat(diplom.value);
                }

            }
            else{
                if(cvArray[i].diplom!=""){
                cvArray[i].score.scom=parseFloat(diplom.value)+cvArray[i].diplom.split(',').length;  
            }}}
        

        if (anne.value !== '') {
    if (cvArray[i].ann_exp !== "") {
        let sana = cvArray[i].ann_exp.split(" ");
        // Vérifier si la deuxième partie de la chaîne est un nombre valide
        if (!isNaN(parseFloat(sana[0]))) {
            // Multiplier cvArray[i].score.sann par la deuxième partie de la chaîne
            cvArray[i].score.sann = parseFloat(sana[0])+parseFloat(anne.value);
        } else {
            // Si la deuxième partie n'est pas un nombre valide, ne pas effectuer de multiplication
            cvArray[i].score.sann = 0;
        }
    }
}

        if (certificat.value !== '') {
            if(certi.value !=""){
                if(splice1(i,title.value)){
                    cvArray[i].score.scer=parseFloat(certificat.value);
                }

            }
            else{
                if(cvArray[i].certificat!=""){
                cvArray[i].score.scom=parseFloat(certificat.value)+cvArray[i].certificat.split(',').length;  
            }}
        }

        cvArray[i].score.stotal = (cvArray[i].score.scer + cvArray[i].score.sdip + cvArray[i].score.sann + cvArray[i].score.scom) / 4;
    }
}





// Trier le tableau cvArray en fonction du score


function search(){
    if((competance.value!="" &&parseFloat(competance.value)<=10 )||(anne.value!="" &&parseFloat(anne.value)<=10)||(certificat.value!="" && parseFloat(anne.value)<=10)||(diplom.value!="" && parseFloat(diplom.value)<=10)){
    let table = '';
cvArray.sort((a, b) => b.score.stotal - a.score.stotal);
for(let i=0;i<cvArray.length;i++){
  
    table += `<tr>
            <td>${i}</td>
            <td>${cvArray[i].idc}</td>
            <td>${cvArray[i].diplom}</td>
            <td>${cvArray[i].certificat}</td>
            <td>${cvArray[i].ann_exp}</td>
            <td>${cvArray[i].competence}</td>
            <td>${cvArray[i].score.stotal}</td>
            <td><button onclick="redirectToEmail('${cvArray[i].idc}')" style ="padding:10px;">e-mail</button></td>

            
        </tr>`;
   
  cvArray.sort((a, b) => b.score.stotal - a.score.stotal);
}
document.getElementById("tbdy").innerHTML = table;

}
else if(parseFloat(competance.value)>=10 ||(parseFloat(anne.value)>=10)||(parseFloat(anne.value)>=10)||(parseFloat(diplom.value)>=10)){
    let par = document.getElementById("error");
    par.innerHTML="les champs doivent etre inf a 10";
    par.style.display="block";
    showdata();

}
else if(parseFloat(competance.value)<=10 ||(parseFloat(anne.value)<=10)||(parseFloat(anne.value)<=10)||(parseFloat(diplom.value)<=10)){
    let par = document.getElementById("error");
    par.innerHTML="";
    par.style.display="none";
    showdata();
    
}else{
    showdata();
}


}

</script>
 
         
         
    
        
        
   
        
        
        
                 
                     
                    </tbody>
                </table>
                </div>
            </div>
        </div>
       </div>
       </div>
        
    </section>
    <script src=""></script>
</body>
</html>