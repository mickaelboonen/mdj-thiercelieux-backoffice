<?php
// For more comments, see the CardController.php

namespace App\Controllers;

use App\Models\{Game, Specificity};

class SpecificityController extends CoreController {

    /**
     * @return void
     */
    public function list()
    {
        $specificities = Specificity::findAll();
        
        $token = $this->generateCSRFToken();
        
        $this->show('specificity/list', [
            'specificities' => $specificities,
            'token' => $token
        ]);
    }

    
    /**
     * @return void
     */
    public function add()
    {
        $games = Game::findAll();

        $token = $this->generateCSRFToken();

        $this->show('specificity/add', [
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
        $hash = filter_input(INPUT_POST, 'hash', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description');
        $game_id = filter_input(INPUT_POST, 'game_id', FILTER_SANITIZE_NUMBER_INT);

        $newSpecificity = new Specificity();
        
        $newSpecificity->setName($name);
        $newSpecificity->setHash($hash);
        $newSpecificity->setDescription($description);
        $newSpecificity->setGameId($game_id);
        
        $newSpecificity->save();
        
        $this->redirect('specificity-list');

    }

    /**
     * @param int $specificityId
     * @return void
     */
    public function edit($specificityId)
    {
        $games = Game::findAll();

        $specificity = Specificity::find($specificityId);

        $token = $this->generateCSRFToken();

        $this->show('specificity/edit', [
            'specificity' => $specificity,
            'token' => $token,
            'games' => $games,
        ]);
    }

    /**
     * @param int $specificityId
     * @return void
     */
    public function update($specificityId)
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $hash = filter_input(INPUT_POST, 'hash', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description');
        $game_id = filter_input(INPUT_POST, 'game_id', FILTER_SANITIZE_NUMBER_INT);
        
        $specificity = Specificity::find($specificityId);
        
        $specificity->setName($name);
        $specificity->setHash($hash);
        $specificity->setDescription($description);
        $specificity->setGameId($game_id);
        
        $specificity->save();
        
        $this->redirect('specificity-list');

    }

    /**
     * @param int $specificityId
     * @return void
     */
    public function delete($specificityId)
    {
        $specificity = Specificity::find($specificityId);
        
        $specificity->delete();
        
        $_SESSION['successMessage'] = "Spécificité bien supprimée !";

        $this->redirect('specificity-list');
    }
}
