<?php
namespace App\Controller;


/**
 * ClosedDays Controller
 *
 * @property \App\Model\Table\ClosedDaysTable $ClosedDays
 */
class ClosedDaysController extends AdminAppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $closedDays = $this->paginate($this->ClosedDays);

        $this->set(compact('closedDays'));
        $this->set('_serialize', ['closedDays']);
    }

    /**
     * View method
     *
     * @param string|null $id Closed Day id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $closedDay = $this->ClosedDays->get($id, [
            'contain' => []
        ]);

        $this->set('closedDay', $closedDay);
        $this->set('_serialize', ['closedDay']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $closedDay = $this->ClosedDays->newEntity();
        if ($this->request->is('post')) {
            $closedDay = $this->ClosedDays->patchEntity($closedDay, $this->request->getData());
            if ($this->ClosedDays->save($closedDay)) {
                $this->Flash->success(__('The closed day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The closed day could not be saved. Please, try again.'));
        }
        $this->set(compact('closedDay'));
        $this->set('_serialize', ['closedDay']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Closed Day id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $closedDay = $this->ClosedDays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $closedDay = $this->ClosedDays->patchEntity($closedDay, $this->request->getData());
            if ($this->ClosedDays->save($closedDay)) {
                $this->Flash->success(__('The closed day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The closed day could not be saved. Please, try again.'));
        }
        $this->set(compact('closedDay'));
        $this->set('_serialize', ['closedDay']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Closed Day id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $closedDay = $this->ClosedDays->get($id);
        if ($this->ClosedDays->delete($closedDay)) {
            $this->Flash->success(__('The closed day has been deleted.'));
        } else {
            $this->Flash->error(__('The closed day could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
