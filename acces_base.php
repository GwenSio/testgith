<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of acces_base
 *
 * @author Gwendal
 */
  class acces_base{  
      
  public function connection()
  {
    try {
    $dbh = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');
    }
    catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
        }
    //put your code here
    }
}