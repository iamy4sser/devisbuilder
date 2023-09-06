var bouton = document.getElementById('ajouterLigne');
var tableau = document.getElementById('tableau').getElementsByTagName('tbody')[0];

bouton.addEventListener('click', function() {
    event.preventDefault();
    var nouvelleLigne = tableau.insertRow(tableau.rows.length);
    var celluleDescription = nouvelleLigne.insertCell(0);
    var celluleTache = nouvelleLigne.insertCell(1);
    var cellule = nouvelleLigne.insertCell(2);
    var celluleDated = nouvelleLigne.insertCell(3);
    var celluleDatef = nouvelleLigne.insertCell(4);

    // Créer des éléments d'entrée pour chaque cellule
    var inputDescription = document.createElement('input');
    inputDescription.type = 'text';
    inputDescription.name = 'tbdescription[]';
    inputDescription.style.padding = '5px';
    inputDescription.style.width = '100%';
    inputDescription.style.border = 'none';
    celluleDescription.appendChild(inputDescription);

    var inputTache = document.createElement('input');
    inputTache.type = 'text';
    inputTache.name = 'tbtache[]';
    inputTache.style.padding = '5px';
    inputTache.style.width = '100%';
    inputTache.style.border = 'none';
    celluleTache.appendChild(inputTache);
    
    
    var inputSelect = document.createElement('input');
    inputSelect = document.createElement('select');
    inputSelect.innerHTML = `
                            <option disabled selected>Choisissez le profil souhaité</option>
                            <option name="2000">Pilote d\`exploitation</option>
                            <option name="3200">Ingenieur systeme</option>
                            <option name="2466">stockage et sauvegarde</option>
                            <option name="2234">Administrateur SGBD</option>
                            <option name="4432">Ingenieur d\`application</option>
                            <option name="3243">Ingenieur reseau</option>
                            <option name="4555">Chef de projet senior</option>
                            <option name="7645">Consultant senior systeme</option>
                            <option name="2345">Consultant senior base de donnees</option>
                            <option name="3432">Consultant senior reseaux/securite</option>
                            <option name="2352">Consultant senior San/Backup</option>
                            <option name="9666">Consultant senior virtualisation</option>
    `;
    inputSelect.name = 'profil[]';  
    inputSelect.style.padding = '5px';
    inputSelect.style.width = '100%';
    cellule.appendChild(inputSelect);

    var inputDated = document.createElement('input');
    inputDated.type = 'date';
    inputDated.name = 'tbdated[]';
    inputDated.style.padding = '5px';
    celluleDated.appendChild(inputDated);

    var inputDatef = document.createElement('input');
    inputDatef.type = 'date';
    inputDatef.name = 'tbdatef[]';
    inputDatef.style.padding = '5px';
    celluleDatef.appendChild(inputDatef);
});