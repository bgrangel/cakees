<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add']);
	}

	public function isAuthorized($user)
	{
		if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action,['home','logout']))
            {
            	return true;
            }
        }
        return parent::isAuthorized($user);
	}

	public function index() 
	{
		$users =$this->paginate($this->Users);
		$this->set('users',$users);
	}

	public function add()
	{
		$user = $this->Users->newEntity();
		if($this->request->is('post'))
		{
			$user = $this->Users->patchEntity($user,$this->request->data);

			$user->role='user';

			if($this->Users->save($user)) {
				$this->Flash->success('El usuario ha sido creado correctamente.');
				return $this->redirect(['controller'=>'Users','action'=>'login']);
			} else {
				$this->Flash->error('El usuario no pudo ser creado.');
			}
		}
		$this->set(compact('user'));

	}

	public function login()
	{
		if($this->request->is('post')) {
			$user = $this->Auth->identify();
			if($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Flash->error('Los datos son invalidos.', ['key'=>'auth']);
			}
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
	public function home()
	{
		$this->render();
	}

	public function edit($id = null)
	{
		$user = $this->Users->get($id);

		if($this->request->is(['patch','post','put']))
		{
			$user = $this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user))
			{
				$this->Flash->success('El usuario ha sido modificado');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('El usuario no ha sido modificado');
			}
		}

		$this->set(compact('user'));
	}
}
