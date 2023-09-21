<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\EmployeeModel;

use App\Controllers\BaseController;

class SigninController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $EmployeeModel = new EmployeeModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $EmployeeModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/users-list');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }
    public function logout()
{
    $session = session();
    $session->destroy(); // Destroy the user's session
    return redirect()->to('/signin'); // Redirect to the login page
}
}
