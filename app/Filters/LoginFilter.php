<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = NULL)
    {
        if (!session("id")) {
            // session()->set("error", "id null");
            return redirect()->to('/error1');
        }

        if (!session("username")) {
            return redirect()->to('/error2');
        }

        if (session("role") != 1) {
            return redirect()->to('/error3');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = NULL)
    {
        // Do something here
    }
}
