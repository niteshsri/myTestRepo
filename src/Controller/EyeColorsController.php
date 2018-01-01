<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EyeColors Controller
 *
 * @property \App\Model\Table\EyeColorsTable $EyeColors
 *
 * @method \App\Model\Entity\EyeColor[] paginate($object = null, array $settings = [])
 */
class EyeColorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $eyeColors = $this->paginate($this->EyeColors);

        $this->set(compact('eyeColors'));
    }

    /**
     * View method
     *
     * @param string|null $id Eye Color id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eyeColor = $this->EyeColors->get($id, [
            'contain' => ['UserDetails']
        ]);

        $this->set('eyeColor', $eyeColor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eyeColor = $this->EyeColors->newEntity();
        if ($this->request->is('post')) {
            $eyeColor = $this->EyeColors->patchEntity($eyeColor, $this->request->getData());
            if ($this->EyeColors->save($eyeColor)) {
                $this->Flash->success(__('The eye color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The eye color could not be saved. Please, try again.'));
        }
        $this->set(compact('eyeColor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Eye Color id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eyeColor = $this->EyeColors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eyeColor = $this->EyeColors->patchEntity($eyeColor, $this->request->getData());
            if ($this->EyeColors->save($eyeColor)) {
                $this->Flash->success(__('The eye color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The eye color could not be saved. Please, try again.'));
        }
        $this->set(compact('eyeColor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Eye Color id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eyeColor = $this->EyeColors->get($id);
        if ($this->EyeColors->delete($eyeColor)) {
            $this->Flash->success(__('The eye color has been deleted.'));
        } else {
            $this->Flash->error(__('The eye color could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
