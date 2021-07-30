<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Labequipment Controller
 *
 * @property \App\Model\Table\LabequipmentTable $Labequipment
 * @method \App\Model\Entity\Labequipment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LabequipmentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $labequipment = $this->paginate($this->Labequipment);

        $this->set(compact('labequipment'));
    }

    /**
     * View method
     *
     * @param string|null $id Labequipment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labequipment = $this->Labequipment->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('labequipment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labequipment = $this->Labequipment->newEmptyEntity();
        if ($this->request->is('post')) {
            $labequipment = $this->Labequipment->patchEntity($labequipment, $this->request->getData());
            if ($this->Labequipment->save($labequipment)) {
                $this->Flash->success(__('The labequipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The labequipment could not be saved. Please, try again.'));
        }
        $this->set(compact('labequipment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Labequipment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labequipment = $this->Labequipment->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labequipment = $this->Labequipment->patchEntity($labequipment, $this->request->getData());
            if ($this->Labequipment->save($labequipment)) {
                $this->Flash->success(__('The labequipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The labequipment could not be saved. Please, try again.'));
        }
        $this->set(compact('labequipment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Labequipment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labequipment = $this->Labequipment->get($id);
        if ($this->Labequipment->delete($labequipment)) {
            $this->Flash->success(__('The labequipment has been deleted.'));
        } else {
            $this->Flash->error(__('The labequipment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
