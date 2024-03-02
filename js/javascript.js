document.getElementById('add-formation').addEventListener('click', function() {
    const container = document.getElementById('formation-container');
    const newEntry = document.createElement('div');
    newEntry.classList.add('formation-entry');
    newEntry.innerHTML = `
      <input type="text" placeholder="Nom de l'établissement" class="formation-input"/>
      <input type="text" placeholder="Diplôme obtenu" class="formation-input"/>
      <input type="text" placeholder="Année" class="formation-input"/>
    `;
    container.appendChild(newEntry);
  });
  