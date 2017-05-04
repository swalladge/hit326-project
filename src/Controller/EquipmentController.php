<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Equipment Controller
 *
 * @property \App\Model\Table\EquipmentTable $Equipment
 */
class EquipmentController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Equipment = TableRegistry::get('Equipment');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $equipment = $this->paginate($this->Equipment);

        $this->set(compact('equipment'));
        $this->set('_serialize', ['equipment']);
    }

    /**
     * View method
     *
     * @param string|null $id Equipment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipment = $this->Equipment->get($id, [
            'contain' => []
        ]);

        $this->set('equipment', $equipment);
        $this->set('_serialize', ['equipment']);
    }

}
