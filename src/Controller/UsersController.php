<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['ProductSignup', 'Products', 'Wallet', 'Withdrawals']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($company_id = null)
    {
        $this->viewBuilder()->layout('login');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->role = 'ADMIN';
            $user->company_id = $company_id;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login(){

    $this->viewBuilder()->layout('login');
        //debug($this->request);
        if ($this->request->is('post')) { // if the request gotten is a post request

            $user = $this->Auth->identify(); // identify the user
            //debug($this->Auth->user());
            if($user ){
                $this->Auth->setUser($user);
                //debug($this->Auth->user());
                if($this->Auth->user('status')){
                    if(empty($this->Auth->user('password'))):
                    \Cake\Datasource\ConnectionManager::get('default')->execute("UPDATE users SET md5_password = ? WHERE id = ?",[md5($this->request->data['password']),$this->Auth->user('id')]);
                endif;
                    //return $this->redirect(['controller' => 'companies', 'action' => 'dashboard', 'prefix' => 'admin']);
                    return $this->redirect($this->DecideUser->redirects($this->Auth->user()));
                }else{
                    $this->Flash->error(_(strtoupper($user['username'])." your access has been revoked , contact administrator."));
                }
            }else{
                 $this->Flash->error("Your username or password is incorrect");
            }
//            debug(ConnectionManager::get('default')->execute("SELECT * FROM affiliates where email = ? AND password  = ?",[$this->request->data['username'],$this->getPassword($this->request->data['password'])])->fetch('assoc'));
            //User could not be identified
           
        }

    }
    public function logout()
    {
        $this->Flash->success("You are now logged out");
        return $this->redirect($this->Auth->logout());
    }
     public function forgot(){
         $this->viewBuilder()->layout('login');
           
        // 
    }
    public function reset($id){
        $this->viewBuilder()->layout('login');
        $user = $this->Users->get(base64_decode($id));

        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->request->data('new_password') === $this->request->data('confirm_password')){
                $user = $this->Users->patchEntity($user, $this->request->data);
                $user->password = $this->request->data('new_password');
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user password has been saved.'));
                    
                    return $this->redirect(['action' => 'login']);
                }else{


                    $this->Flash->error(__('The user password reset error. Please, try again.'));
                }
            }else{
                $this->Flash->error(__('Passwords do not match. Please, Try again'));
            }
            
            
        }
    }
    public function getPassword($password){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
