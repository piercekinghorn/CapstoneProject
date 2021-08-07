<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class EquipmentItemsController extends AppController
{
    public function book($id = null)
    {
        $this->LabBookings = TableRegistry::get('LabBookings');
        $labBookings = $this->LabBookings->newEmptyEntity();
        $labBookings->equipment_ID = $id;
        $labBookings->staff_ID = 1234;
        $labBookings->student_ID = 2345;
        $labBookings->booking_date = FrozenTime::now();
        $labBookings->booking_status = true;
        if ($this->request->is('post')) {
            if ($this->LabBookings->save($labBookings)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again. Labbooking: ' . $labBookings));
        }
        $this->set(compact('labBookings'));
        $this->autoRender = false;
        return $this->redirect(['action' => 'index']);
    }

    public function index()
    {
        $equipmentItems = $this->paginate($this->EquipmentItems);

        $this->set(compact('equipmentItems'));
    }

    public function view($id = null)
    {
        $equipmentItems = $this->EquipmentItems->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('equipmentItems'));
    }

    public function add()
    {
        $equipmentItems = $this->EquipmentItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $equipmentItems = $this->EquipmentItems->patchEntity($equipmentItems, $this->request->getData());
            if ($this->EquipmentItems->save($equipmentItems)) {
                $this->Flash->success(__('The labequipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipment item could not be saved. Please, try again.'));
        }
        $this->set(compact('equipmentItems'));
    }

    public function edit($id = null)
    {
        $equipmentItems = $this->EquipmentItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipmentItems = $this->EquipmentItems->patchEntity($equipmentItems, $this->request->getData());
            if ($this->EquipmentItems->save($equipmentItems)) {
                $this->Flash->success(__('The equipment item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipment item could not be saved. Please, try again.'));
        }
        $this->set(compact('equipmentItems'));
    }

    public function delete($id = null)
    {
        // The delete function now unlists the equipment item rather then deleting it.
        // The index page only shows equipment that have a status of 1, pressing delete sets it to zero.
        $this->request->allowMethod(['post', 'delete']);
        $equipmentItems = $this->EquipmentItems->get($id);
        $equipmentItems->equipment_status = '0';

        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipmentItems = $this->EquipmentItems->patchEntity($equipmentItems, $this->request->getData());
            if ($this->EquipmentItems->save($equipmentItems)) {
                $this->Flash->success(__('The equipment item has been deleted.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipment item could not be deleted. Please, try again.'));
        }
        $this->set(compact('equipmentItems'));

        return $this->redirect(['action' => 'index']);
    }
}
