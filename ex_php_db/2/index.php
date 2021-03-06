<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "web_ii_notes";
		//Ouvre une connexion mysql
		$conn = new mysqli($servername, $username, $password, $db);
		//Verifie si il y a une une erreur dans l'ouverture de la connexion
		if ($conn->connect_error)
		{
			echo "La connexion a échoué: " . $conn->connect_error;
		}
		else
		{
			if (isset($_POST["btnAdd"]))
			{
				$nom = isset($_POST["txtNom"]) ? $_POST["txtNom"] : "";
				$note_proj_1 = isset($_POST["txtProj1"]) ? $_POST["txtProj1"] : 0;
				$note_proj_2 = isset($_POST["txtProj2"]) ? $_POST["txtProj2"] : 0;
				$note_exam_1 = isset($_POST["txtExam1"]) ? $_POST["txtExam1"] : 0;
				$note_exam_2 = isset($_POST["txtExam2"]) ? $_POST["txtExam2"] : 0;
				
				$sql = "INSERT INTO etudiant (nom, note_proj_1, note_proj_2, note_exam_1, note_exam_2) VALUES ('$nom', $note_proj_1, $note_proj_2, $note_exam_1, $note_exam_2)";
				//Exécute une requête sur la base de données
				if ($conn->query($sql) === TRUE)
				{
					echo "Nouvel enregistrement créé avec succès";
				}
				else
				{
					echo "Erreur: " . $sql . "<br />" . $conn->error;
				}
			}
		}
		//Ferme la connexion (Se fait automatiquement à la fin du script)
		$conn->close(); 

	?>
	<form method="post">
		Nom:<input type="text" name="txtNom" /><br/>
		Projet 1:<input type="number" name="txtProj1" min="0" max="100" /><br/>
		Projet 2:<input type="number" name="txtProj2" min="0" max="100" /><br/>
		Exam 1:<input type="number" name="txtExam1" min="0" max="100" /><br/>
		Exam 2:<input type="number" name="txtExam2" min="0" max="100" /><br/>
		<input type="submit" name="btnAdd" value="Add" />
	</form>
</body>
</html>