<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;
use Cake\ORM\Locator\LocatorAwareTrait;

class EquipmentItemsController extends AppController
{
    public $paginate = [
        'limit' => 1000,
    ];

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }

    public function book($id = null)
    {
        //$this->Authorization->skipAuthorization();
        $this->loadModel('LabBookings');
        $labBookings = $this->LabBookings->newEmptyEntity();

        $this->Authorization->authorize($labBookings);

        $labBookings->equipment_id = $id;
        $labBookings->staff_id = 0;
        $labBookings->student_id = $this->request->getAttribute('identity')->getStudentID();
        $labBookings->booking_date = FrozenTime::tomorrow()->toDateTimeString();
        $labBookings->return_date = FrozenTime::tomorrow()->addHour()->toDateTimeString();
        $labBookings->booking_status = true;
        $this->set(compact('labBookings'));
        $this->autoRender = false;
        return $this->redirect(['controller'=> 'LabBookings', 'action' => 'add', '?' => ['equipment_id' => $labBookings->equipment_id, 'staff_id' => $labBookings->staff_id, 'student_id' => $labBookings->student_id, 'booking_date' => $labBookings->booking_date, 'return_date' => $labBookings->return_date]]);
    }

    public function index()
    {
        $this->Authorization->skipAuthorization();
        $settings = [];

        //After Post Request
        if ($this->request->is('post')) {

            //Get data for equipment and campus filters
            $filterData = $this->request->getData();
            $settings = $this->filter($filterData);
        }

        $equipmentItems = $this->paginate($this->EquipmentItems, $settings);
        $this->set(compact('equipmentItems'));

        $this->LabBookings = TableRegistry::get('LabBookings');
        $this->set('LabBookings');
        $labBookings = $this->LabBookings->newEmptyEntity();
        $this->set('labBookings');

        //Retrieve Campus List
        $campuslist = $this->listCampus();
        $this->set(compact('campuslist'));
    }

    public function filter($filterData)
    {
        //Set general filter
        $filterE = $filterData['equipmentFilter'];
        //Set campus filter
        $filterC = $filterData['campusFilter'];
        $filterC = $this->filterByCampus($filterC);
        //Apply filter settings
        $settings = ['conditions' => array(
        "OR" => array(
            'EquipmentItems.equipment_name LIKE' => "%$filterE%",
            'EquipmentItems.equipment_campus LIKE' => "%$filterE%",
            'EquipmentItems.equipment_lab LIKE' => "%$filterE%",
            'EquipmentItems.equipment_discipline LIKE' => "%$filterE%",
            'EquipmentItems.equipment_details LIKE' => "%$filterE%",
            'EquipmentItems.equipment_media LIKE' => "%$filterE%",
            'EquipmentItems.equipment_whs LIKE' => "%$filterE%"),
            'EquipmentItems.equipment_campus LIKE' => "%$filterC%"
        )];

        return $settings;
    }

    public function filterByCampus($filter)
    {
        $campusFilter = null;
        $campuslist = $this->listCampus();
        $campusFilter = $campuslist[$filter];

        if($campusFilter == 'Display All')
        {
            $campusFilter = null;
        }

        return $campusFilter;
    }

    //Create an array of the distinct campus's
    public function listCampus()
    {
        $this->Authorization->skipAuthorization();

        $query = $this->getTableLocator()->get('EquipmentItems')
                    ->find()
                    ->select(['equipment_campus'])
                    ->distinct(['equipment_campus'])
                    ->where(['equipment_status' => 1]);

        $this->set(compact('query'));
        $campuslist = array();
        array_push($campuslist, 'Display All');
        foreach ($query->all() as $equipmentItems) {
            array_push($campuslist, $equipmentItems->equipment_campus);
        }
        return $campuslist;

    }

    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $equipmentItems = $this->EquipmentItems->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('equipmentItems'));
    }

    public function add()
    {
        //$this->Authorization->skipAuthorization();
        $this->loadModel('Users');
        $user = $this->Users->get(1, [
            'contain' => [],
        ]);

        $equipmentItems = $this->EquipmentItems->newEmptyEntity();
        $this->Authorization->authorize($equipmentItems);

        if ($this->request->is('post')) {
            $equipmentItems = $this->EquipmentItems->patchEntity($equipmentItems, $this->request->getData());
           
            if(!$equipmentItems->getErrors) {
                $media = $this->request->getData('equipment_media');
                $fName = $media->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$fName;

                if($fName) {
                    $media->moveTo($targetPath);
                }

                $equipmentItems->equipment_media = $fName;

                //debug($equipmentItems);
                //exit();
            
            }
           
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
        //$this->Authorization->skipAuthorization();

        $equipmentItems = $this->EquipmentItems->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($equipmentItems);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipmentItems = $this->EquipmentItems->patchEntity($equipmentItems, $this->request->getData());

            if(!$equipmentItems->getErrors){
                $media = $this->request->getData('equipment_media');
                $fName = $media->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$fName;

                if($fName) {
                    $media->moveTo($targetPath);
                }
                $equipmentItems->equipment_media = $fName;

                //debug($equipmentItems);
                //exit();
            
            }

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
        //$this->Authorization->skipAuthorization();

        $this->request->allowMethod(['post', 'delete']);
        $equipmentItems = $this->EquipmentItems->get($id);
        $this->Authorization->authorize($equipmentItems);

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

    public function deleteMedia($id = null) {
        // The delete function now unlists the equipment item rather then deleting it.
        // The index page only shows equipment that have a status of 1, pressing delete sets it to zero.
        //$this->Authorization->skipAuthorization();

        $this->request->allowMethod(['post', 'delete']);
        $equipmentItems = $this->EquipmentItems->get($id);
        $this->Authorization->authorize($equipmentItems);

        $equipmentItems->equipment_media = '';

        if ($this->request->is(['patch', 'post', 'put'])) {
            //$equipmentItems = $this->EquipmentItems->patchEntity($equipmentItems, $this->request->getData());
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
