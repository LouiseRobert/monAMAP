<?php

require_once File::build_path(array('model','Model.php'));

class ModelPersonne extends Model 
{

    protected $nomPersonne;
    protected $prenomPersonne;
    protected $mailPersonne;
    static protected $object = 'personne';
    protected static $primary='mailPersonne';


// public function __construct($u = NULL, $d = NULL, $p = NULL) {
//       if (!is_null($u) && !is_null($d) && !is_null($p)){
//         $this->nomPersonne = $u;
//         $this->prenomPersonne = $d;
//         $this->mailPersonne = $p;

//       }
// }

// public static function getPersonneByMail($email){
// 	 error_reporting(E_ALL & ~E_NOTICE);
// 	   $sql = "SELECT * FROM Personne WHERE mailPersonne=:mailPersonne";

// 		// Préparation de la requête
//         $req_prep = Model::$pdo->prepare($sql);

// 	    $values = array(
//             "mailPersonne" => $mailPersonne,
//         );
// 	    // On donne les valeurs et on exécute la requête
// 	    $req_prep->execute($values);
// 	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelPersonne');

//         $tab = $req_prep->fetchAll();
//         return $tab[0];

// }

}
?>