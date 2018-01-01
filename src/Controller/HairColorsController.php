<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HairColors Controller
 *
 * @property \App\Model\Table\HairColorsTable $HairColors
 *
 * @method \App\Model\Entity\HairColor[] paginate($object = null, array $settings = [])
 */
class HairColorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $hairColors = $this->paginate($this->HairColors);

        $this->set(compact('hairColors'));
    }

    /**
     * View method
     *
     * @param string|null $id Hair Color id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hairColor = $this->HairColors->get($id, [
            'contain' => ['UserDetails']
        ]);

        $this->set('hairColor', $hairColor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hairColor = $this->HairColors->newEntity();
        if ($this->request->is('post')) {
            $hairColor = $this->HairColors->patchEntity($hairColor, $this->request->getData());
            if ($this->HairColors->save($hairColor)) {
                $this->Flash->success(__('The hair color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hair color could not be saved. Please, try again.'));
        }
        $this->set(compact('hairColor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hair Color id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hairColor = $this->HairColors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hairColor = $this->HairColors->patchEntity($hairColor, $this->request->getData());
            if ($this->HairColors->save($hairColor)) {
                $this->Flash->success(__('The hair color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hair color could not be saved. Please, try again.'));
        }
        $this->set(compact('hairColor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hair Color id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hairColor = $this->HairColors->get($id);
        if ($this->HairColors->delete($hairColor)) {
            $this->Flash->success(__('The hair color has been deleted.'));
        } else {
            $this->Flash->error(__('The hair color could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
