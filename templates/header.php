

<!-- 
Simple header, avec le head html et le bandeau haut du site 
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Toowiter </title>

        <link type="text/css" rel="stylesheet" href="/toowiter/materialize/css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="/toowiter/style/style.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    </head>
    
 <body class="grey lighten-2">
 
      <div class="container">
      
      <div class="row">
            <header class="col s12 grey lighten-5"> 
            <span class="title blue-text text-darken-3"> Toowiter </span> 
            <?php if($user!="no user") echo '<a class="logout-btn blue-text text-darken-3" href="logout">Se déconnecter</a>'; ?> 
            </header>
            
            
            
    

          


