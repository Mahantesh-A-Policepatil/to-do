<?php namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        helper(['form']);
        echo view('auth/register');
    }

    public function registerSubmit()
    {
        helper(['form']);
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return view('auth/register', ['validation' => $this->validator]);
        }

        $model = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $model->save($data);

        return redirect()->to('/login')->with('message', 'Registered successfully!');
    }

    public function login()
    {
        helper(['form']);
        echo view('auth/login');
    }

    public function loginSubmit()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set(['user_id' => $user['id'], 'user_name' => $user['name'], 'isLoggedIn' => true]);
            return redirect()->to('/tasks');
        } else {
            return redirect()->back()->with('error', 'Invalid login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
