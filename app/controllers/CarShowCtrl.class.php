<?php

namespace app\controllers;

use core\App;
use core\Utils;
use app\forms\CarShowForm;
use core\ParamUtils;


class CarShowCtrl {

  
   
    private $form; 
   

      public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new CarShowForm();
    }
    
    

    public function action_carShow() {
       
       

      
     
     
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        try {
         App::getDB()->get("cars", "*", [
                    "id_cars" => $this->form->id
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok
        App::getSmarty()->assign('form', $this->form);
        
        App::getSmarty()->display('carShowView.tpl');
    }

}
    

      
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


