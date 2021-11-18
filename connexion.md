# Authentification

Pour se connecter à notre back office on va avoir besoin de plusieurs étapes. 

1- Créer une page de connexion => Une route en GET, qui appelle une méthode de controller qui affiche une view avec un formulaire contenant 2 champs (email et mot de passe).
2- Route pour traiter le formulaire (POST)
3- Dans la table app_user, récupérer le premier utilisateur qui a le meme email.
4- Si on trouve un utilisateur avec cet email, alors on va comparer les mots de passe (celui en POST et celui stocké en BDD)
5- Si le mot de passe correspond, alors l'utilisateur est authentifié, on peut le "connecter".