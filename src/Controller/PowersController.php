<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Powers Controller
 *
 * @property \App\Model\Table\PowersTable $Powers
 */
class PowersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $powers = $this->paginate($this->Powers);

        $this->set(compact('powers'));
        $this->set('_serialize', ['powers']);
    }

    /**
     * View method
     *
     * @param string|null $id Power id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $power = $this->Powers->get($id, [
            'contain' => ['Abilities']
        ]);

        $this->set('power', $power);
        $this->set('_serialize', ['power']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $power = $this->Powers->newEntity();
        if ($this->request->is('post')) {
            $power = $this->Powers->patchEntity($power, $this->request->data);
            if ($this->Powers->save($power)) {
                $this->Flash->success(__('The power has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The power could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('power'));
        $this->set('_serialize', ['power']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Power id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $power = $this->Powers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $power = $this->Powers->patchEntity($power, $this->request->data);
            if ($this->Powers->save($power)) {
                $this->Flash->success(__('The power has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The power could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('power'));
        $this->set('_serialize', ['power']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Power id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $power = $this->Powers->get($id);
        if ($this->Powers->delete($power)) {
            $this->Flash->success(__('The power has been deleted.'));
        } else {
            $this->Flash->error(__('The power could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
