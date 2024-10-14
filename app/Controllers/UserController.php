<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\UserApiService;
class UserController extends BaseController
{
    protected $userApiService;
    public function __construct()
    {
        $this->userApiService = new UserApiService();
    }
    public function getList()
    {
        $users = $this->userApiService->findAll();
        return view('users/list', ['users' => $users]);
    }
    public function saveUser() {
        $data = [
            'id' => '',
            'name' => $this->request->getPost('name'),
            'lastname' => $this->request->getPost('lastname'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'birthdate' => $this->request->getPost('birthdate')
        ];
        try {
            $response = $this->userApiService->register($data);
            session()->setFlashdata('success', '¡Usuario registrado correctamente!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'No se pudo registrar el usuario');
            return view('users/register', [
                'user' => $data,
                'isFormEdit' => 0,
            ]);
        }
    }
    public function editUser() {
        $id = $this->request->getPost('id');

        $user = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'lastname' => $this->request->getPost('lastname'),
            'username' => $this->request->getPost('username'),
            'birthdate' => $this->request->getPost('birthdate')
        ];
        $data = [
            'user' => $user,
            'isFormEdit' => 1,
            'validation' => null
        ];
        $rules = config('Validation')->createUser;
        if ($this->request->getPost('password')) {
            $user['password'] = $this->request->getPost('password');
        }
        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['user']['password'] = '';
            return view('users/register', $data);
        }

        try {
            if ($this->request->getPost('password')) {
                $user['password'] = $this->request->getPost('password');
            }
            $response = $this->userApiService->update($id, $user);
            session()->setFlashdata('success', '!Usuario actualizado correctamente!');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'No se pudo actualizar el usuario');
        }
        $data['user']['password'] = '';
        return view('users/register', $data);

    }
    public function deleteUser($id){
        try {
            $response = $this->userApiService->delete($id);
            session()->setFlashdata('delete-success', 1);
        } catch (\Exception $e) {
            session()->setFlashdata('error-delete', 0);
        }
        return redirect()->to('users');
    }
    public function getRegister(){
        $user = [
            'id' => '',
            'name' => '',
            'lastname' => '',
            'username' => '',
            'password' => '',
            'birthdate' => null
        ];
        return view('users/register', [
            'user' => $user,
            'isFormEdit' => 0,
        ]);
    }
    public function getEdit($id){
        $user = $this->userApiService->getById($id);
        $user['password'] = '';
        return view('users/register', [
            'user' => $user,
            'isFormEdit' => 1,
        ]);
    }
}
