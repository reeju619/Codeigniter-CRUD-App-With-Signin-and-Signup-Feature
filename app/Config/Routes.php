<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authGuard']);
$routes->get('/logout', 'SigninController::logout', ['filter' => 'authGuard']);
$routes->get('/users-list', 'UserCrud::index', ['filter' => 'authGuard']);
$routes->get('user-form', 'UserCrud::create', ['filter' => 'authGuard']);
$routes->get('edit-view/(:num)', 'UserCrud::singleUser/$1', ['filter' => 'authGuard']);
$routes->get('delete/(:num)', 'UserCrud::delete/$1', ['filter' => 'authGuard']);
$routes->post('update', 'UserCrud::update');
$routes->post('submit-form', 'UserCrud::store');
$routes->get('/forgot-password', 'ForgotPasswordController::index');
$routes->post('/forgot-pass', 'ForgotPasswordController::sendResetLink');
$routes->post('/reset-password', 'ResetPasswordController::resetPassword');
$routes->get('/reset-password/(:any)', 'ResetPasswordController::showResetForm/$1');
$routes->post('/reset-password/(:any)', 'ResetPasswordController::resetPassword/$1');


