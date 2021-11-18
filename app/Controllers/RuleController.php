<?php

// For more comments, see the CardController.php

namespace App\Controllers;

use App\Models\{Game, Rule, Specificity};

class RuleController extends CoreController {

    /**
     * @return void
     */
    public function list()
    {
        $rules = Rule::findAll();
        
        $token = $this->generateCSRFToken();
        
        $this->show('rule/list', [
            'rules' => $rules,
            'token' => $token
        ]);
    }

    
    /**
     * @return void
     */
    public function add()
    {
        $specificities = Specificity::findAll();

        $token = $this->generateCSRFToken();

        $this->show('rule/add', [
            'token' => $token,
            'specificities' => $specificities,
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
        $specificity_id = filter_input(INPUT_POST, 'specificity_id', FILTER_SANITIZE_NUMBER_INT);

        $newRule = new Rule();
        
        $newRule->setName($name);
        $newRule->setHash($hash);
        $newRule->setDescription($description);
        $newRule->setspecificityId($specificity_id);
        
        $newRule->save();
        
        $this->redirect('rule-list');

    }

    /**
     * @param int $specificityId
     * @return void
     */
    public function edit($ruleId)
    {
        $games = Game::findAll();
        
        $rule = Rule::find($ruleId);

        $token = $this->generateCSRFToken();

        $this->show('rule/edit', [
            'rule' => $rule,
            'token' => $token,
            'games' => $games,
        ]);
    }

    /**
     * @param int $ruleId
     * @return void
     */
    public function update($ruleId)
    {        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $hash = filter_input(INPUT_POST, 'hash', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description');
        $specificity_id = filter_input(INPUT_POST, 'specificity_id', FILTER_SANITIZE_NUMBER_INT);
        
        $specificity = Rule::find($ruleId);
        
        $specificity->setName($name);
        $specificity->setHash($hash);
        $specificity->setDescription($description);
        $specificity->setSpecificityId($specificity_id);
        
        $specificity->save();
        
        $this->redirect('rule-list');


    }

    /**
     * @param int $ruleId
     * @return void
     */
    public function delete($ruleId)
    {
        $specificity = Rule::find($ruleId);
        
        $specificity->delete();
        
        $_SESSION['successMessage'] = "Règle bien supprimée !";

        $this->redirect('rule-list');
    }
}
