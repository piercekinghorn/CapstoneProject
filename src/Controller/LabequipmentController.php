<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

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


    // Book Equipment Function
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function book($id = null)
    {
        $this->loadModel('Labbooking');
        $labbooking = $this->Labbooking->newEntity([
            'book_ID' => 200,
            'equip_ID' => 0,
            'staff_ID' => 0,
            'student_ID' => 0,
            'date_' => FrozenTime::now(),
            'book_status' => 0,
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $Labbooking = $this->Labbooking->patchEntity($labbooking, $this->request->getData());
            if ($this->Labbooking->save($labbooking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $this->set(compact('labbooking'));

        return $this->redirect(['action' => 'index']);
    }

}
