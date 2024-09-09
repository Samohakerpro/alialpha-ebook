<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations du formulaire
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));

    // Vérifier que les champs ne sont pas vides
    if (!empty($lastname) && !empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Définir l'adresse de l'expéditeur et le sujet de l'email
        $from = 'alialpha-fr@protonmail.com'; // Remplacez par votre domaine
        $subject = "lien de téléchargement de l'eBook";

        // Corps de l'email
        $message = "
        Bonjour/Bonsoir $name,

        Merci d'avoir téléchargé notre eBook ! Vous pouvez le télécharger en suivant ce lien :

        https://drive.google.com/file/d/1u42z9jt87hlQwgH6v8W0OIEe13Euoh9F/view?usp=drivesdk

        Si vous avez des questions, n'hésitez pas à nous contacter.

        Cordialement,
        L'équipe Alialpha";

        // En-têtes de l'email
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $from . "\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

        // Envoyer l'email
        if (mail($email, $subject, $message, $headers)) {
            // Redirection vers la page de remerciement
            header('Location: thank_you.html');
            exit();
        } else {
            echo "Une erreur est survenue lors de l'envoi de l'email.";
        }
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
}
?>
