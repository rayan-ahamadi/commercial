// Requête POST pour addOpportunités
if (document.querySelector('#post-opp')){
  document.querySelector('#post-opp').addEventListener('submit', (e) => {
    e.preventDefault();
    
    const form = document.querySelector('#post-opp');
    const formData = new FormData(form);
    const responseP = document.querySelector('#response');


    fetch("../controller/oppController.php", {
      method: "POST",
      // Pour faire une chaine de requête : application/x-www-form-urlencoded pour que php (controller.php) puisse lire les données
      headers : {'Content-Type': 'application/x-www-form-urlencoded',
                  'ACTION': 'post_opp'},
      body: new URLSearchParams(formData).toString() 
    }).then(response => {
      if (!response.ok) {
        throw new Error('Erreur lors de la requête');
      }
      return response.text();
    })
    .then(data => {
      console.log(data); 
      responseP.textContent = "Opportunité ajoutée avec succès";
      responseP.style.color = "green";

    })
    .catch(error => {
      console.error('Erreur:', error);
      responseP.textContent = "Erreur lors de l'ajout de l'opportunité";
      responseP.style.color = "red";
    });
      
    
  });
}

// Requête POST pour addEvent

if(document.querySelector('#post-event')){
  document.querySelector('#post-event').addEventListener('submit', (e) => {
    e.preventDefault();
    
    const form = document.querySelector('#post-event');
    const formData = new FormData(form);
    const responseP = document.querySelector('#response');


    fetch("../controller/eventController.php", {
      method: "POST",
      // Pour faire une chaine de requête : application/x-www-form-urlencoded pour que php (controller.php) puisse lire les données
      headers : {'Content-Type': 'application/x-www-form-urlencoded',
                  'ACTION': 'post_event'},
      body: new URLSearchParams(formData).toString() 
    }).then(response => {
      if (!response.ok) {
        throw new Error('Erreur lors de la requête');
      }
      return response.text();
    })
    .then(data => {
      console.log(data); 
      responseP.textContent = "événement ajoutée avec succès";
      responseP.style.color = "green";

    })
    .catch(error => {
      console.error('Erreur:', error);
      responseP.textContent = "Erreur lors de l'ajout de l'événement";
      responseP.style.color = "red";
    });     
  });
}

// Requête POST pour modif_opp

if (document.querySelector('#put-opp')){
  document.querySelector('#put-opp').addEventListener('submit', (e) => {
    e.preventDefault();
    
    const form = document.querySelector('#put-opp');
    const formData = new FormData(form);
    const responseP = document.querySelector('#response');


    fetch("../controller/oppController.php", {
      method: "POST",
      // Pour faire une chaine de requête : application/x-www-form-urlencoded pour que php (controller.php) puisse lire les données
      headers : {'Content-Type': 'application/x-www-form-urlencoded',
                  'ACTION': 'put_opp'},
      body: new URLSearchParams(formData).toString() 
    }).then(response => {
      if (!response.ok) {
        throw new Error('Erreur lors de la requête');
      }
      return response.text();
    })
    .then(data => {
      console.log(data); 
      responseP.textContent = "Opportunité ajoutée avec succès";
      responseP.style.color = "green";

    })
    .catch(error => {
      console.error('Erreur:', error);
      responseP.textContent = "Erreur lors de l'ajout de l'opportunité";
      responseP.style.color = "red";
    });
      
    
  });
}

// Requête DELETE pour delete_opp

if (document.querySelector('#delete-opp')){
  document.querySelector('#delete-opp').addEventListener('click', (e) => {
    e.preventDefault();
    idValue = document.querySelector('#delete-opp').getAttribute('data-id');

    if(confirm(`Voulez vous vraiment supprimer l'opportunité à l'id : ${idValue} ?`)){
      fetch("../controller/oppController.php", {
        method: "POST",
        // Pour faire une chaine de requête : application/x-www-form-urlencoded pour que php (controller.php) puisse lire les données
        headers : {'Content-Type': 'application/x-www-form-urlencoded',
                    'ACTION': 'delete_opp'},
        // Cette fois, on envoie une seule donnée (id), donc pas besoin de FormData
        body: new URLSearchParams(`id=${idValue}`).toString() 
      }).then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la requête');
        }
        return response.text();
      })
      .then(data => {
        console.log(data); 
        alert("Opportunité supprimée avec succès");
        location.reload();
      })
      .catch(error => {
        console.error('Erreur:', error);
        alert("Erreur lors de la suppression de l'opportunité");
      });
    }
    
  });
}