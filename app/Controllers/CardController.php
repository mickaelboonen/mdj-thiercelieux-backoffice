<?php

namespace App\Controllers;

use App\Models\{Card};

class CardController extends CoreController {

    /**
     * Method for the listing of New Moon cards
     * @return void
     */
    public function list()
    {
        // instantiation of the Card Class
        // and use of the static method findAll()
        // Returns an array with the list of cards
        $cards = Card::findAll();
    
        // Generates a CSRF token  to protect the delete links
        $token = $this->generateCSRFToken();

        /**
         * Method show in the CoreController to display the appropriate template
         * @param string path to the tpl
         * @param array data for the tpl
         */
        $this->show('card/list', [
            'cards' => $cards,
            'token' => $token
        ]);
    }

    
    /**
     * Method to display the form to add a new card
     * @return void
     */
    public function add()
    {
        // Generates a CSRF token 
        $token = $this->generateCSRFToken();

        /**
         * Method show in the CoreController to display the appropriate template
         * @param string path to the tpl
         * @param array data for the tpl
         */
        $this->show('Card/add', [
            'token' => $token,
        ]);
    }

    /**
     * POST method to create a new card
     * @return void
     */
    public function create()
    {
        // We get the values stored in the $_POST after submitting the form
        // We apply sanitizing filters to clean the answers
        // But not on description, because we need the HTML in it.
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description');
        $phase = filter_input(INPUT_POST, 'phase', FILTER_SANITIZE_STRING);

        // Instantiation of a new object Card
        $newCard = new Card();

        // We use the setters of the object to set the form values to the object attributes
        $newCard->setName($name);
        $newCard->setPicture($picture);
        $newCard->setDescription($description);
        $newCard->setPhase($phase);

        // We use the save() method from the CoreModel to determine what method to use
        $newCard->save();
        
        /**
         * Redirects to the chosen route
         * @param string $unique key of a route
         */
        $this->redirect('card-list');
    }

    /**
     * Method to display the form for modifying a card
     * @param int $cardId
     * @return void
     */
    public function edit($cardId)
    {
        /**
         * Instantiation of the current Card with the method find()
         * @param int $cardId
         */
        $card = Card::find($cardId);

        // Generates a CSRF token 
        $token = $this->generateCSRFToken();

        /**
         * Method show in the CoreController to display the appropriate template
         * @param string path to the tpl
         * @param array data for the tpl
         */
        $this->show('card/edit', [
            'card' => $card,
            'token' => $token,
        ]);
    }


    public function update($cardId)
    {    
        // TODO : https://github.com/ezyang/htmlpurifier
        // A essayer pour pouvoir sanitize les descriptiosn tout en gardant certains tags


        // We get the values stored in the $_POST after submitting the form
        // We apply sanitizing filters to clean the answers
        // But not on description, because we need the HTML in it.
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $phase = filter_input(INPUT_POST, 'phase', FILTER_SANITIZE_STRING);
        
        /**
         * Instantiation of the current Card with the method find()
         * @param int $cardId
         */
        $card = Card::find($cardId);
        
         // We use the setters of the object to set the form values to the object attributes
        $card->setName($name);
        $card->setPicture($picture);
        $card->setDescription($description);
        $card->setPhase($phase);

        // We use the save() method from the CoreModel to determine what method to use
        $card->save();
        
        /**
         * Redirects to the chosen route
         * @param string $unique key of a route
         */
        $this->redirect('card-list');
    }

    /**
     * Method to delete a card
     * @param int $cardId
     * @return void
     */
    public function delete($cardId)
    {
        /**
         * Instantiation of the current Card with the method find()
         * @param int $cardId
         */
        $card = Card::find($cardId);
        
        // We use the method delete()
        $card->delete();

        // We add a success message to the $_SESSION
        $_SESSION['successMessage'] = "Carte bien supprimée !";

        // Then, we redirect to the page listing all cards
        $this->redirect('card-list');
    }
}
