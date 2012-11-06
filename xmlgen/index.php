
<?php
// ------------------------ pour ecrire dans le fichier xml -------------------------------
             if ( ! empty($_POST)&& $_POST['testload'] == "no" ) 
    {
             $xml = '<?xml version="1.0" encoding="iso-8859-1"?>' ;
             $xml .= '<person>' ;
             $xml .= '<name>' . htmlentities($_POST['name']) . '</name>' ;
             $xml .= '<surname>' . htmlentities($_POST['surname']) . '</surname>' ;
             $xml .= '</person>' ;
            file_put_contents('person.xml', $xml) ;
             echo '<p>XML enregistré !</p>' ;
	}
	// ----------------------- pour lire à partir du fichier xml-----------------------------
	if (! empty($_POST) && $_POST['testload'] == "yes") 
	{
		$doc = new DOMDocument();
		//$doc->load('person.xml');
	/*$exts = array('.xml');
	$ext = strrchr($_FILES['monfichier']['name'], '.');
	if(!in_array($exts, $ext))
	{
		$para="toto";
		
	}*/
			
		$para = $_FILES['monfichier']['name'];
		
		$doc->load($para);
		
		
		 
		$employees = $doc->getElementsByTagName( "person" ); 
			foreach( $employees as $employee ) 
				  { 
					  $names = $employee->getElementsByTagName( "name" ); 
					  $name = $names->item(0)->nodeValue; 
					   
					  $surnames= $employee->getElementsByTagName( "surname" ); 
					  $surname= $surnames->item(0)->nodeValue; 
					      
					  echo "<b>$name - $surname \n</b><br>"; 
				  }		
		// echo $_FILES['monfichier']['name'];		  
	}

	?>

	
	<form action="" method="post" enctype="multipart/form-data">
        <p>
                Formulaire d'envoi de fichier :<br />
                <input type="hidden" name="testload" value="yes"> 
                <input type="file" name="monfichier" />
                <input type="text" name="name" value = <?php if(isset($name)) echo $name ?> > 
  				<input type="text" name="surname" value = <?php if(isset($surname))echo $surname ?> > 
  				
                  				
                <input type="submit" value="Envoyer le fichier" />
        </p>
    </form>
    
    
    <?php 
    
    if (isset($_POST['monfichier']['name']))
		{
		          echo $_FILES['monfichier']['name'];	
		}
    
    
    ?>
    
<form action="" method="post">
<p>
    <input type="text" name="name" value = <?php if(isset($name)) echo $name ?> > 
  	<input type="text" name="surname" value = <?php if(isset($surname))echo $surname ?> > 
  	<input type="hidden" name="testload" value="no">
    <input type="submit" value="Valider" />
</p>
</form>








