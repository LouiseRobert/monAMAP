<?php

require_once File::build_path(array('model','Model.php'));

class ModelContrat extends Model 
{

    protected $idContrat;
    protected $idAdherent;
    protected $typeContrat;
    protected $tailleContrat;
    protected $frequenceContrat;
    static protected $object = 'contrat';
    protected static $primary='idContrat';
	
	/**
	 * renvoie tous les contrats relatifs à un adhérent
	 * @param adresse mail de l'adhérent
     * @return un tableau de ModelContrat 
     */
	public static function getTotalContrats($idAdh){
		$sql = "SELECT * FROM Contrat WHERE idAdherent=:adh ";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "adh" => $idAdh);
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelContrat');
        $tabContrat = $req_prep->fetchAll();
		//var_dump($tabContrat);
		return $tabContrat;
	}
	
	/**
	 * renvoie tous les contrats en cours relatifs à un adhérent
	 * @param adresse mail de l'adhérent
     * @return un tableau de ModelContrat 
     */
	public static function getContrats($idAdh){
		$sql = "SELECT * FROM Contrat WHERE idAdherent=:adh AND encours=1";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "adh" => $idAdh);
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelContrat');
        $tabContrat = $req_prep->fetchAll();
		//var_dump($tabContrat);
		return $tabContrat;
	}

	/**
	 * Résilie un contrat en passant l'attribut encours de la BDD à 0
	 * @param l'identifiant du contrat à résilier
     * 
     */
	public static function resilier($idContr){
		$sql = "UPDATE Contrat SET encours = 0 WHERE idContrat=:contr";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "contr" => $idContr);
        $req_prep->execute($values);
	}
}

?>






