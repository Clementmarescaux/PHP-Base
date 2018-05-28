
<?php

    $email = null;
    $subject = null;
    $message = null;

if (!empty($_POST)) {

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
}
?>

<form method="POST">
    <label for="Email" >E-mail :</label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>"/><br/><br/>

    <label for="subject">Sujet :</label>
    <input type="text" id="subject" name="subject" value="<?php echo $subject; ?>"/><br/><br/>

    <label for="message">Message :</label>
    <textarea rows="3"  rows="3" id="messsage" name="message" ><?php echo $message; ?></textarea><br/><br/>

    <button>Envoyer</button>
</form>

<?php

// var_dump($_POST);

if (!empty($_POST)) {

    $isValid = true;

    if (strlen($email) == 0 ) {
        $isValid = false;
        echo 'Veuillez renseigner le champs e-mail. <br/>';
    } 
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        echo 'Merci de renseigner un e-mail valide. <br/>';
    } 
    
    if (strlen($subject) == 0 ) {
        $isValid = false;
        echo 'Veuillez renseigner le sujet. <br/>';
    } 
    
    if (strlen($message) <= 15 ) {
        $isValid = false;
        echo '<strong> Votre message doit contenir plus de 15 caractères. </strong> <br/>';
    
    } 

    if ($isValid) {
        echo '<strong> Aghh, Danke SCHONNNN !! </strong>';
    }
}