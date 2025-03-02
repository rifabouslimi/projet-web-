<?php   
require_once __DIR__ . '/../Config.php';
require_once __DIR__ . '/../Model/User.php';



class UserController{

public function getUsers(){
 $db= config::getConnexion(); 
 $sql = "SELECT * FROM user";
  try {

$query = $db->prepare($sql);
$query ->execute();
return $query->fetchAll();


  } catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
  }
}

function addUser($user){
$db= config::getConnexion();
$req = "INSERT INTO user(email,pwd) VALUES(:email,:pwd)"    ;
try {
    $query = $db->prepare($req);
    $query ->execute ([
'email'=> $user['email'],
'pwd'=> $user['pwd']
    ]);
    
}
catch (Exception $e) {
  die('Erreur: ' . $e->getMessage());

}

}
public function updateUser($id, $email, $pwd) {
  $sql = "UPDATE user SET email = :email, pwd = :pwd WHERE id = :id";
  $db = config::getConnexion();
  try {
      $query = $db->prepare($sql);
      $query->execute([
          'email' => $email,
          'pwd' => $pwd,
          'id' => $id
      ]);
      echo $query->rowCount() . "  UPDATED successfully";
  } catch (PDOException $e) {
      die("Erreur: " . $e->getMessage());
  }
}

public function deleteUser($id) {
  $sql = "DELETE FROM user WHERE id = :id";
  $db = config::getConnexion();
  try {
      $query = $db->prepare($sql);
      $query->execute(['id' => $id]);
      echo $query->rowCount() . "  DELETED successfully";  
  } catch (PDOException $e) {
      die("Erreur: " . $e->getMessage());
  }
}
}

$offer = new User("Bouslimi.Rifa@esprit.tn", "elliot");
$controller = new usercontroller();
$controller->addUser($offer);


$controller->deleteUser(6);  


$controller->updateUser(24, 'Bouslimi.ranim@esprit.tn', 'newpass');
Vous avez envoyé
$offer = new User("Bouslimi.Rifa@esprit.tn", "elliot");
$controller = new usercontroller();
$controller->addUser($offer);


$controller->deleteUser(6);  


$controller->updateUser(24, 'Bouslimi.ranim@esprit.tn', 'newpass'); 



}







?>