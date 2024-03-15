console.log("bismilah");


document.addEventListener('DOMContentLoaded', (event) => {

  // Sélectionnez le bouton et la div où les informations seront affichées
  const btnFormation = document.getElementById('btnFormation');
  const btnExperiences = document.getElementById('btnExperiences');
  const btnCompetences = document.getElementById('btnCompetences');
  //const centerInfo = document.querySelector('.center-info');
   
  function showFormationForm() {
    const centerInfo = document.querySelector('.center-info');
    centerInfo.innerHTML = `
    <form> 
      <div class="formation-form">
        <input type="text" id="etablissement" placeholder="Établissement" />
        <input type="text" id="diplome" placeholder="Diplôme" />
        <input type="number" id="anneeDebut" placeholder="Année de début" />
        <input type="number" id="anneeObtention" placeholder="Année d'obtention" />
        <button onclick="ajouterFormation()">Ajouter</button>
        <button onclick="retirerFormation()">Retirer</button>
      </div>
    </form>   
    `;
  }


  function showExperiences() {
    const centerInfo = document.querySelector('.center-info');
    centerInfo.innerHTML = `
    <form> 
      <div class="experience-form">
        <input type="text" id="domaine" placeholder="Domaine" />
        <input type="text" id="nomEntreprise" placeholder="Nom de l'entreprise" />
        <input type="text" id="duree" placeholder="Durée" />
        <textarea id="autres" placeholder="Autres informations"></textarea>
        <button onclick="ajouterExperience()">Ajouter</button>
        <button onclick="retirerExperience()">Retirer</button>
      </div>
    </form>   
    `;
  }


  function showCompetences() {
    const centerInfo = document.querySelector('.center-info');
    centerInfo.innerHTML = `
     <form> 
       <div class="competences-form">
        <input type="text" id="competence" placeholder="Compétence" />
        <textarea id="descriptionCompetence" placeholder="Description de la compétence"></textarea>
        <button onclick="ajouterCompetence()">Ajouter</button>
        <button onclick="retirerCompetence()">Retirer</button>
       </div>
     </form>
    `;
  }

    
    // Ajouter un gestionnaire d'événements pour chaque bouton
    btnFormation.addEventListener('click', () => {
      showFormationForm();
      
    });
  
    btnExperiences.addEventListener('click', () => {
      showExperiences();
    });
  

    btnCompetences.addEventListener('click',()=>{
      showCompetences();
    })


    //ajout,suppression...

    function ajouterFormation() {
      // Ici vous pouvez récupérer les valeurs des champs et les envoyer à votre back-end
      // ...
    }
    
    // Fonction pour retirer la dernière compétence ajoutée (à compléter avec votre logique back-end)
    function retirerFormation() {
      // Ici vous pouvez gérer la suppression d'une compétence
      // ...
    }
    
    
    
    function ajouterExperience() {
      // Ici vous pouvez récupérer les valeurs des champs et les envoyer à votre back-end
      // ...
    }
    
    // Fonction pour retirer la dernière compétence ajoutée (à compléter avec votre logique back-end)
    function retirerExperience() {
      // Ici vous pouvez gérer la suppression d'une compétence
      // ...
    }


})
