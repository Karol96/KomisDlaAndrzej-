<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('loginShow'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions


Utils::addRoute('carList',    'CarListCtrl');
Utils::addRoute('loginShow',         'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('register', 'RegisterCtrl');
Utils::addRoute('carNew',     'CarEditCtrl',	['user','admin']);
Utils::addRoute('carEdit',    'CarEditCtrl',	['user','admin']);
Utils::addRoute('carSave',    'CarEditCtrl',	['user','admin']);
Utils::addRoute('carDelete',  'CarEditCtrl',	['admin']);
Utils::addRoute('profil',    'ProfilCtrl',	['user','admin']);
Utils::addRoute('carShow',    'CarShowCtrl',	['user','admin']);




//Utils::addRoute('action_name', 'controller_class_name');