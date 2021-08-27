<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Msds Controller
 *
 * @property \App\Model\Table\MsdsTable $Msds
 * @method \App\Model\Entity\Msd[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MsdsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $msds = $this->paginate($this->Msds);

        $this->set(compact('msds'));
    }

    /**
     * View method
     *
     * @param string|null $id Msd id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $msd = $this->Msds->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('msd'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $msd = $this->Msds->newEmptyEntity();
        if ($this->request->is('post')) {
            $msd = $this->Msds->patchEntity($msd, $this->request->getData());
            if ($this->Msds->save($msd)) {
                $this->Flash->success(__('The msd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msd could not be saved. Please, try again.'));
        }
        $this->set(compact('msd'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Msd id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $msd = $this->Msds->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $msd = $this->Msds->patchEntity($msd, $this->request->getData());
            if ($this->Msds->save($msd)) {
                $this->Flash->success(__('The msd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The msd could not be saved. Please, try again.'));
        }
        $this->set(compact('msd'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Msd id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $msd = $this->Msds->get($id);
        if ($this->Msds->delete($msd)) {
            $this->Flash->success(__('The msd has been deleted.'));
        } else {
            $this->Flash->error(__('The msd could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
