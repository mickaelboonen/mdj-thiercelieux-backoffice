<?php

// For more comments, see the CardController.php

namespace App\Controllers;

use App\Models\Game;

class GameController extends CoreController {

    /**
     * @return void
     */
    public function list()
    {
        $games = Game::findAll();
    
        $token = $this->generateCSRFToken();
        
        $this->show('game/list', [
            'games' => $games,
            'token' => $token
        ]);
    }

    
    /**
     * @return void
     */
    public function add()
    {
        $token = $this->generateCSRFToken();

        $this->show('game/add', ['token' => $token]);
    }

    /**
     * @return void
     */
    public function create()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $hash = filter_input(INPUT_POST, 'hash', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description');
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_URL);
        $icon = filter_input(INPUT_POST, 'icon', FILTER_SANITIZE_URL);
        $specificity = filter_input(INPUT_POST, 'specificity', FILTER_SANITIZE_NUMBER_INT);
        
        $newGame = new Game();
        
        $newGame->setName($name);
        $newGame->setHash($hash);
        $newGame->setDescription($description);
        $newGame->setPicture($picture);
        $newGame->setIcon($icon);
        $newGame->setSpecificity($specificity);
        
        $newGame->save();
        
        $this->redirect('game-list');

    }

    /**
     * @param int $categoryId
     * @return void
     */
    public function edit($gameId)
    {
        $game = Game::find($gameId);

        $token = $this->generateCSRFToken();

        $this->show('game/edit', [
            'game' => $game,
            'token' => $token
        ]);
    }

    /**
     * @param int $gameId
     * @return void
     */
    public function update($gameId)
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $hash = filter_input(INPUT_POST, 'hash', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description');
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_URL);
        $icon = filter_input(INPUT_POST, 'icon', FILTER_SANITIZE_URL);
        $specificity = filter_input(INPUT_POST, 'specificity', FILTER_SANITIZE_NUMBER_INT);
        
        $game = Game::find($gameId);
        
        $game->setName($name);
        $game->setHash($hash);
        $game->setDescription($description);
        $game->setPicture($picture);
        $game->setIcon($icon);
        $game->setSpecificity($specificity);
        
        $game->save();
        
        $this->redirect('game-list');

    }

    /**
     * @param int $gameId
     * @return void
     */
    public function delete($gameId)
    {
        $game = Game::find($gameId);
        
        $game->delete();

        $_SESSION['successMessage'] = "Jeu bien supprimée !";

        $this->redirect('game-list');
    }
}
