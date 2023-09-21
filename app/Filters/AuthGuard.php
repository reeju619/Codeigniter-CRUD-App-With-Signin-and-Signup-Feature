<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
   {
    if (!session()->get('isLoggedIn'))
    {
        echo "AuthGuard: User is not authenticated"; // Add this line for debugging
        return redirect()->to('/signin');
    }
}
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}