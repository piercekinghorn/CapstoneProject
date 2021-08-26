<?php

namespace App\Controller;

class MsdsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $msds = $this->Paginator->paginate($this->Msds->find());
        $this->set(compact('msds'));
    }

    public function view($slug = null)
    {
        $msds = $this->Msds->findBySlug($slug)->firstOrFail();
        $this->set(compact('msds'));
    }
}