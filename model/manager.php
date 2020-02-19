<?php
class Manager{

	protected function bddConnect(){
		
		// Connexion à la base de données

			//$bdd = new PDO('mysql:host=db5000301926.hosting-data.io;dbname=dbs294977;charset=utf8', 'dbu519301', 'Spartrox117*');
			$bdd = new PDO('mysql:host=localhost;dbname=projet_p4;charset=utf8', 'root', '');
			return $bdd;
	}
}