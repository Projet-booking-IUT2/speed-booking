<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <title>AYATI Developers</title>
        <link rel="stylesheet" type="text/css" href="../Views/Styles/styleTest.css" />
    </head>
    <body>
        <table>
            <tr><th>id</th><th>Nom</th><th>Prénom</th><th>Téléphone</th></tr>
        <?php
            foreach($data['devs'] as $key){
                echo '<tr><th>'.$key['id'].'</th><td>'.$key['nomDev'].'</td><td>'.$key['prenomDev'].'</td><td>'.$key['numTel'].'</td></tr>';
            }
        ?>
        </table>
    </body>
</html>
