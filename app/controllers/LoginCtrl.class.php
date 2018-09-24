<?php

namespace app\controllers;
use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use PDOException;
use app\transfer\User;
use app\forms\LoginForm;

class LoginCtrl {
    
    private $form;
    // Inicjalizacja właściwości
    public function __construct() {
        $this->form = new LoginForm();
    }
    
    // Pobranie i walidacja parametrów
    public function validate() {
        // Pobieramy login i hasło z request-a
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->password = ParamUtils::getFromRequest('pass');
        // Dodajemy informację o pobraniu oarametrów
       
        
        // Sprawdzamy, czy parametry zostały zadeklarowane
        if (!(isset($this->form->login) && isset($this->form->password))) {
            return false;
        }
        
        // Sprawdzamy, czy wystąpiły jakieś błędy
        if (!App::getMessages()->isError()) {
            //Sprawdzamy, czy login nie jest pustym ciągiem
            if ($this->form->login == "") {
                Utils::addErrorMessage('Nie podano loginu!');
            }
            //Sprawdzamy, czy hasło nie jest pustym ciągiem
            if ($this->form->password == "") {
                Utils::addErrorMessage('Nie podano hasła!');
            }
        }
        
        // Sprawdzamy, czy wystąpiły jakieś błędy
        if (!App::getMessages()->isError()) {
            Utils::addInfoMessage('Poprawnie zwalidowano parametry.');
            
            try {
                // Pobieramy z bazy użytkownika o podanym loginie i haśle
                $result = App::getDB()->select(
                        "users", 
                    [
                        "login", 
                        "password"
        
                        
                    ],[
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "LIMIT" => 1
                    ]);
                // Sprawdzamy czy użytkownik został znaleziony
                if (count($result) == 1) {
                    // Tworzymy obiekt użytkownika
                    $user = new User(
                        $result[0]['login'], 
                        $result[0]['password'], 
                        'user');
                       
                    
                    // Zapisujemy nowo utworzony obiekt użytkownika w sesji
                    SessionUtils::store('user', serialize($user));
                    
                    // Zapisujemy w sesji role użytkownika
                    RoleUtils::addRole($user->role);
                    Utils::addInfoMessage('Pomyślnie zalogowano.');
                } else {
                    // Jeżeli użytkownik nie został znaleziony dodajemy błąd
                    Utils::addErrorMessage('Niepoprawny login lub hasło!');
                }  
                
            } catch (PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas logowania.');
                // Jeżeli jest włączony tryb debugowana zapisz dodatkowe informacje o błędzie
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        // Zwracamy wartość true lub false w zależności od wystąpienia błędów
        return !App::getMessages()->isError();
    }
    // Akcja logowania
    
      public function action_loginShow() {
        $this->generateView();
    }
    
    public function action_login() {
        // Sprawdzenie, czy pobranie, walidacja i logowanie zakończyło się pomyślnie
        if ($this->validate()) {
            // Przekierowanie na strone główną
            //header("Location: " . App::getConf()->app_url . "/");
            App::getRouter()->redirectTo("carList");
        } else {
            // Wygenerowanie widoku
            $this->generateView();
        }
    }
    // Akcja wylogowywania
    public function action_logout() {
        // Wyczyszczenie sesji
        session_destroy();
        // Dodanie informacji o poprawnym wylogowywaniu
        Utils::addInfoMessage('Poprawnie wylogowano z systemu.');
        // Wygenerowanie widoku
        $this->generateView();
    }
    // Wygeneruj widok
    public function generateView() {
       
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }
}
