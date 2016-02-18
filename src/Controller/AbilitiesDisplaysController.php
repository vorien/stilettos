<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AbilitiesDisplays Controller
 *
 * @property \App\Model\Table\AbilitiesDisplaysTable $AbilitiesDisplays
 */
class AbilitiesDisplaysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Abilities', 'Displays']
        ];
        $abilitiesDisplays = $this->paginate($this->AbilitiesDisplays);

        $this->set(compact('abilitiesDisplays'));
        $this->set('_serialize', ['abilitiesDisplays']);
    }

    /**
     * View method
     *
     * @param string|null $id Abilities Display id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $abilitiesDisplay = $this->AbilitiesDisplays->get($id, [
            'contain' => ['Abilities', 'Displays']
        ]);

        $this->set('abilitiesDisplay', $abilitiesDisplay);
        $this->set('_serialize', ['abilitiesDisplay']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $abilitiesDisplay = $this->AbilitiesDisplays->newEntity();
        if ($this->request->is('post')) {
            $abilitiesDisplay = $this->AbilitiesDisplays->patchEntity($abilitiesDisplay, $this->request->data);
            if ($this->AbilitiesDisplays->save($abilitiesDisplay)) {
                $this->Flash->success(__('The abilities display has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The abilities display could not be saved. Please, try again.'));
            }
        }
        $abilities = $this->AbilitiesDisplays->Abilities->find('list', ['limit' => 200]);
        $displays = $this->AbilitiesDisplays->Displays->find('list', ['limit' => 200]);
        $this->set(compact('abilitiesDisplay', 'abilities', 'displays'));
        $this->set('_serialize', ['abilitiesDisplay']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Abilities Display id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $abilitiesDisplay = $this->AbilitiesDisplays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $abilitiesDisplay = $this->AbilitiesDisplays->patchEntity($abilitiesDisplay, $this->request->data);
            if ($this->AbilitiesDisplays->save($abilitiesDisplay)) {
                $this->Flash->success(__('The abilities display has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The abilities display could not be saved. Please, try again.'));
            }
        }
        $abilities = $this->AbilitiesDisplays->Abilities->find('list', ['limit' => 200]);
        $displays = $this->AbilitiesDisplays->Displays->find('list', ['limit' => 200]);
        $this->set(compact('abilitiesDisplay', 'abilities', 'displays'));
        $this->set('_serialize', ['abilitiesDisplay']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Abilities Display id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $abilitiesDisplay = $this->AbilitiesDisplays->get($id);
        if ($this->AbilitiesDisplays->delete($abilitiesDisplay)) {
            $this->Flash->success(__('The abilities display has been deleted.'));
        } else {
            $this->Flash->error(__('The abilities display could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
