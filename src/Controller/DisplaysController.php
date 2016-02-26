<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Displays Controller
 *
 * @property \App\Model\Table\DisplaysTable $Displays
 */
class DisplaysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $displays = $this->paginate($this->Displays);

        $this->set(compact('displays'));
        $this->set('_serialize', ['displays']);
    }

    /**
     * View method
     *
     * @param string|null $id Display id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $display = $this->Displays->get($id, [
            'contain' => ['Modifiers']
        ]);

        $this->set('display', $display);
        $this->set('_serialize', ['display']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $display = $this->Displays->newEntity();
        if ($this->request->is('post')) {
            $display = $this->Displays->patchEntity($display, $this->request->data);
            if ($this->Displays->save($display)) {
                $this->Flash->success(__('The display has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The display could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('display'));
        $this->set('_serialize', ['display']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Display id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $display = $this->Displays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $display = $this->Displays->patchEntity($display, $this->request->data);
            if ($this->Displays->save($display)) {
                $this->Flash->success(__('The display has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The display could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('display'));
        $this->set('_serialize', ['display']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Display id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $display = $this->Displays->get($id);
        if ($this->Displays->delete($display)) {
            $this->Flash->success(__('The display has been deleted.'));
        } else {
            $this->Flash->error(__('The display could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
