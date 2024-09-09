// Initialiser EmailJS avec votre clé publique
(function() {
    emailjs.init("s9yeB6G42o-McEIxa"); // Remplacez par votre clé publique EmailJS
})();

document.getElementById('ebookForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher l'envoi classique du formulaire

    // Récupérer les données du formulaire
    const lastname = document.getElementById('lastname').value;
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;

    // Paramètres à envoyer à EmailJS (doivent correspondre aux variables de votre modèle)
    const templateParams = {
        lastname: lastname,
        name: name,
        email: email
    };

    // Envoyer l'e-mail via EmailJS
    emailjs.send('service_inferno', 'template_jln9r4r', templateParams)
        .then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
            document.getElementById('responseMessage').textContent = "un instant...";
            // Redirection vers la page de remerciement si nécessaire
            setTimeout(function() {
                window.location.href = 'thank_you.html';
            }, 2000);
        }, function(error) {
            console.log('FAILED...', error);
            document.getElementById('responseMessage').textContent = "Une erreur est survenue. Veuillez réessayer.";
        });
});
