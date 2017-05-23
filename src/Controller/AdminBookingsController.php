<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Log\Log;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 */
class AdminBookingsController extends AdminAppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Bookings = TableRegistry::get('Bookings');
        $this->Users = TableRegistry::get('Users');

        $stateOptions = ['pending' => 'pending',
                         'confirmed' => 'confirmed',
                         'rejected' => 'rejected'
                     ];
        $this->set('stateOptions', $stateOptions);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equipment', 'Users']
        ];
        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Equipment', 'Users']
        ]);

        // calculate and format the duration for display in the view
        $start = date_create($booking->start_date);
        $end =  date_create($booking->end_date);
        $duration = $end->diff($start)->format('%h:%I');

        $this->set(compact('booking', 'duration'));
        $this->set('_serialize', ['booking']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booking = $this->Bookings->newEntity();
        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $equipment = $this->Bookings->Equipment->find('list', ['limit' => 200]);
        // TODO: better use of $user?
        $user = $this->Bookings->Users->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'equipment', 'user'));
        $this->set('_serialize', ['booking']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $equipment = $this->Bookings->Equipment->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'equipment'));
        $this->set('_serialize', ['booking']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * confirm a booking
     */
    public function confirm($id)
    {
        $this->request->allowMethod(['post']);

        $booking = $this->Bookings->get($id);
        $booking->set('state', 'confirmed');

        if ($this->Bookings->save($booking)) {
            $this->Flash->success('The booking has been confirmed.');
        } else {
            $this->Flash->error('The booking could not be confirmed. Please, try again.');
        }

        return $this->redirect($this->referer());
    }

    /**
     * reject a booking
     */
    public function reject($id)
    {
        $this->request->allowMethod(['post']);

        $booking = $this->Bookings->get($id);
        $booking->set('state', 'rejected');

        if ($this->Bookings->save($booking)) {
            $this->Flash->success('The booking has been rejected.');
        } else {
            $this->Flash->error('The booking could not be rejected. Please, try again.');
        }

        return $this->redirect($this->referer());
    }
}
