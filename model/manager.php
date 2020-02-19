<?php
class Manager{

	protected function bddConnect(){
		
		// Connexion à la base de données

			
			$bdd = new PDO('mysql:host=localhost;dbname=projet_p4;charset=utf8', 'root', '');
			return $bdd;
	}
}