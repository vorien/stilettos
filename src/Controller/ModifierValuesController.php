<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ModifierValues Controller
 *
 * @property \App\Model\Table\ModifierValuesTable $ModifierValues
 */
class ModifierValuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modifiers']
        ];
        $modifierValues = $this->paginate($this->ModifierValues);

        $this->set(compact('modifierValues'));
        $this->set('_serialize', ['modifierValues']);
    }

    /**
     * View method
     *
     * @param string|null $id Modifier Value id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modifierValue = $this->ModifierValues->get($id, [
            'contain' => ['Modifiers']
        ]);

        $this->set('modifierValue', $modifierValue);
        $this->set('_serialize', ['modifierValue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modifierValue = $this->ModifierValues->newEntity();
        if ($this->request->is('post')) {
            $modifierValue = $this->ModifierValues->patchEntity($modifierValue, $this->request->data);
            if ($this->ModifierValues->save($modifierValue)) {
                $this->Flash->success(__('The modifier value has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modifier value could not be saved. Please, try again.'));
            }
        }
        $modifiers = $this->ModifierValues->Modifiers->find('list', ['limit' => 200]);
        $this->set(compact('modifierValue', 'modifiers'));
        $this->set('_serialize', ['modifierValue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modifier Value id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modifierValue = $this->ModifierValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modifierValue = $this->ModifierValues->patchEntity($modifierValue, $this->request->data);
            if ($this->ModifierValues->save($modifierValue)) {
                $this->Flash->success(__('The modifier value has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modifier value could not be saved. Please, try again.'));
            }
        }
        $modifiers = $this->ModifierValues->Modifiers->find('list', ['limit' => 200]);
        $this->set(compact('modifierValue', 'modifiers'));
        $this->set('_serialize', ['modifierValue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modifier Value id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modifierValue = $this->ModifierValues->get($id);
        if ($this->ModifierValues->delete($modifierValue)) {
            $this->Flash->success(__('The modifier value has been deleted.'));
        } else {
            $this->Flash->error(__('The modifier value could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
