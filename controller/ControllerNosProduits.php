<?php 

require_once File::build_path(array('model','ModelProduit.php'));
require_once File::build_path(array('model','Model.php'));
require_once File::build_path(array('model','ModelAdherent.php')); // chargement du modèle

class ControllerNosProduits
{
    protected static $object='nosProduits';




     public static function readAllproducts()
    {

        $tab = ModelProduit::selectAll();
        $view = 'produits';
        $pagetitle = 'nos produits';
        require File::build_path(array('view','view.php'));
    }



    public static function readAllprod()
    {
        $tab_prod = ModelAdherent::selectAllProd();
        $view = 'nosproducteurs';
        $pagetitle = 'Nos Producteurs';
        require File::build_path(array('view','view.php'));    
    }

    public static function seasonsproducts()
    {
        $view = 'produitsdumoment';
        $pagetitle = 'Produits du moment';
        require File::build_path(array('view','view.php')); 
    }

     public static function error()
    {
    $view = 'error';
    $pagetitle = 'Error 404';
    require File::build_path(array('view','view.php'));
    } 

////////////**********Ajout d'un article**********////////////

//redirige vers le formulaire d'ajout de produit
    public static function createProd(){
         if (!$_SESSION['login']) {
             $_POST['phrase'] = "Veuillez vous connecter pour effectuer cette action.";
             return ControllerAdherent::connect();
         }
        if (isset($_SESSION['producteur'])){
            $view = 'createProd';
            $pagetitle = 'Ajoutez un article';
            require File::build_path(array('view','view.php'));
        } else {
            self::error();
        }
    }

//action de création de produit
    public static function createdProd(){
        if (isset($_SESSION['producteur'])){
            ///////////////////////////////////////
            // Traitement de l'upload et verifs //
            /////////////////////////////////////
            if (!empty($_FILES['nom-image']) && is_uploaded_file($_FILES['nom-image']['tmp_name']))
            {
                //on recupere le nom du fichier
                $name = $_FILES['nom-image']['name'];
                $pic_path = File::build_path(array('images', $name));
                $allowed_ext = array("jpg", "jpeg", "png");

                $realextarray = explode('.', $_FILES['nom-image']['name']);

                //on test l'extension du fichier upload
                if (!in_array(end($realextarray), $allowed_ext))
                    return self::error();

                //on essaie de le déplacer et on retourne une erreur si ca plante
                if (!move_uploaded_file($_FILES['nom-image']['tmp_name'], $pic_path))
                    return self::error();

                $path = File::build_path(array('images', $name));

                //on test que le fichier upload existe au bon endroit
                if (!file_exists($path))
                    return self::error();

                $name = "./images/" . $name;
            }

            $nomProduit = $_POST['nomProduit'];
            $description = $_POST['description'];
            $image = $name ?? $_POST['image'];

            $array = [
                'nomProduit' => $nomProduit,
                'description' => $description,
                'image' => $image,
            ];
            ModelProduit::save($array);
            //redirection vers les articles
            self::readAllproducts();
        } else {
            self::error();
        }   
    }

} 
?>











