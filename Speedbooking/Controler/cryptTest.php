<?php

if(isset($_GET['mp'])) {
    require_once '../Model/DAO.class.php';

    $dao = new DAO();
    $password = $_GET['mp'];
    $hash = $dao->hacherPassword($password);

    //$hash = $dao->crypterPassword($password);
    $fonctionne = password_verify($password, $hash);

    if($fonctionne) {
        $data['hash'] = $hash;
    } else {
        echo "erreur de hashage";
    }

}
?>

<!DOCTYPE html>

<html>
    
    <head>
        <style>
            .hash {
                width : 700px;
            }
        </style>
    </head>
    
    
    <body>
        <form>
            <label> Entrer le mot de passe à Hascher :</label>
            <input type="text" name="mp" />
            <input type="submit" />
        </form>
        
        <?php if(isset($data['hash'])){
          echo "<label> Votre mot de passe hasché :</label>";
          echo '<input class="hash" type="text" value="'.$data['hash'].'">';
        } else {
          echo "<label> Votre mot de passe hasché :</label>";
          echo '<input class="hash" type="text" placeholder="Mot de passe hasché">';
        }
        ?>
    </body>


</html>