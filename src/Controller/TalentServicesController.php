<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TalentServices Controller
 *
 * @property \App\Model\Table\TalentServicesTable $TalentServices
 *
 * @method \App\Model\Entity\TalentService[] paginate($object = null, array $settings = [])
 */
class TalentServicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Talents', 'Services']
        ];
        $talentServices = $this->paginate($this->TalentServices);

        $this->set(compact('talentServices'));
    }

    /**
     * View method
     *
     * @param string|null $id Talent Service id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $talentService = $this->TalentServices->get($id, [
            'contain' => ['Talents', 'Services', 'UserTalentServices']
        ]);

        $this->set('talentService', $talentService);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $talentService = $this->TalentServices->newEntity();
        if ($this->request->is('post')) {
            $talentService = $this->TalentServices->patchEntity($talentService, $this->request->getData());
            if ($this->TalentServices->save($talentService)) {
                $this->Flash->success(__('The talent service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The talent service could not be saved. Please, try again.'));
        }
        $talents = $this->TalentServices->Talents->find('list', ['limit' => 200]);
        $services = $this->TalentServices->Services->find('list', ['limit' => 200]);
        $this->set(compact('talentService', 'talents', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Talent Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $talentService = $this->TalentServices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $talentService = $this->TalentServices->patchEntity($talentService, $this->request->getData());
            if ($this->TalentServices->save($talentService)) {
                $this->Flash->success(__('The talent service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The talent service could not be saved. Please, try again.'));
        }
        $talents = $this->TalentServices->Talents->find('list', ['limit' => 200]);
        $services = $this->TalentServices->Services->find('list', ['limit' => 200]);
        $this->set(compact('talentService', 'talents', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Talent Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $talentService = $this->TalentServices->get($id);
        if ($this->TalentServices->delete($talentService)) {
            $this->Flash->success(__('The talent service has been deleted.'));
        } else {
            $this->Flash->error(__('The talent service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
