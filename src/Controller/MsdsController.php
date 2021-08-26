<?php

namespace App\Controller;

class MsdsController extends AppController
{
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->loadModel('Msds');
        $msds = $this->paginate($this->Msds);
        $this->set(compact('msds'));
    }

    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->loadModel('Msds');
        $msds = $this->Msds->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('msds'));
    }
        
}