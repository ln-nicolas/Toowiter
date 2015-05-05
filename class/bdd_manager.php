<?php

class BDD_manager
{

    private $_db;
    
    public function __construct($db)
    {
        $this->_db = $db;
    }
    
    public function get_user($email,$password)
    {
        # Vérifie les id donnés, retourne un tableau avec des données relatives à l'user si id correct, sinon "No user"
 
        $req = $this->_db->prepare('SELECT * FROM user_data WHERE email = ? AND password = ?');
        $req->execute(array($email,$password));
        $data = $req->fetch();
        
        if(empty($data))
            return "no user";
        else
            return $data;      
    }
    
    public function add_user($name,$surname,$email,$password)
    {
        # Vérifie si l'email n'existe pas dans la BDD, puis créer utilisateur 
        # Retourne message de debug ("Inscription réussie","email non valide")

        $return_message = "Inscription réussie"; 
        $error = false;
        
        $req = $this->_db->prepare('SELECT * FROM user_data WHERE email = ?');
        $req->execute(array($email));
        $data = $req->fetch();
        
        if(!empty($data))
        {
            $error = true;
            $return_message = "email non valide";
        }
        
        if(!$error){
        $req = $this->_db->prepare('INSERT INTO user_data(name, surname, email, password) VALUES(:name, :surname, :email, :password)');
        $req->execute(array(
	        'name' => $name,
	        'surname' => $surname,
	        'email' => $email,
	        'password' => $password
	        ));
        }
        
        return $return_message;

    }
    
    public function get_id($email,$password)
    {
        $req = $this->_db->prepare('SELECT id FROM user_data WHERE email = ? AND password=?');
        $req->execute(array($email,$password));

        return $req->fetch()["id"];
    }
    
    public function get_name($id)
    {   
        $req = $this->_db->prepare('SELECT name FROM user_data WHERE id=?');
        $req->execute(array($id));

        return $req->fetch()["name"];
    }
    
    public function get_surname($id)
    {
        $req = $this->_db->prepare('SELECT surname FROM user_data WHERE id=?');
        $req->execute(array($id));

        return $req->fetch()["surname"];
    }
    
}

?>