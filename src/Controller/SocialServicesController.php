<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SocialServices Controller
 *
 * @property \App\Model\Table\SocialServicesTable $SocialServices
 *
 * @method \App\Model\Entity\SocialService[] paginate($object = null, array $settings = [])
 */
class SocialServicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $socialServices = $this->paginate($this->SocialServices);

        $this->set(compact('socialServices'));
    }

    /**
     * View method
     *
     * @param string|null $id Social Service id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialService = $this->SocialServices->get($id, [
            'contain' => ['UserSocialConnections']
        ]);

        $this->set('socialService', $socialService);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialService = $this->SocialServices->newEntity();
        if ($this->request->is('post')) {
            $socialService = $this->SocialServices->patchEntity($socialService, $this->request->getData());
            if ($this->SocialServices->save($socialService)) {
                $this->Flash->success(__('The social service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social service could not be saved. Please, try again.'));
        }
        $this->set(compact('socialService'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Social Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialService = $this->SocialServices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialService = $this->SocialServices->patchEntity($socialService, $this->request->getData());
            if ($this->SocialServices->save($socialService)) {
                $this->Flash->success(__('The social service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social service could not be saved. Please, try again.'));
        }
        $this->set(compact('socialService'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Social Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialService = $this->SocialServices->get($id);
        if ($this->SocialServices->delete($socialService)) {
            $this->Flash->success(__('The social service has been deleted.'));
        } else {
            $this->Flash->error(__('The social service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
