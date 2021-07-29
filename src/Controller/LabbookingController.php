<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Labbooking Controller
 *
 * @property \App\Model\Table\LabbookingTable $Labbooking
 * @method \App\Model\Entity\Labbooking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LabbookingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $labbooking = $this->paginate($this->Labbooking);

        $this->set(compact('labbooking'));
    }

    /**
     * View method
     *
     * @param string|null $id Labbooking id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labbooking = $this->Labbooking->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('labbooking'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labbooking = $this->Labbooking->newEmptyEntity();
        if ($this->request->is('post')) {
            $labbooking = $this->Labbooking->patchEntity($labbooking, $this->request->getData());
            if ($this->Labbooking->save($labbooking)) {
                $this->Flash->success(__('The labbooking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The labbooking could not be saved. Please, try again.'));
        }
        $this->set(compact('labbooking'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Labbooking id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labbooking = $this->Labbooking->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labbooking = $this->Labbooking->patchEntity($labbooking, $this->request->getData());
            if ($this->Labbooking->save($labbooking)) {
                $this->Flash->success(__('The labbooking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The labbooking could not be saved. Please, try again.'));
        }
        $this->set(compact('labbooking'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Labbooking id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labbooking = $this->Labbooking->get($id);
        if ($this->Labbooking->delete($labbooking)) {
            $this->Flash->success(__('The labbooking has been deleted.'));
        } else {
            $this->Flash->error(__('The labbooking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
