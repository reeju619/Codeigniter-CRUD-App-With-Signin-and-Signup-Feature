<?php

namespace App\Controllers;

use App\Models\EmployeeModel; // Replace with your user model
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

use App\Controllers\BaseController;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        // Display the forgot password form
        return view('forgot_password');
    }

    public function sendResetLink()
{
    $validation = \Config\Services::validation(); // Load CodeIgniter's validation library
    $email = $this->request->getVar('email');

    // Validate the email
    $validation->setRules([
        'email' => 'required|valid_email',
    ]);

    if (!$validation->run(['email' => $email])) {
        // Email validation failed
        return redirect()->to('/forgot-password')->with('error', 'Invalid email address');
    }

    $EmployeeModel = new EmployeeModel(); // Replace with your user model
    $user = $EmployeeModel->where('email', $email)->first();

    if (!$user) {
        // User with the given email does not exist
        return redirect()->to('/forgot-password')->with('error', 'User not found');
    }

    // Generate a unique token (you can use a library like random_bytes)
    $token = bin2hex(random_bytes(16));

    // Store the token in the database (create a 'password_resets' table)
    // The table should have columns: 'email', 'token', and 'created_at'
    $resetData = [
        'email' => $email,
        'token' => $token,
        'created_at' => date('Y-m-d H:i:s'),
    ];

    // Insert the token into the 'password_resets' table
    db_connect()->table('password_resets')->insert($resetData);
// Send an email with the reset link
$email = service('email'); // Load CodeIgniter's email library

$email->setTo($user['email']);
$email->setSubject('Password Reset');
$resetLink = base_url("/reset-password/{$token}"); // Generate the reset link
$email->setMessage(view('reset_password', ['resetLink' => $resetLink])); // Pass the link to the view

if ($email->send()) {
    return redirect()->to('/forgot-password')->with('success', 'Password reset link sent to your email');
} else {
    return redirect()->to('/forgot-password')->with('error', 'Failed to send reset link');
}

}

}
