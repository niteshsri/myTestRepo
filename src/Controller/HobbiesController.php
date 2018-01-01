<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hobbies Controller
 *
 * @property \App\Model\Table\HobbiesTable $Hobbies
 *
 * @method \App\Model\Entity\Hobby[] paginate($object = null, array $settings = [])
 */
class HobbiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $hobbies = $this->paginate($this->Hobbies);

        $this->set(compact('hobbies'));
    }

    /**
     * View method
     *
     * @param string|null $id Hobby id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hobby = $this->Hobbies->get($id, [
            'contain' => ['UserHobbies']
        ]);

        $this->set('hobby', $hobby);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hobby = $this->Hobbies->newEntity();
        if ($this->request->is('post')) {
            $hobby = $this->Hobbies->patchEntity($hobby, $this->request->getData());
            if ($this->Hobbies->save($hobby)) {
                $this->Flash->success(__('The hobby has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hobby could not be saved. Please, try again.'));
        }
        $this->set(compact('hobby'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hobby id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hobby = $this->Hobbies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hobby = $this->Hobbies->patchEntity($hobby, $this->request->getData());
            if ($this->Hobbies->save($hobby)) {
                $this->Flash->success(__('The hobby has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hobby could not be saved. Please, try again.'));
        }
        $this->set(compact('hobby'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hobby id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hobby = $this->Hobbies->get($id);
        if ($this->Hobbies->delete($hobby)) {
            $this->Flash->success(__('The hobby has been deleted.'));
        } else {
            $this->Flash->error(__('The hobby could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
