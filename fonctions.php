<?php 

Flight::route('/', function(){ //route par défaut , Accueil 
    Flight::render("index.tpl",array()); //renvoi sur le tempalte de l'index
});


Flight::route('GET /register', function(){ 
    $data=array(
      "titre"=>"GET register",
      "route"=>"http://localhost/TPS/TP4/register",
      "messages"=>array()
    );
    //on met les infos dans un tableau que l'on renvoi après, cela permetra d'afficher les messages d'erreurs plus tard
    Flight::render('register.tpl',$data);
});

Flight::route('POST /register', function(){
    //on initialise les valeurs à chaque fois que l'on retourne sur cette page 
    $erreurs=false; 
    $messages=array(); 


    if(empty($_POST['nom'])){ 
        $erreurs=true;
        $messages['nom']='Vous devez saisir un Nom';
        
    }// si le nom ou l'email est vide, on ajoute un message d'erreur et on change la variable pour indiquer qu'il y a des erreurs
    if(empty($_POST['email'])){
        $erreurs=true;
        $messages['email']='Vous devez saisir une adresse mail valide';
    }
    
    
    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $erreurs = true;
        $messages['email'] = 'Email invalide';
    }//si l'email n'est pas conforme on met une erreur

    $db= Flight::get('db'); // cela permet d'utilser la variable db du pdo.php
    $statement = $db->prepare("select email from utilisateur where email = ?"); //on prepare une requete par securité 
    $statement -> execute(array($_POST['email'])); // on execute le statement

    if($statement -> rowCount() > 0){
        $erreurs = true;
        $messages['email'] ='email deja utilisé';
    }//regarde si il y a au moins un email qui est deja utilisé et renvoie une erreur si tel est le cas 


    if(empty($_POST['passe'])){
        $erreurs=true;
        $messages['passe']='Vous devez saisir un mot de passe de longueur 8 minimum';
    }// ces 2 morceaux de code regarde si le mot passe n'est pas vide et possede au moins 8 caractère et ajoute une erreur sinon
    elseif(mb_strlen($_POST['passe']) < 8){
        $erreurs=true;
        $messages['passe']=' mot de passe de longueur 8 minimum';
    }

    if($erreurs){ //si il y a eu des erreurs (déclenché par le code plus haut) 
        Flight::view()->assign('messages',$messages); 
        Flight::render("register.tpl",$_POST); //on renvoie l'utilisateur sur la meme page pour qu'il puisse resaisir ses informations
    }else{
        $statement2 = Flight::get('db')->prepare('insert into utilisateur values(?,?,?)'); //si il n'y a pas de probleme, on prepare une requete par securite qui permettra d'inserer l'utilisateur dans la BDD
        $statement2->execute(array( //on execute le statement
            $_POST['nom'], 
            $_POST['email'],
            password_hash($_POST['passe'],PASSWORD_DEFAULT) //on chiffre le mot de passe avant de le mettre dans la BDD
            
        ));
        Flight::render("success.tpl",array()); //on redirige vers la page succès
       
    }
    
});
Flight::route("/success", function(){
    Flight::render("success.tpl",array()); //Renvoi vers la page succès 
});

Flight::route('GET /login', function(){
    $data=array(
        "titre"=>"GET login",
        "route"=>"http://localhost/TPS/TP4/login",
        "messages"=>array()
      ); //tableau d'info de la meme manière que pour GET /register
    Flight::render("login.tpl",$data);
});

Flight::route('POST /login', function(){
    //on itialise les variables comme pour POST /register
    $erreurs=false;
    $messages=array();
    
    if(empty($_POST['email'])){
        $erreurs=true;
        $messages['email']='Vous devez saisir une adresse mail';
    }// on verifie les champs comme POST /register
    if(empty($_POST['passe'])){
        $erreurs=true;
        $messages['passe']='Vous devez saisir un mot de passe ';
    }

    if(!$erreurs){
        $statement = Flight::get('db')->prepare('SELECT * FROM utilisateur WHERE email= ?'); //on prepare une requete, on l'on selectionne toute les infos d'un utilisateur dont on connait son adresse mail
        $statement->execute(array($_POST['email'])); //on execute le statement
        if($data = $statement->fetch()){ //si l'utilisateur existe 

            if(password_verify($_POST['passe'], $data['motdepasse'])){ //on verifie que le mdp correspond avec celui entré dans la BDD(déchiffré)
                $_SESSION['user'] = $data['nom'];
                $_SESSION['email'] = $data['email']; //on ajoute à la session courante les infos que l'as besoin
                $_SESSION['connecte'] = true;
            }else {
                $erreurs=true;
                $messages['verif'] = "Email ou mot de passe incorrect"; //si le mdp est incorrect ajoute une erreur
            }
        }else{
            $erreurs=true;
            $messages['verif'] = "Email ou mot de passe incorrect"; // si le l'utilisateur n'existe pas ajoute une erreur
        }
    }

    if($erreurs){ //si il y a des erreurs, on renvoie l'utilisateur sur la page login, avec les messages d'erreurs affichés
        Flight::view()->assign('messages',$messages);
        Flight::render("login.tpl",$_POST);
    }else{
        Flight::redirect("/"); //si tout s'est passé correctement, renvoie sur la page d'accueil
    }

});

Flight::route('/profil', function(){

    if($_SESSION['connecte']){ //si l'utilisateur est connecté,
        $data=array(
            "titre"=>"Profil",
            "route"=>"http://localhost/TPs/TP4/profil",
            "email"=>$_SESSION["email"]
        );//infos que l'on renvoie en meme temps que de passer sur la page profil
        Flight::render("profil.tpl",$data); //il peut acceder à son profil 
    }else{
        Flight::redirect("/login");// si l'utilisateur n'est pas connecté, on le renvoi sur la page de connexion
        //cela n'est pas sensé se produire puisque pour que l'utilisateur puisque y acceder il doit taper /profile à partir de l'accueil, si il n'est pas connecté
    }

});

Flight::route('/logout', function(){
   $_SESSION = array(); //on vide la session 
   session_destroy(); // on la detruit
   session_start(); // on la redemarre pour que l'on puisse de nouveau se connecter
   $_SESSION['connecte']=false; //on itialise la variable sur pas connecte
   Flight::redirect("/"); //on retourne sur la page d'accueil
});


    

