{* Commentaire Smarty *}
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Index</title>
   </head>
    <body>
        <h1>Route : index</h1>
        
        
        {if isset($user)} {* si l'utilisateur est connecté *}
        <p>Vous êtes en connecté en tant que {$user}</p>
        <a href="./profil">Mon profil</a>
        <a href="./logout">se déconnecter</a>
        {else}
        <a href="./register">s'enregistrer</a>
        <a href="./login">se connecter</a>
        {/if}

        

    
   </body>
</html>