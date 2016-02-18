<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modifiers Controller
 *
 * @property \App\Model\Table\ModifiersTable $Modifiers
 */
class ModifiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Displays', 'ModifierClasses', 'ModifierTypes']
        ];
        $modifiers = $this->paginate($this->Modifiers);

        $this->set(compact('modifiers'));
        $this->set('_serialize', ['modifiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Modifier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modifier = $this->Modifiers->get($id, [
            'contain' => ['Displays', 'ModifierClasses', 'ModifierTypes', 'ModifierValues']
        ]);

        $this->set('modifier', $modifier);
        $this->set('_serialize', ['modifier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modifier = $this->Modifiers->newEntity();
        if ($this->request->is('post')) {
            $modifier = $this->Modifiers->patchEntity($modifier, $this->request->data);
            if ($this->Modifiers->save($modifier)) {
                $this->Flash->success(__('The modifier has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modifier could not be saved. Please, try again.'));
            }
        }
        $displays = $this->Modifiers->Displays->find('list', ['limit' => 200]);
        $modifierClasses = $this->Modifiers->ModifierClasses->find('list', ['limit' => 200]);
        $modifierTypes = $this->Modifiers->ModifierTypes->find('list', ['limit' => 200]);
        $this->set(compact('modifier', 'displays', 'modifierClasses', 'modifierTypes'));
        $this->set('_serialize', ['modifier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modifier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modifier = $this->Modifiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modifier = $this->Modifiers->patchEntity($modifier, $this->request->data);
            if ($this->Modifiers->save($modifier)) {
                $this->Flash->success(__('The modifier has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modifier could not be saved. Please, try again.'));
            }
        }
        $displays = $this->Modifiers->Displays->find('list', ['limit' => 200]);
        $modifierClasses = $this->Modifiers->ModifierClasses->find('list', ['limit' => 200]);
        $modifierTypes = $this->Modifiers->ModifierTypes->find('list', ['limit' => 200]);
        $this->set(compact('modifier', 'displays', 'modifierClasses', 'modifierTypes'));
        $this->set('_serialize', ['modifier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modifier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modifier = $this->Modifiers->get($id);
        if ($this->Modifiers->delete($modifier)) {
            $this->Flash->success(__('The modifier has been deleted.'));
        } else {
            $this->Flash->error(__('The modifier could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
