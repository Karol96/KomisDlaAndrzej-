<?php

namespace app\controllers;

use core\App;
use core\Utils;
use app\forms\CarShowForm;
use core\ParamUtils;


class CarShowCtrl {
    private $form; //dane formularza
    
    public function action_carShow() {
  
    
  
       try {
           $record = App::getDB()->get("cars", "*", [
                    "id_cars" => $this->form->id
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok
        
        App::getSmarty()->assign('cars', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('carShowView.tpl');
    }

}
    

      
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


