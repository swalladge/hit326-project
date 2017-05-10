<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * OpeningHours Controller
 *
 * @property \App\Model\Table\OpeningHoursTable $OpeningHours
 */
class AdminOpeningHoursController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->OpeningHours = TableRegistry::get('OpeningHours');

        $this->weekdayOptions = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $this->set('weekdayOptions', $this->weekdayOptions);
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $openingHours = $this->paginate($this->OpeningHours);

        $this->set(compact('openingHours'));
        $this->set('_serialize', ['openingHours']);
    }

    /**
     * View method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $openingHour = $this->OpeningHours->get($id, [
            'contain' => []
        ]);

        $this->set('openingHour', $openingHour);
        $this->set('_serialize', ['openingHour']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $openingHour = $this->OpeningHours->newEntity();
        if ($this->request->is('post')) {
            $openingHour = $this->OpeningHours->patchEntity($openingHour, $this->request->getData());
            if ($this->OpeningHours->save($openingHour)) {
                $this->Flash->success(__('The opening hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opening hour could not be saved. Please, try again.'));
        }
        $this->set(compact('openingHour'));
        $this->set('_serialize', ['openingHour']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $openingHour = $this->OpeningHours->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $openingHour = $this->OpeningHours->patchEntity($openingHour, $this->request->getData());
            if ($this->OpeningHours->save($openingHour)) {
                $this->Flash->success(__('The opening hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opening hour could not be saved. Please, try again.'));
        }
        $this->set(compact('openingHour'));
        $this->set('_serialize', ['openingHour']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $openingHour = $this->OpeningHours->get($id);
        if ($this->OpeningHours->delete($openingHour)) {
            $this->Flash->success(__('The opening hour has been deleted.'));
        } else {
            $this->Flash->error(__('The opening hour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
