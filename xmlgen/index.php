<?php
echo 'test3hhhh';
?>


<form method="post" action="[votre fichier PHP pour l'upload.php]" enctype="multipart/form-data">     
          <input type="hidden" name="MAX_FILE_SIZE" value="2097152">     
          <input type="file" name="nom_du_fichier">    
          <input type="submit" value="Envoyer">    
</form>


<form action="cible.php" method="post">
<p>
    <input type="text" name="prenom" />
    <input type="text" name="prenom" />
    <input type="submit" value="Valider" />
</p>
</form>

<?php
             if ( ! empty($_POST) ) {
             $xml = '<?xml version="1.0" ... ?>' ;
             $xml .= '<person>' ;
             $xml .= '<name>' . htmlentities($_POST['name']) . '</name>' ;
             $xml .= '<surname>' . htmlentities($_POST['surname']) . '</surname>' ;
             $xml .= '</person>' ;
            file_put_contents('person.xml', $xml) ;
             echo '<p>XML enregistré !</p>' ;
}

$dom = new DOMDocument($version, $encoding)
?>




<form method="post" action=""> 
  <input type="text" name="name"> 
  <input type="text" name="surname"> 
  <input type="submit" value="Go" />
</form>
