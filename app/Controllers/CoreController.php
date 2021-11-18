<?php

namespace App\Controllers;

abstract class CoreController {

    public function __construct($routeName = '')
    {
        // Array of all protected routes
        // route unique key => [roles with permission to access]
        $acl = [
            'main-home' => [],
            'user-list' => ['admin'],
            'user-add' => ['admin'],
            'user-edit' => ['admin'],
            'user-delete' => ['admin'],
            'user-create' => ['admin'],
            'user-update' => ['admin'],
            'role-list' => ['admin', 'game-manager', 'guest'],
            'role-add' => ['admin', 'game-manager', 'guest'],
            'role-edit' => ['admin', 'game-manager', 'guest'],
            'role-delete' => ['admin', 'game-manager'],
            'role-create' => ['admin', 'game-manager'],
            'role-update' => ['admin', 'game-manager'],
            'village-list' => ['admin', 'game-manager', 'guest'],
            'village-add' => ['admin', 'game-manager', 'guest'],
            'village-edit' => ['admin', 'game-manager', 'guest'],
            'village-delete' => ['admin', 'game-manager'],
            'village-create' => ['admin', 'game-manager'],
            'village-update' => ['admin', 'game-manager'],
            'card-list' => ['admin', 'game-manager', 'guest'],
            'card-add' => ['admin', 'game-manager', 'guest'],
            'card-edit' => ['admin', 'game-manager', 'guest'],
            'card-delete' => ['admin', 'game-manager'],
            'card-create' => ['admin', 'game-manager'],
            'card-update' => ['admin', 'game-manager'],
            'game-list' => ['admin', 'game-manager', 'guest'],
            'game-add' => ['admin', 'game-manager', 'guest'],
            'game-edit' => ['admin', 'game-manager', 'guest'],
            'game-delete' => ['admin', 'game-manager'],
            'game-create' => ['admin', 'game-manager'],
            'game-update' => ['admin', 'game-manager'],
            'specificity-list' => ['admin', 'game-manager', 'guest'],
            'specificity-add' => ['admin', 'game-manager', 'guest'],
            'specificity-edit' => ['admin', 'game-manager', 'guest'],
            'specificity-delete' => ['admin', 'game-manager'],
            'specificity-create' => ['admin', 'game-manager'],
            'specificity-update' => ['admin', 'game-manager'],
            'rule-list' => ['admin', 'game-manager', 'guest'],
            'rule-add' => ['admin', 'game-manager', 'guest'],
            'rule-edit' => ['admin', 'game-manager', 'guest'],
            'rule-delete' => ['admin', 'game-manager'],
            'rule-create' => ['admin', 'game-manager'],
            'rule-update' => ['admin', 'game-manager'],
        ];

        // If the current route is in the $acl array
        if(array_key_exists($routeName, $acl) && !empty($routeName)) {
            // Then we get the authorized roles for the route
            $authorizedRoles = $acl[$routeName];
            /**
             * Function to check if the current user Role is authorized
             * @param array $authorizedRoles
             */
            $this->checkAuthorization($authorizedRoles);
        }

        // Array of all routes protected by CSRF token
        // 'unique key of the route' => 'method'
        $csrfRoutes = [
            // TODO
            'category-create' => 'post',
            'category-update' => 'post',
            'user-create' => 'post',
            'product-create' => 'post',
            'product-update' => 'post',
            'category-delete' => 'get',
            'category-savehomeorder' => 'post'
        ];

        // If the current route is in the csrfRoutes array, meaning it's protected
        if(array_key_exists($routeName, $csrfRoutes)) {

            // We get the type of the route
            $routeType = $csrfRoutes[$routeName];

            // We use the method to check if there is a match between tokens
            $this->checkCRSFToken($routeType);
        }
    }

    /**
     * Method checking if there is a CSRF token and if there is a match
     * 
     * @param string $method (GET or POST)
     * @return void
     */
    protected function checkCRSFToken($method)
    {
        // Depending on the method
        if($method == 'post') {
            
            // We get the token from $_POST
            $token = filter_input(INPUT_POST, 'token');
        } else {
            // Or from $_GET
            $token = filter_input(INPUT_GET, 'token');
        }

        // We get the token that is stored in $_SESSION
        $sessionToken = (isset($_SESSION['CSRFToken'])) ? $_SESSION['CSRFToken'] : '';

        // Does the token exist in the form ? In the session ? Are the two tokens different ? 
        if(empty($token) || empty($sessionToken) || $token != $sessionToken) {

            // If one of these conditions is true, then, we send the 403 view
            $errorController = new ErrorController;
            $errorController->err403();
        }
    }

    /**
     * Method to display HTML through views
     * 
     * @param string $viewName 
     * @param array $viewVars 
     * @return void
     */
    protected function show(string $viewName, $viewVars = []) {

        // TODO
        global $router;

        // Defining some variables that can be useful in templates
        $viewVars['currentPage'] = $viewName; 
        $viewVars['assetsBaseUri'] = $_SERVER['BASE_URI'] . '/assets/';
        $viewVars['baseUri'] = $_SERVER['BASE_URI'];

        // $viewVars keys are turned into variables 
        extract($viewVars);

        // Then we require all tpl that are to be displayed
        require_once __DIR__.'/../views/layout/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/layout/footer.tpl.php';
    }

    /**
     * Method for the route redirect ing system 
     * 
     * @param string $routeName
     * @return void
     */
    protected function redirect($routeName, $id = '')
    {
        // TODO 
        global $router;
        header('Location: ' . $router->generate($routeName). $id);
        exit;
    }

    /**
     * Generates a CSRF token to prevent cross-site requestes
     * @return string
     */
    public function generateCSRFToken()
    {
        // We generate a random string
        $bytes = random_bytes(15);

        // The bin2hex() function converts a string of ASCII characters to hexadecimal values.
        // https://www.php.net/manual/fr/function.bin2hex.php
        $token = bin2hex($bytes);

        // We store it in the SESSION
        $_SESSION['CSRFToken'] = $token;
        
        // And then we return it to use it in the view
        return $token;
    }

    /**
     * Method to check if the user has the right authorization for the current page
     *
     * @param array $roles
     * @return void
     */
    protected function checkAuthorization($roles = []) {
        
        // Checking if the user is connected
        if (isset($_SESSION['connectedUser'])) {

            // We get the connected user
            $connectedUser = $_SESSION['connectedUser'];

            // And then we get their role
            $userRole = $connectedUser->getRole();

            // If the user's role is not in the role array and the role array not empty
            if(!in_array($userRole, $roles) && !empty($roles)) {

                // We instantiate a new object from the ErrorController
                $errorController = new ErrorController;

                // We use the method err403 to display the 403 page 
                $errorController->err403();
            }
        }
        // If not, we redirect them to the login form
        else {
           $this->redirect('user-login'); 
        }
    }
}
