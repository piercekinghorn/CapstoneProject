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

    public function index()
    {
        //$results = filter($results);
        $results = $this->filter($results)
        if($results != null)
        {
            function_alert("filter check"); 
           // $equipmentItems = $results
            $equipmentItems = $this->paginate($this->EquipmentItems);
            $this->set(compact('equipmentItems'));
        }
        else
        {

        $equipmentItems = $this->paginate($this->EquipmentItems);
        $this->LabBookings = TableRegistry::get('LabBookings');
        $labBookings = $this->LabBookings->newEmptyEntity();

        $this->set(compact('equipmentItems'));
        $this->set('labBookings');  
        }
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

   /*public function filter() //original
    {
        $campusplaceholder = 'Cairns'; //hardcoded to test
        $query = $this->getTableLocator()->get('equipmentItems')
                    ->find()
                    ->where(['equipment_campus' => $campusplaceholder]);
        $this->set(compact('query'));
        $results = array();
        foreach ($query->all() as $equipmentItems) {
            array_push($results, $equipmentItems);
        } 
        $this->set(compact('results'));
        debug($results);    
    }*/

    public function filter($value) // first working method to pass data from button
    {
        $query = $this->getTableLocator()->get('equipmentItems')
                    ->find()
                    ->where(['equipment_campus' => $value ]);
        $this->set(compact('query'));
        $results = array();
        foreach ($query->all() as $equipmentItems) {
            array_push($results, $equipmentItems);
        } 
        $equipmentItems = $results;

        $this->set(compact('equipmentItems'));
        //return $this->redirect(['action' => 'index']);
        debug($results);  
    }

       /* <?php

        function function_alert($message) {    
            echo "<script>alert('$message');</script>";
        }
        function_alert("Welcome to Geeks for Geeks"); 
        ?>  */
          
}
