<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ModifierClasses Controller
 *
 * @property \App\Model\Table\ModifierClassesTable $ModifierClasses
 */
class ModifierClassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $modifierClasses = $this->paginate($this->ModifierClasses);

        $this->set(compact('modifierClasses'));
        $this->set('_serialize', ['modifierClasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Modifier Class id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modifierClass = $this->ModifierClasses->get($id, [
            'contain' => ['Modifiers']
        ]);

        $this->set('modifierClass', $modifierClass);
        $this->set('_serialize', ['modifierClass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modifierClass = $this->ModifierClasses->newEntity();
        if ($this->request->is('post')) {
            $modifierClass = $this->ModifierClasses->patchEntity($modifierClass, $this->request->data);
            if ($this->ModifierClasses->save($modifierClass)) {
                $this->Flash->success(__('The modifier class has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modifier class could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('modifierClass'));
        $this->set('_serialize', ['modifierClass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modifier Class id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modifierClass = $this->ModifierClasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modifierClass = $this->ModifierClasses->patchEntity($modifierClass, $this->request->data);
            if ($this->ModifierClasses->save($modifierClass)) {
                $this->Flash->success(__('The modifier class has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modifier class could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('modifierClass'));
        $this->set('_serialize', ['modifierClass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modifier Class id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modifierClass = $this->ModifierClasses->get($id);
        if ($this->ModifierClasses->delete($modifierClass)) {
            $this->Flash->success(__('The modifier class has been deleted.'));
        } else {
            $this->Flash->error(__('The modifier class could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
