<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Labbooking Controller
 *
 * @property \App\Model\Table\LabBookingsTable $labBookings
 * @method \App\Model\Entity\Labbooking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LabBookingsController extends AppController
{
    public $paginate = [
        'limit' => 1000,
    ];

    public function index()
    {
        $this->Authorization->skipAuthorization();

        $this->loadModel('LabBookings');
        $labBookings = $this->paginate($this->LabBookings);
        $this->set(compact('labBookings'));
    }

    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->loadModel('LabBookings');
        $labBookings = $this->LabBookings->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('labBookings'));
    }

    public function add()
    {
        //$this->Authorization->skipAuthorization();

        $this->loadModel('LabBookings');

        $labBookings = $this->LabBookings->newEmptyEntity();

        $this->Authorization->authorize($labBookings);
        if ($this->request->is('post')) {
          $data = $this->request->getData();

            $labBookings = $this->LabBookings->patchEntity($labBookings, $data);

            if ($this->LabBookings->save($labBookings)) {
              $check = false;//whsCheck($data[1]);
              if (! $check){
                $this->Flash->success(__('Your lab booking has been saved.'));}
                else {
                  $this->Flash->success(__('Your lab booking has been saved. Please review lab induction material.'));
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Your lab booking could not be saved. Please, try again.'));
        }

        $options = array();

        if ($this->request->is('get')) {
            $this->Users = TableRegistry::get('Users');

            $query = $this->Users->find('all')
                        ->where(['Users.is_staff =' => true]);

            foreach ($query as $row) {
                $options[$row->staff_id] = $row->name;
            }

            $labBookings->equipment_id = $this->request->getQuery('equipment_id');
            $labBookings->student_id = $this->request->getQuery('student_id');
            $labBookings->booking_date = $this->request->getQuery('booking_date');
            $labBookings->return_date = $this->request->getQuery('return_date');
        }
        $this->set(compact('labBookings'));
        $this->set(compact('options'));
    }

    public function whsCheck($id)
    {
        $query = $this->getTableLocator()->get('EquipmentItems')
                    ->find()
                    ->where(['equipment_id' => $id])
                    ->select(['equipment_whs']);
        if ($query[0] == ''){
        return false;}
        else {return true;}
    }

    public function edit($id = null)
    {
        //$this->Authorization->skipAuthorization();

        $this->loadModel('LabBookings');
        $labBookings = $this->LabBookings->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($labBookings);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $labBookings = $this->LabBookings->patchEntity($labBookings, $this->request->getData());

            //Check booking and return dates.
            $bookdate = $labBookings['booking_date'];
            $returndate = $labBookings['return_date'];

            //If return date is earlier then booking date dont save.
            if ( $bookdate < $returndate){

                if ($this->LabBookings->save($labBookings)) {
                $this->Flash->success(__('Your lab booking has been saved.'));

                return $this->redirect(['action' => 'index']);
                }
                else
                {
                $this->Flash->error(__('Your lab booking could not be saved. Please, try again.'));

                }
            }

            $this->Flash->error(__('The return date cannot be before the booking date.'));
        }
        $this->set(compact('labBookings'));
    }

    public function delete($id = null)
    {
        //$this->Authorization->skipAuthorization();

        $this->loadModel('LabBookings');

        $this->request->allowMethod(['post', 'delete']);

        $labBookings = $this->LabBookings->get($id);
        $this->Authorization->authorize($labBookings);
        if ($this->LabBookings->delete($labBookings)) {
            $this->Flash->success(__('Your lab booking has been deleted.'));
        } else {
            $this->Flash->error(__('Your lab booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
