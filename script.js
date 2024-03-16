// Requête POST pour addOpportunités
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

// Requête pour addEvenements

