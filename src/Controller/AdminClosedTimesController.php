<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * ClosedTimes Controller
 *
 * @property \App\Model\Table\ClosedTimesTable $ClosedTimes
 */
class AdminClosedTimesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->ClosedTimes = TableRegistry::get('ClosedTimes');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equipment']
        ];
        $closedTimes = $this->paginate($this->ClosedTimes);

        $this->set(compact('closedTimes'));
        $this->set('_serialize', ['closedTimes']);
    }

    /**
     * View method
     *
     * @param string|null $id Closed Time id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $closedTime = $this->ClosedTimes->get($id, [
            'contain' => ['Equipment']
        ]);

        $this->set('closedTime', $closedTime);
        $this->set('_serialize', ['closedTime']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $closedTime = $this->ClosedTimes->newEntity();
        if ($this->request->is('post')) {
            $closedTime = $this->ClosedTimes->patchEntity($closedTime, $this->request->getData());
            if ($this->ClosedTimes->save($closedTime)) {
                $this->Flash->success(__('The closed time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The closed time could not be saved. Please, try again.'));
        }
        $equipment = $this->ClosedTimes->Equipment->find('list', ['limit' => 200]);
        $this->set(compact('closedTime', 'equipment'));
        $this->set('_serialize', ['closedTime']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Closed Time id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $closedTime = $this->ClosedTimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $closedTime = $this->ClosedTimes->patchEntity($closedTime, $this->request->getData());
            if ($this->ClosedTimes->save($closedTime)) {
                $this->Flash->success(__('The closed time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The closed time could not be saved. Please, try again.'));
        }
        $equipment = $this->ClosedTimes->Equipment->find('list', ['limit' => 200]);
        $this->set(compact('closedTime', 'equipment'));
        $this->set('_serialize', ['closedTime']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Closed Time id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $closedTime = $this->ClosedTimes->get($id);
        if ($this->ClosedTimes->delete($closedTime)) {
            $this->Flash->success(__('The closed time has been deleted.'));
        } else {
            $this->Flash->error(__('The closed time could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
