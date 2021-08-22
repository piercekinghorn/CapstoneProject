<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;
use Cake\ORM\Locator\LocatorAwareTrait;

class EquipmentItemsController extends AppController
{

    public function book($id = null)
    {
        $this->loadModel('LabBookings');
        $labBookings = $this->LabBookings->newEmptyEntity();
        $labBookings->equipment_id = $id;
        $labBookings->staff_id = 1234;
        $labBookings->student_id = 2345;
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

    //Create an array of the distinct campus's
    public function listCampus()
    {
        $query = $this->getTableLocator()->get('equipmentItems')
                    ->find()
                    ->select(['equipment_campus'])
                    ->distinct(['equipment_campus']);
        $this->set(compact('query'));             
        $campuslist = array();
        array_push($campuslist, 'Display All');
        foreach ($query->all() as $equipmentItems) {
            array_push($campuslist, $equipmentItems->equipment_campus);
        } 
        return $campuslist;

    }

    public function index()
    {
        //Recieve Filter
        $filter = $this->filterByCampus();

        //After Post Request
        if ($this->request->is('post')){
            $filter = $this->filterByCampus();
        
            $settings = ['conditions' => array('EquipmentItems.equipment_campus LIKE' => "%$filter%")];

            $equipmentItems = $this->paginate($this->EquipmentItems, $settings);
            $this->set(compact('equipmentItems'));



            $this->LabBookings = TableRegistry::get('LabBookings');
            $labBookings = $this->LabBookings->newEmptyEntity();
            $this->set('labBookings');
        }
        //On initial Page Startup
        else
        {
            $equipmentItems = $this->paginate($this->EquipmentItems);
            $this->set(compact('equipmentItems'));

            $this->LabBookings = TableRegistry::get('LabBookings');
            $this->set('labBookings');
            $labBookings = $this->LabBookings->newEmptyEntity();
        }

        //Retrieve Campus List
        $campuslist = $this->listCampus();
        $this->set(compact('campuslist'));       
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

    public function filterByName()
    {

        //For the other filter stuff

    }

    public function filterByCampus()
    {
        $campus = null;
        if ($this->request->is('post')){
            $selectedCampus = $this->EquipmentItems->newEmptyEntity();
            $selectedCampus = $this->EquipmentItems->patchEntity($selectedCampus, $this->request->getData());

           
            $campuslist = $this->listCampus();
            $selectedCampus = $selectedCampus->campus;
            $campus = $campuslist[$selectedCampus];
             
        }

        if($campus == 'Display All')
        {
            $campus = null;
        }

        return $campus;
    }  
}
