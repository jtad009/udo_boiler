<?php
namespace DocumentControl\Controller;

use DocumentControl\Controller\AppController;

/**
 * Documents Controller
 *
 * @property \DocumentControl\Model\Table\DocumentsTable $Documents
 */
class DocumentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DocumentCategories']
        ];
        $documents = $this->paginate($this->Documents);

        $this->set(compact('documents'));
        $this->set('_serialize', ['documents']);
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => ['DocumentCategories']
        ]);

        $this->set('document', $document);
        $this->set('_serialize', ['document']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $document = $this->Documents->newEntity();
        if ($this->request->is('post')) {
            $document = $this->Documents->patchEntity($document, $this->request->data);
            $document->path = $this->Upload->send($this->request->data['path'],'document');
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $documentCategories = $this->Documents->DocumentCategories->find('list', ['keyField'=>'id','valueField'=>'category','limit' => 200])->where(['company_id'=>$this->Auth->user('company_id')]);
        $company = $this->Documents->Companies->find('list')->where(['id'=>$this->Auth->user('company_id')]);
        $this->set(compact('document', 'documentCategories','company'));
        $this->set('_serialize', ['document']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            if($this->request->data['path']['error'] > 0){
                $path = $document->path;
            }else{
                $path = $this->Upload->send($this->request->data['path'],'document');
            }
            
            $document = $this->Documents->patchEntity($document, $this->request->data);
            $document->path = $path;

            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $company = $this->Documents->Companies->find('list')->where(['id'=>$this->Auth->user('company_id')]);
        $documentCategories = $this->Documents->DocumentCategories->find('list', ['keyField'=>'id','valueField'=>'category','limit' => 200])->where(['company_id'=>$this->Auth->user('company_id')]);
        $this->set(compact('document', 'documentCategories','company'));
        $this->set('_serialize', ['document']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
