<?php
// For more comments on CRUD functions, see the CardController.php

namespace App\Controllers;

use App\Models\User;

class UserController extends CoreController {

    /**
     * Method to display the login page
     *
     * @return void
     */
    public function login()
    {
        $this->show('user/login');
    }

    /**
     * Method to check the authentication
     * 
     * @return void
     */
    public function authenticate()
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        // We try to find if there already is a user with the given email
        $user = User::findByEmail($email);

        // If there is
        if($user) {

            // Then we compare passwords
            if(password_verify($password, $user->getPassword())) {
                // If there's a match, we store the user data in the $_SESSION
                $_SESSION['connectedUser'] = $user;
                // And a success message
                $_SESSION['successMessage'] = "Connexion réussie";
                // And then we redirect to the home page
                $this->redirect('main-home');

            } else {
                // We set the error message
                $_SESSION['errorMessage'] = ["Mot de passe incorrect !"];
                // And redirect to the login page
                $this->redirect('user-login');
            }
        } else {
            // If no user is found, we set the error message
            $_SESSION['errorMessage'] = ["Cet email n'existe pas !"];
            // And redirect to the login page
            $this->redirect('user-login');
        }
    }

    /**
     * Method to log out of the dashboard
     *
     * @return void
     */
    public function logout()
    {
        // We delete the user data in the $_SESSION
        unset($_SESSION['connectedUser']);
        // We set a success message
        $_SESSION['successMessage'] = "Déconnexion réussie";
        // We redirect to the login form
        $this->redirect('user-login');
    }

    /**
     * @return void
     */
    public function list()
    {
        $users = User::findAll();

        $this->show('user/list', ['users' => $users]);
    }

    /**
     * @return void
     */
    public function add()
    {
        $token = $this->generateCSRFToken();

        $this->show('user/add', ['token' => $token]);
    }

    /**
     * @return void
     */
    public function create()
    {
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $passwordVerification = filter_input(INPUT_POST, 'passwordVerification');
        $avatar = filter_input(INPUT_POST, 'avatar', FILTER_SANITIZE_STRING);
        $role = filter_input(INPUT_POST, 'role');
        $status = filter_input(INPUT_POST, 'status');

        // We create an array for all the errors we might encounter
        $errorsList = [];

        // We check if the current email and pseudo are not already taken by another user
        $user = User::findByEmail($email);
        if ($user) {
            $errorsList[] = "Cet email est déjà utilisé par un autre membre. Merci d'en choisir un autre.";
        }
        $user = User::findByPseudo($pseudo);
        if ($user) {
            $errorsList[] = "Ce pseudo est déjà utilisé par un autre membre. Merci d'en choisir un autre.";
        }

        // FILTER_VALIDATE_EMAIL returns false if the format is wrong
        if($email === false) {
            $errorsList[] = "Le format de l'email n'est pas valide";
        }

        // Checking if fields are empty
        if(
            empty($pseudo) ||
            empty($email) ||
            empty($avatar) ||
            empty($password) ||
            empty($passwordVerification) ||
            empty($role) ||
            empty($status)
        ) {
            $errorsList[] = "Tous les champs doivent etre remplis !";
        }

        // Checking password length
        if(strlen($password) < 7) {
            $errorsList[] = "Le mot de passe doit faire 7 caractères au mininum !";
        }

        // Checking if the two passwords match
        if ($password !== $passwordVerification) {
            $errorsList[] = "Les mots de passes ne sont pas identiques !";            
        }

        // Cheking the only roles allowed
        if($role != 'admin' && $role != 'game-manager' && $role != 'guest') {
            $errorsList[] = "Le role n'existe pas.";
        }

        // Checking the only statuses allowed
        if($status != '1' && $status != '2') {
            $errorsList[] = "Le statut n'existe pas.";
        }

        // If there are no error in the errorsList array
        if(empty($errorsList)) {

            // If the form values were stored in Session, we erase them.
            if(isset($_SESSION['inputValues'])) {
                unset($_SESSION['inputValues']);
            }

            // Creating a new User object
            $user = new User();

            $user->setPseudo($pseudo);
            $user->setEmail($email);
            $user->setAvatar($avatar);
            $user->setStatus($status);
            $user->setRole($role);

            // Hashing the password to protect it.
            $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
            
            $user->save();

            // Setting a success message
            $_SESSION['successMessage'] = "L'utilisateur " . $user->getPseudo() . " a été inscrit !";

            $this->redirect('user-list');

        } else {
            // If there is at least one error message in the errorsList array
            // We set the array in the Session
            $_SESSION['errorMessage'] = $errorsList;

            // Storing the form values in an array in the Session
            $_SESSION['inputValues'] = [
                'password' => $password,
                'pseudo' => $pseudo,
                'avatar' => $avatar,
                'status' => $status,
                'role' => $role,
                // $email can be false, so we take it from the source
                'email' => filter_input(INPUT_POST, 'email'),
            ];
            // Redirecting to the add form
            $this->redirect('user-add');
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $user = User::find($id);

        $token = $this->generateCSRFToken();

        $this->show('user/edit', [
            'user' => $user,
            'token' => $token,
        ]);
    }

    /**
     * @param [type] $userId
     * @return void
     */
    public function update($userId)
    {
        // We get the user we want to update
        $userToUpdate = User::find($userId);

        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $avatar = filter_input(INPUT_POST, 'avatar',FILTER_SANITIZE_URL);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
        $newPassword = filter_input(INPUT_POST, 'newPassword');

        // We create an array for all the errors we might encounter
        $errorsList = [];
        
        // If $newPassword is not empty, it means the user wants to change their password
        if (!empty($newPassword)) {

            // Getting the paswword Verification value 
            $passwordVerification = filter_input(INPUT_POST, 'passwordVerification');

            // Checking password length
            if(strlen($newPassword) < 7) {
                $errorsList[] = "Le mot de passe doit faire 7 caractères au mininum !";
            }
            // Checking if the new passwords are the same
            if ($newPassword === $passwordVerification) {

                // If match, we hash the new password and erase the verification
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $passwordVerification = '';

                // Getting the currentPassword value
                $currentPassword = filter_input(INPUT_POST, 'currentPassword');

                // Checking if the current password matches the one that's registered in the database
                if (password_verify($currentPassword, $userToUpdate->getPassword())) {
                    // If it matches, $password takes the $newPassword value
                    $password = $newPassword;
                }
                else {
                    // If it doesn't, we set the error in the array
                    $errorsList[] = "Vous n'avez pas renseigné le bon mot de passe.";
                }
            }
            else {
                // If the two new passwords doens'"t match, we set the error in the array
                $errorsList[] = "Les nouveaux mots de passe ne correspondent pas.";
            }
        }

        // Getting all of the users with the given email
        $users = User::findAllByPseudoOrEmail($email, 'email');

        // If there are more than one user in the array, we set the error
        if (count($users) > 1 ) {
            $errorsList[] = "Cet email est déjà utilisé par un autre membre. Merci d'en choisir un autre.";
        } 
        // If there is one user in the array and that user has a different id than the current user, we set the error
        else if (count($users) === 1 && $users[0]->getId() !== intval($userId)) {
            $errorsList[] = "Cet email est déjà utilisé par un autre membre. Merci d'en choisir un autre.";
        } 

        // Getting all of the users with the given pseudo
        $users = User::findAllByPseudoOrEmail($pseudo, 'pseudo');
        
        // If there are more than one user in the array, we set the error
        if (count($users) > 1 ) {
            $errorsList[] = "Cet pseudo est déjà utilisé par un autre membre. Merci d'en choisir un autre.";
        } 
        // If there is one user in the array and that user has a different id than the current user, we set the error
        else if (count($users) === 1 && $users[0]->getId() !== intval($userId)) {
            $errorsList[] = "Cet pseudo est déjà utilisé par un autre membre. Merci d'en choisir un autre.";
        }

        if($email === false) {
            $errorsList[] = "Le format de l'email n'est pas valide";
        }

        // Checking if fields are empty
        // Not checking for passwords fields otherwise admin can't modify user's roles, statutes, avatars if need be
        if(
            empty($pseudo) ||
            empty($email) ||
            empty($avatar) ||
            empty($role) ||
            empty($status)
        ) {
            $errorsList[] = "Tous les champs doivent etre remplis !";
        }


        // Cheking the only roles allowed
        if($role != 'admin' && $role != 'game-manager' && $role != 'guest') {
            $errorsList[] = "Le role n'existe pas.";
        }

        // Checking the only statuses allowed
        if($status != '1' && $status != '2') {
            $errorsList[] = "Le statut n'existe pas.";
        }
        // dump($errorsList);

        // If there are no error in the errorsList array
        if (empty($errorsList)) {

            // If the form values were stored in Session, we erase them.
            if(isset($_SESSION['inputValues'])) {
                unset($_SESSION['inputValues']);
            }

            $userToUpdate->setPseudo($pseudo);
            $userToUpdate->setEmail($email);
            $userToUpdate->setAvatar($avatar);
            $userToUpdate->setStatus($status);
            $userToUpdate->setRole($role);

            // If the user changes their password
            if (!empty($password)) {
                // We set the password with the value given that's arleady been hashed
                $userToUpdate->setPassword($password);
            }
            else {
                // Else, we set it with the value currently registered or we'll have an error from the request
                $userToUpdate->setPassword($userToUpdate->getPassword());
            }

            $userToUpdate->save();

            // Setting a success message
            $_SESSION['successMessage'] = "L'utilisateur " . $userToUpdate->getPseudo() . " a été modifié avec succés !";

            $this->redirect('user-list');

        } else {
            // If there is at least one error message in the errorsList array
            // We set the array in the Session
            $_SESSION['errorMessage'] = $errorsList;

            // Storing the form values in an array in the Session
            $_SESSION['inputValues'] = [
                'pseudo' => $pseudo,
                'avatar' => $avatar,
                'status' => $status,
                'role' => $role,
                // $email can be false, so we take it from the source
                'email' => filter_input(INPUT_POST, 'email'),
            ];
            // Redirecting to the add form
            $this->redirect('user-edit', $userId);
        }
    }

    /**
     * @param int $userId
     * @return void
     */
    public function delete($userId)
    {
        $user = User::find($userId);
        
        $user->delete();

        $_SESSION['successMessage'] = "Utilisateur bien supprimé !";

        $this->redirect('user-list');
    }
}
