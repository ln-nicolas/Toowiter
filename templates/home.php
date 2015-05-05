




<!-- PARTIE GAUCHE -->

<div id="home_content" class="col s6"> 
    <h2> Toowiter </h2>
    <p>
    Toowiter, est une application de démonstration utilisant le framework PHP <a href="http://www.slimframework.com/"> slim framework </a> .
    Le but ici est de faire un système de compte utilisateur, avec des pages à accès publique, et 
    d'autres à accès privé. Un nouveau visiteur peut créer son compte, se connecter, puis se déconnecter. 
    </p>
</div>


<!-- PARTIE DROITE -->

<div class="col s6" id="identification_panel"> 
<div class="row" id="connexion_panel">
<form action="login" method="POST">

        <div class="col s12">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" class="validate" value="email@email.com">
        </div>

        <div class="col s12">
          <label for="password">Mot de passe</label>
          <input id="password" name="password" type="password" class="validate" value="test">
        </div>

        <button class="btn waves-effect waves-light blue darken-3" type="submit" name="action">Connexion
        </button>   
</form>
<span class="red-text error"> <?php if(isset($error)){echo $error;} ?> </span>
</div>

<div class="row" id="signin_panel">
<form action="signin" method="POST">
        <div class="col s5">
          <label for="name">Nom</label>
          <input id="name" name="name" type="text" class="validate">
        </div>

        <div class="col s5">
          <label for="surname">Prénom</label>
          <input id="surname" name="surname" type="text" class="validate">
        </div>

        <div class="col s12">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" class="validate">
        </div>

        <div class="col s12">
          <label for="password">Mot de passe</label>
          <input id="password" name="password" type="password" class="validate">
        </div>

        <button class="btn waves-effect waves-light blue darken-3" type="submit" name="action">S'inscrire
        </button>
        <span class="red-text error"> <?php if(isset($message_db)){echo $message_db;} ?> </span>   
</form>
</div>
</div>

