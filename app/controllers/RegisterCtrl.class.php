<?php
namespace app\controllers;
use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\RegisterForm;
class RegisterCtrl {
    private $form;
    public function __construct() {
        $this->form = new RegisterForm();
    }
    
     public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->password = ParamUtils::getFromRequest('password');
        $this->form->email = ParamUtils::getFromRequest('email');
        
         // Sprawdź, czy wszystkie parametry zostaly przeslane
         if(!(isset($this->form->login) && isset($this->form->password) && isset($this->form->email)))
            return false;
        
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
            
        if (empty($this->form->password)) {
            Utils::addErrorMessage('Nie podano hasła');
        }
        
        if (empty($this->form->email)) {
            Utils::addErrorMessage('Nie podano emaila');
        }
		
	    return !App::getMessages()->isError();
     }
     
    public function action_register() {
       // Sprawdzenie, czy pobranie, walidacja i logowanie zakończyło się pomyślnie
        if ($this->validate()) {
            // Przekierowanie na strone główną
            header("Location: " . App::getConf()->app_url . "/");
			
			 App::getDB()->insert("users", [
                "login" => $this->form->login,
                "password" => $this->form->password,
                "email" => $this->form->email
            ]);
			
			Utils::addInfoMessage('Pomyślnie utworzono konto');	
        } else {
            // Wygenerowanie widoku
            $this->generateView();
        }
        }
      
    public function generateView() {
        App::getSmarty()->assign('page_title','Strona logowania'); 
        App::getSmarty()->assign('form', $this->form); 
        App::getSmarty()->display('RegisterView.tpl');
    }
}