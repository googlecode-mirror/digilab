<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<title>Mon premier exercice : xmlgen</title>

<style type="text/css">
label {
	float: left;
	width: 9em;
	margin-right: 1em;
	text-align: left;
}
</style>
</head>

<body>
<?php
// ------------------------ pour ecrire dans le fichier xml -------------------------------

if ( ! empty($_POST['Valider']) )
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

if ( ! empty($_POST['load']) )
{
	$doc = new DOMDocument();

	$para = $_FILES['monfichier']['name'];

	$doc->load($para);



	$employees = $doc->getElementsByTagName( "person" );
	foreach( $employees as $employee )
	{
		$names = $employee->getElementsByTagName( "name" );
		$name = $names->item(0)->nodeValue;

		$surnames= $employee->getElementsByTagName( "surname" );
		$surname= $surnames->item(0)->nodeValue;
			
		//  echo "<b>$name - $surname \n</b><br>";
	}

}

?>

	<!-- le code html  -->
	<form action="" method="post" enctype="multipart/form-data">
		<div style="font-family: 'Trebuchet MS', Helvetica, sans-serif;">
			<FIELDSET>
				<LEGEND style="text-align: 'center'; width: '60%';">Create new xml
					form</LEGEND>
				<p>
					load xml file in form : <input type="file" name="monfichier" />&nbsp;&nbsp;&nbsp;
					<input type="submit" name="load" value="load" /><br /> <br /> <br />
					<label for="lastename">last name :</label> <input type="text"
						name="name" value=<?php if(isset($name)) echo $name ?>> <br /> <br />
					<label for="firstname">first name :</label> <input type="text"
						name="surname" value=<?php if(isset($surname))echo $surname ?>>


					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
						type="submit" name="Valider" value="export to xml format" />
				</p>
			</FIELDSET>
		</div>
	</form>
</body>
</html>











