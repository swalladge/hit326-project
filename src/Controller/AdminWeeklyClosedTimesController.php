<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;


/**
 * WeeklyClosedTimes Controller
 *
 * @property \App\Model\Table\WeeklyClosedTimesTable $WeeklyClosedTimes
 */
class AdminWeeklyClosedTimesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->WeeklyClosedTimes = TableRegistry::get('WeeklyClosedTimes');
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
        $weeklyClosedTimes = $this->paginate($this->WeeklyClosedTimes);

        $this->set(compact('weeklyClosedTimes'));
        $this->set('_serialize', ['weeklyClosedTimes']);
    }

    /**
     * View method
     *
     * @param string|null $id Weekly Closed Time id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $weeklyClosedTime = $this->WeeklyClosedTimes->get($id, [
            'contain' => ['Equipment']
        ]);

        $this->set('weeklyClosedTime', $weeklyClosedTime);
        $this->set('_serialize', ['weeklyClosedTime']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $weeklyClosedTime = $this->WeeklyClosedTimes->newEntity();
        if ($this->request->is('post')) {
            $weeklyClosedTime = $this->WeeklyClosedTimes->patchEntity($weeklyClosedTime, $this->request->getData());
            if ($this->WeeklyClosedTimes->save($weeklyClosedTime)) {
                $this->Flash->success(__('The weekly closed time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weekly closed time could not be saved. Please, try again.'));
        }
        $equipment = $this->WeeklyClosedTimes->Equipment->find('list', ['limit' => 200]);
        $this->set(compact('weeklyClosedTime', 'equipment'));
        $this->set('_serialize', ['weeklyClosedTime']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Weekly Closed Time id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weeklyClosedTime = $this->WeeklyClosedTimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weeklyClosedTime = $this->WeeklyClosedTimes->patchEntity($weeklyClosedTime, $this->request->getData());
            if ($this->WeeklyClosedTimes->save($weeklyClosedTime)) {
                $this->Flash->success(__('The weekly closed time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weekly closed time could not be saved. Please, try again.'));
        }
        $equipment = $this->WeeklyClosedTimes->Equipment->find('list', ['limit' => 200]);
        $this->set(compact('weeklyClosedTime', 'equipment'));
        $this->set('_serialize', ['weeklyClosedTime']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Weekly Closed Time id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weeklyClosedTime = $this->WeeklyClosedTimes->get($id);
        if ($this->WeeklyClosedTimes->delete($weeklyClosedTime)) {
            $this->Flash->success(__('The weekly closed time has been deleted.'));
        } else {
            $this->Flash->error(__('The weekly closed time could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
