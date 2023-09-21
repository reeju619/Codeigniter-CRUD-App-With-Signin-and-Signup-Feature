<?php

namespace App\Controllers;

use App\Models\EmployeeModel; // Replace with your user model
use CodeIgniter\Controller;

use App\Controllers\BaseController;

class ResetPasswordController extends BaseController
{
    public function showResetForm($token)
    {
        // Check if the token exists in the 'password_resets' table
        $resetData = db_connect()->table('password_resets')->where('token', $token)->first();

        if (!$resetData) {
            // Token not found, handle appropriately (e.g., show an error page)
            // You can also set a validation message and redirect
            return redirect()->to('/forgot-password')->with('error', 'Invalid reset token');
        }

        // Check if the token is expired (e.g., token expires in 1 hour)
        $createdTime = strtotime($resetData['created_at']);
        $currentTime = time();
        $tokenExpiration = 60 * 60; // 1 hour in seconds

        if (($currentTime - $createdTime) > $tokenExpiration) {
            // Token has expired, handle appropriately (e.g., show an error page)
            // You can also set a validation message and redirect
            return redirect()->to('/forgot-password')->with('error', 'Reset token has expired');
        }

        // Pass the token to the view and display the reset password form
        return view('reset_password', ['token' => $token]);
    }

    public function resetPassword()
    {
        // Validate the reset form (e.g., password confirmation)
        $validation = \Config\Services::validation(); // Load CodeIgniter's validation library

        $validation->setRules([
            'password' => 'required|min_length[8]|max_length[255]|matches[password_confirm]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, return to the reset form with errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Get the token and new password from the form
        $token = $this->request->getVar('token');
        $newPassword = $this->request->getVar('password');

        // Check if the token exists in the 'password_resets' table
        $resetData = db_connect()->table('password_resets')->where('token', $token)->first();

        if (!$resetData) {
            // Token not found, handle appropriately (e.g., show an error page)
            return redirect()->to('/forgot-password')->with('error', 'Invalid reset token');
        }

        // Check if the token is expired (you can use the same expiration check as in showResetForm)

        // Update the user's password in the 'users' table (replace 'password' with your actual password field name)
        $userModel = new UserModel(); // Replace with your user model
        $userModel->set('password', password_hash($newPassword, PASSWORD_BCRYPT));
        $userModel->where('email', $resetData['email'])->update();

        // Delete the used token from the 'password_resets' table
        db_connect()->table('password_resets')->where('token', $token)->delete();

        // Redirect to a success page or login page
        return redirect()->to('/signin')->with('success', 'Password reset successfully');
    }
}