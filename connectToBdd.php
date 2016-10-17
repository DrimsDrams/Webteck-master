<?php
	$bdd = new PDO('mysql:host=localhost;dbname=webteck','root','');
	
	/*  Fonction qui va crée un utilisateur dans la base de données*/ 
	function createUser($PDO,$login,$unNom,$unPrenom,$unMdp,$unMail,$unStatut)
	{
		$ash = password_hash($unMdp,PASSWORD_DEFAULT);
		$req = $PDO->prepare('INSERT INTO personne(login,Nom,Prenom,Password,Email,Statut,DtCreate) VALUES(:a,:b,:c,:d,:e,:f,NOW())');
		$req->execute(array(
			'a' => $login,
			'b' => $unNom,
			'c' => $unPrenom,
			'd' => $ash,
			'e' => $unMail,
			'f' => $unStatut
		));
	}
	/*  Fonction qui va renvoyer l'utilisateur, si l'utilisateur est présent dans la base de donné. Sinon, renvoie null */
	function login($PDO,$login,$mdp)
	{	
		$req = $PDO->prepare("SELECT login,Nom,Prenom,Password,Statut FROM personne WHERE login = :pseudo");
		$req->execute(array(
			'pseudo' => $login
		));
		$req = $req ->fetchAll();
		if($req == null)
		{
			return false;
		}
		else
		{
			if(password_verify($mdp,$req[0][3]) == 1)
			{
				return $req[0];
			}
			else
			{
				return null;
			}
		}	
	}

	function recupPersonne($PDO,$login)
	{
		$req = $PDO->prepare("SELECT login,Nom,Prenom,Password,Statut FROM personne WHERE login= :a");
		$req->bindParam(':a', $login);
		$req->execute();
		$donnees = $req->fetch();
		return $donnees;
	}

	/* fonction qui renvoie true, si jamais l'utisateur n'est pas déja dans la base */
	function verfUsername($PDO, $login)
	{
		$req = $PDO->prepare("SELECT login FROM personne WHERE login = :pseudo");
		$req->execute(array(
			'pseudo' => $login
		));
		$req = $req ->fetchAll();
		if($req == null)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/* Fonction qui va insérer l'annonce dans la base de donnée */
	function insertAnnonce($PDO,$login,$Amis,$description,$email,$siteweb,$telephone,$adresse)
	{
		$req = $PDO->prepare('INSERT INTO demande(login,Amis,Description,email,siteweb,Telephone,login_bienfaiteur,adresse) VALUES(:a,:b,:c,:d,:e,:f,null,:g)');
		$req->bindParam(':a', $login);
		$req->bindParam(':b', $Amis);
		$req->bindParam(':c', $description);
		$req->bindParam(':d', $email);
		$req->bindParam(':e', $siteweb);
		$req->bindParam(':f', intval($telephone));
		$req->bindParam(':g', $adresse);
		return $req->execute();
	}


	/* Renvoie un tableau en deux dimentions de toutes les annonces posté par l'utilitateur */
	function annoncesSelonUtilistateur($PDO,$login)
	{
		$req = $PDO->prepare("SELECT Amis,Description,email,login,siteweb,adresse,telephone,idDemande from demande WHERE login = :a");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();
	}

	//Fonction qui va recupere toutes les annonces
	function allAnnonce($PDO)
	{
		$req = $PDO->prepare("SELECT Amis,Description,email,login,idDemande from demande WHERE login_bienfaiteur IS NULL ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();
	}

	
	//Fonction delete
	function deleteAnnonce($PDO,$id)
	{
		$req = $PDO->prepare("DELETE FROM demande  WHERE idDemande = :a");
		$req->bindParam(':a', $id);
		$req->execute();
	}
	/*function modificationAnnonce($PDO,$id,$Amis,$description,$email,$siteweb,$telephone,$adresse)
	{
		$req = $PDO->prepare("UPDATE demande SET Amis = :c, Description = :d, email = :e, siteweb =:f ,Telephone=:g, adresse = :h) VALUES(:b,:c,:d,:e,:f,:g,null,:h) WHERE idDemande= :a");
		$req->bindParam(':a', $id);
		$req->bindParam(':c', $Amis);
		$req->bindParam(':d', $description);
		$req->bindParam(':e', $email);
		$req->bindParam(':f', $siteweb);
		$req->bindParam(':g', intval($telephone));
		$req->bindParam(':h', $adresse);
		return $req->execute();
	}*/
	function modificationAnnonce($PDO,$id,$Amis,$Description,$email,$siteweb,$telephone,$adresse)
	{
		$req = $PDO->prepare("UPDATE demande SET Amis=:b,Description = :c,email =:d, siteweb =:e, Telephone = :f, adresse =:g WHERE idDemande = :a");
		$req->bindParam(':a', $id);
		$req->bindParam(':b', $Amis);
		$req->bindParam(':c', $Description);
		$req->bindParam(':d', $email);
		$req->bindParam(':e', $siteweb);
		$req->bindParam(':f', intval($telephone));
		$req->bindParam(':g', $adresse);
		$req->execute();
	}
?>