

<div id="home_content" class="col s6"> 
<h2> Bienvenue ! </h2>
<p>
    Vous êtes sur votre page privé, vous pouvez vous déconnecter en haut à droite.
</p>
</div>

<div id="home_content" class="col s6"> 
<h4>Quelques infos</h4>

   <table>

        <tbody>
          <tr>
            <td>Nom</td>
            <td><?php echo $user["name"]; ?></td>
          </tr>
          <tr>
            <td>Prenom</td>
            <td><?php echo $user["surname"]; ?></td>
          </tr>
          <tr>
            <td>Mail</td>
            <td><?php echo $user["email"]; ?></td>
          </tr>
          <tr>
            <td>Identifiant</td>
            <td><?php echo $user["id"]; ?></td>
          </tr>
        </tbody>
        
      </table>
</div>

