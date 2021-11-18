<?php

// For more comments, see the CardController.php

namespace App\Controllers;

use App\Models\{Role, Game};

class RoleController extends CoreController {

    /**
     * @return void
     */
    public function list()
    {
        $games= Game::findAll();
        $roles = Role::findAll();
    
        $token = $this->generateCSRFToken();

        $this->show('role/list', [
            'roles' => $roles,
            'games' => $games,
            'token' => $token
        ]);
    }

    
    /**
     * @return void
     */
    public function add()
    {
        $games= Game::findAll();
        $token = $this->generateCSRFToken();
        $this->show('role/add', [
            'token' => $token,
            'games' => $games,
        ]);
    }

    /**
     * @return void
     */
    public function create()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $excerpt = filter_input(INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description');
        $side = filter_input(INPUT_POST, 'side', FILTER_SANITIZE_STRING);
        $first_night = filter_input(INPUT_POST, 'first_night', FILTER_SANITIZE_NUMBER_INT);
        $game_id = filter_input(INPUT_POST, 'game_id', FILTER_SANITIZE_NUMBER_INT);
        
        $newRole = new Role();

        $newRole->setName($name);
        $newRole->setPicture($picture);
        $newRole->setExcerpt($excerpt);
        $newRole->setDescription($description);
        $newRole->setSide($side);
        $newRole->setFirstNight($first_night);
        $newRole->setGameId($game_id);

        $newRole->save();
        
        $this->redirect('role-list');

    }

    /**
     * @param int $ruleId
     * @return void
     */
    public function edit($ruleId)
    {
        $games = Game::findAll();
        
        $role = Role::find($ruleId);

        $token = $this->generateCSRFToken();

        $this->show('role/edit', [
            'role' => $role,
            'token' => $token,
            'games' => $games,
        ]);
    }

    /**
     * @param int $roleId
     * @return void
     */
    public function update($roleId)
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $excerpt = filter_input(INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description');
        $side = filter_input(INPUT_POST, 'side', FILTER_SANITIZE_STRING);
        $first_night = filter_input(INPUT_POST, 'first_night', FILTER_SANITIZE_NUMBER_INT);
        $game_id = filter_input(INPUT_POST, 'game_id', FILTER_SANITIZE_NUMBER_INT);
        
        $role = Role::find($roleId);
        
        $role->setName($name);
        $role->setPicture($picture);
        $role->setExcerpt($excerpt);
        $role->setDescription($description);
        $role->setSide($side);
        $role->setFirstNight($first_night);
        $role->setGameId($game_id);
        
        $role->save();
        
        $this->redirect('role-list');

    }
    /**
     * @param int $ruleId
     * @return void
     */
    public function delete($ruleId)
    {        
        $role = Role::find($ruleId);
        
        $role->delete();
        
        $_SESSION['successMessage'] = "Rôle bien supprimé !";
        
        $this->redirect('role-list');
    }
}
