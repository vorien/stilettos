<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ModifierTypes Controller
 *
 * @property \App\Model\Table\ModifierTypesTable $ModifierTypes
 */
class ModifierTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $modifierTypes = $this->paginate($this->ModifierTypes);

        $this->set(compact('modifierTypes'));
        $this->set('_serialize', ['modifierTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Modifier Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modifierType = $this->ModifierTypes->get($id, [
            'contain' => ['Modifiers']
        ]);

        $this->set('modifierType', $modifierType);
        $this->set('_serialize', ['modifierType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modifierType = $this->ModifierTypes->newEntity();
        if ($this->request->is('post')) {
            $modifierType = $this->ModifierTypes->patchEntity($modifierType, $this->request->data);
            if ($this->ModifierTypes->save($modifierType)) {
                $this->Flash->success(__('The modifier type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modifier type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('modifierType'));
        $this->set('_serialize', ['modifierType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modifier Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modifierType = $this->ModifierTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modifierType = $this->ModifierTypes->patchEntity($modifierType, $this->request->data);
            if ($this->ModifierTypes->save($modifierType)) {
                $this->Flash->success(__('The modifier type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modifier type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('modifierType'));
        $this->set('_serialize', ['modifierType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modifier Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modifierType = $this->ModifierTypes->get($id);
        if ($this->ModifierTypes->delete($modifierType)) {
            $this->Flash->success(__('The modifier type has been deleted.'));
        } else {
            $this->Flash->error(__('The modifier type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
