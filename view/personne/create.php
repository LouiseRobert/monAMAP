<form method="post" action="./?action=created&controller=personne"> 
 <!-- On recupere les infos avec la methode post et on redirige vers la sauvegarde dans la base de donnees -->
  <fieldset>
    <legend>Inscrire une personne :</legend>
    <p>
      <label for="nom_id">Nom</label> :
      <input type="text" placeholder="Ex : Sambuc" name="nomPersonne" id="nom_id" required/>
    </p> 
    <p>
      <label for="prenom_id">Prenom</label> :
      <input type="text" placeholder="Ex : David" name="prenomPersonne" id="prenom_id" required/>
    </p>
    <p>
      <label for="mail_id">Mail</label> :
      <input type="text" placeholder="Ex : dsambuc@free.fr" name="mailPersonne" id="mail_id" required/>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>
