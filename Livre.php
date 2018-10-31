<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Livre
 *
 * @author Gwendal
 */
class Livre {
    //put your code here
    private $_ISBN;
    private $_titre;
    private $_prix;
    private $_editeur;
    private $_annee;
    private $_langue;
    private $_numAuteur;
    private $_numGenre;
    
    
    public function __construct($donnees) // Constructeur demandant 2 paramètres

  {
   $this->hydrate($donnees); //le constructeur appelle la fonction d'hydratation qui va initialiser les attributs avec les valeurs de la base
  }  
    
    public function hydrate(array $donnees) // permet de gérer une modification des attributs de l'objet sans changer la méthode d'hydratation

    {
      foreach ($donnees as $key => $value) //recupère chaque cellule du tableau
      {
        $method = 'set'.ucfirst($key);//positionne la bonne méthode, avec une majuscule à la première lettre 
        if (method_exists($this, $method))
        {
          $this->$method($value);//appelle la bonne méthode setter
        }
      }
    }
    
    function get_ISBN() {
        return $this->_ISBN;
    }

    function get_titre() {
        return $this->_titre;
    }

    function get_prix() {
        return $this->_prix;
    }

    function get_editeur() {
        return $this->_editeur;
    }

    function get_annee() {
        return $this->_annee;
    }

    function get_langue() {
        return $this->_langue;
    }

    function get_numAuteur() {
        return $this->_numAuteur;
    }

    function get_numGenre() {
        return $this->_numGenre;
    }

    function setISBN($_ISBN) {
        $this->_ISBN = $_ISBN;
    }

    function setTitre($_titre) {
        $this->_titre = $_titre;
    }

    function setEditeur($_editeur) {
        $this->_editeur = $_editeur;
    }

    function setAnnee($_annee) {
        $this->_annee = $_annee;
    }

    function setLangue($_langue) {
        $this->_langue = $_langue;
    }

    function setNumAuteur($_numAuteur) {
        $this->_numAuteur = $_numAuteur;
    }

    function setNumGenre($_numGenre) {
        $this->_numGenre = $_numGenre;
    }
    
    function setPrix($_prix) {
        if (is_int($_prix))
        {
            $this->_prix = $_prix;
        }
        else
        {
            echo 'le type de la variable est incorrecte';
        }
        
    }

    public function ModifPrix($newPrix)
            
    {
       $this->_prix = $newPrix;
    }
    
    public function afficherTousLivres()
  {
   $livres = [];

    $q = $this->_db->query('SELECT * FROM livre order by titre');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $livre[] = new Livre($donnees);
    }

    return $livres;//retourne la collection de tous les adherents de la base
  }
}


