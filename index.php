<?php 

/*--------------------------  
        INITIALISATION 
  --------------------------*/

#Framework slim
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim([
    'templates.path' => 'templates']);
    
#Init. cookie
$app->add(new \Slim\Middleware\SessionCookie(array(
    'expires' => '20 minutes',
    'path' => '/',
    'domain' => null,
    'secure' => false,
    'httponly' => false,
    'name' => 'slim_session',
    'secret' => 'toowiter',
    'cipher' => MCRYPT_RIJNDAEL_256,
    'cipher_mode' => MCRYPT_MODE_CBC
)));
    
#Init. BDD 
require 'class/bdd_manager.php';
$app->bdd = new BDD_manager(new PDO('mysql:host=localhost;dbname=test', 'sudo', '1234'));

# On essaye de se connecter avec les ID contenues dans les cookies, 
# si aucune connexion est possible (pas de cookie ou ID erronés), la fonction retourne "No user"
$app->user = $app->bdd->get_user($app->getCookie("email"),$app->getCookie("password"));


/*--------------------------  
            ROUTES
  --------------------------*/

    
//Home Page 
$app->get('/', function() use ($app) {

    if ($app->user == "no user")
    $app->render("home.php");
    else
    $app->render("private.php",array("user"=>$app->user));

});

//Route connexion 
$app->post("/login", function() use($app) {
    
    $email = $app->request->post("email");
    $password = $app->request->post("password");
    
    if ( $app->bdd->get_user($email,$password) != "no user")
    {
        $app->setCookie("email",$email,"10 minutes");
        $app->setCookie("password",$password,"10 minutes");
        $app->redirect('/toowiter');
    }
    else
    {
        $app->render("home.php",array("error"=>"Mot de passe ou email non valide."));
    }
});

//Route logout
$app->get("/logout", function() use($app) {
    
    $app->deleteCookie("email");
    $app->deleteCookie("password");
    $app->redirect("/toowiter");
    
});

//Route Nouveau utilisateur 
$app->post("/signin", function() use($app) {
    
    $name = $app->request->post("name");
    $surname = $app->request->post("surname");
    $password = $app->request->post("password");
    $email = $app->request->post("email");
    
    $message_db = $app->bdd->add_user($name,$surname,$email,$password);
    
    $app->render("home.php",array("message_db"=>$message_db));
    
});



/*--------------------------  
           RENDER
  --------------------------*/
$app->render("header.php",array("user"=>$app->user));
$app->run();
$app->render("footer.php")


?>