<?php
// For more comments, see the CardController.php

namespace App\Controllers;

use App\Models\{Village, Game};

class VillageController extends CoreController {

    /**
     * @return void
     */
    public function list()
    {
        $games= Game::findAll();

        $villagers = Village::findAll();
    
        $token = $this->generateCSRFToken();

        $this->show('village/list', [
            'villagers' => $villagers,
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
        
        $this->show('village/add', [
            'token' => $token,
        ]);
    }

    /**
     * @return void
     */
    public function create()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_URL );
        $token_name = filter_input(INPUT_POST, 'token_name', FILTER_SANITIZE_STRING);
        $token_picture = filter_input(INPUT_POST, 'token_picture', FILTER_SANITIZE_URL );
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
        $description = filter_input(INPUT_POST, 'description');
        $has_building = filter_input(INPUT_POST, 'has_building', FILTER_SANITIZE_NUMBER_INT);
        $is_permanent = filter_input(INPUT_POST, 'is_permanent', FILTER_SANITIZE_NUMBER_INT);
        
        $newRole = new Village();
        
        $newRole->setName($name);
        $newRole->setPicture($picture);
        $newRole->setTokenName($token_name);
        $newRole->setTokenPicture($token_picture);
        $newRole->setQuantity($quantity);
        $newRole->setDescription($description);
        $newRole->setHasBuilding($has_building);
        $newRole->setIsPermanent($is_permanent);
        
        $newRole->save();
        
        $this->redirect('village-list');
    }

    /**
     * @param int $specificityId
     * @return void
     */
    public function edit($ruleId)
    {
        $villager = Village::find($ruleId);
        
        $token = $this->generateCSRFToken();

        $this->show('village/edit', [
            'villager' => $villager,
            'token' => $token,
        ]);
    }

    /**
     * @param int $villagerId
     * @return void
     */
    public function update($villagerId)
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_URL );
        $token_name = filter_input(INPUT_POST, 'token_name', FILTER_SANITIZE_STRING);
        $token_picture = filter_input(INPUT_POST, 'token_picture', FILTER_SANITIZE_URL );
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
        $description = filter_input(INPUT_POST, 'description');
        $has_building = filter_input(INPUT_POST, 'has_building', FILTER_SANITIZE_NUMBER_INT);
        $is_permanent = filter_input(INPUT_POST, 'is_permanent', FILTER_SANITIZE_NUMBER_INT);
        
        $villager = Village::find($villagerId);
        
        $villager->setName($name);
        $villager->setPicture($picture);
        $villager->setTokenName($token_name);
        $villager->setTokenPicture($token_picture);
        $villager->setQuantity($quantity);
        $villager->setDescription($description);
        $villager->setHasBuilding($has_building);
        $villager->setIsPermanent($is_permanent);
        
        $villager->save();
        
        $this->redirect('village-list');

    }

    /**
     * @param int $ruleId
     * @return void
     */
    public function delete($ruleId)
    {
        $villager = Village::find($ruleId);
        
        $villager->delete();

        $_SESSION['successMessage'] = "Villageois bien supprimé !";

        $this->redirect('village-list');
    }
}
