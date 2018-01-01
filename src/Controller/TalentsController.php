<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Talents Controller
 *
 * @property \App\Model\Table\TalentsTable $Talents
 *
 * @method \App\Model\Entity\Talent[] paginate($object = null, array $settings = [])
 */
class TalentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $talents = $this->paginate($this->Talents);

        $this->set(compact('talents'));
    }

    /**
     * View method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $talent = $this->Talents->get($id, [
            'contain' => ['TalentServices', 'UserTalents']
        ]);

        $this->set('talent', $talent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $talent = $this->Talents->newEntity();
        if ($this->request->is('post')) {
            $talent = $this->Talents->patchEntity($talent, $this->request->getData());
            if ($this->Talents->save($talent)) {
                $this->Flash->success(__('The talent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The talent could not be saved. Please, try again.'));
        }
        $this->set(compact('talent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $talent = $this->Talents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $talent = $this->Talents->patchEntity($talent, $this->request->getData());
            if ($this->Talents->save($talent)) {
                $this->Flash->success(__('The talent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The talent could not be saved. Please, try again.'));
        }
        $this->set(compact('talent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $talent = $this->Talents->get($id);
        if ($this->Talents->delete($talent)) {
            $this->Flash->success(__('The talent has been deleted.'));
        } else {
            $this->Flash->error(__('The talent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
