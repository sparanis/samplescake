<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;


/**
 * Message Controller
 *
 * @property \App\Model\Table\MessageTable $Message
 */
class MessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() //inbox
    {
        
        $id = $this->Auth->user('id');

        $messages = $this->Messages->find('all');

        $messages
            ->select($this->Messages)
            ->select($this->Messages->Users)
            ->select(['cr' => $messages->func()->max('Messages.created'), 'kk' => $messages->func()->max('Messages.id')])
            ->where(['to_user_id' => $id])
            ->contain('Users')
            ->order(['cr' => 'DESC'])
            ->group('from_user_id');

        foreach ($messages as $message) {

             $from_user = $this->Messages->Users->find()
            ->where(['Users.id'=> $message['from_user_id']]);
            
            if($this->myUserType()=='workers')
            {
                $from_user->contain('Customers');
            }
            else
            {
                $from_user->contain('Workers');
            }
            

            $from_name = $from_user->toArray();


            $message['from'] = $this->getTheName($message['from_user_id']);

            $message->user['image_url'] = $from_name[0]->image_url;

             $date = new Time($message['created'],'Asia/Tokyo');
             $time = new Time($message['created'],'Asia/Tokyo');
             $message['date'] = $date->format('Y-m-d');
             $message['time'] = $time->format('g:h a');
            $message['status'] = $this->get_msg_status($message['id']);

             $message['content'] = $this->Messages->get($message['kk'])->content;

        }

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);

    }

    public function sent()
    {
        $id = $this->Auth->user('id');
        
        $messages = $this->Messages->find('all');

        $messages
            ->select($this->Messages)
            ->select($this->Messages->Users)
            ->select(['cr' => $messages->func()->max('Messages.created'), 'kk' => $messages->func()->max('Messages.id')])
            ->where(['from_user_id' => $id])
            ->contain('Users')
            ->order(['cr' => 'DESC'])
            ->group('to_user_id');


        foreach ($messages as $message) {

            $to_user = $this->Messages->Users->find()
            ->where(['Users.id'=> $message['to_user_id']]);

            if($this->myUserType()=='workers')
            {
                $to_user->contain('Customers');
            }
            else
            {
                $to_user->contain('Workers');
            }

            $to_name = $to_user->toArray();

            $message['to'] = $this->getTheName($message['to_user_id']);

            $message->user['image_url'] = $to_name[0]->image_url;

             $date = new Time($message['cr'],'Asia/Tokyo');
             $time = new Time($message['cr'],'Asia/Tokyo');
             $message['date'] = $date->format('Y-m-d');
             $message['time'] = $time->format('g:h a');

             $message['content'] = $this->Messages->get($message['kk'])->content;
        
        }

        // $this->autoRender = false;
        // die;

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

    public function get_msg_status($msg_id)
    {
        $row = $this->Messages->get($msg_id); 

        switch ($row->status) {
            case 0:
                return 'unread';
                break;
            case 1:
                return 'read';
                break;
            
            default:
               return 'removed';
                break;
        }
    }

    public function view($msg_id)
    {
        if($msg_id != null)
        {   
           
            $message = $this->Messages->get($msg_id);
            $id = $this->Auth->user('id');

            $readed = $this->mark_read($msg_id);

            if($message->from_user_id == $id || $message->to_user_id == $id)
            {
                 $thread = $this->Messages->find()
                 ->where(['OR' => [['from_user_id' => $message->from_user_id, 'to_user_id' => $message->to_user_id], ['from_user_id' => $message->to_user_id, 'to_user_id' => $message->from_user_id ]]])
                 ->order(['created' => 'ASC']);

                 foreach ($thread as $message) {

                     $from_user = $this->Messages->Users->find()
                    ->where(['Users.id'=> $message['from_user_id']]);

                     $from_name = $from_user->toArray();

                    $message['from'] = $this->getTheName($message['from_user_id']);

                    $message['image_url'] = $from_name[0]->image_url;

                     $date = new Time($message['created'],'Asia/Tokyo');
                     $time = new Time($message['created'],'Asia/Tokyo');
                     $message['date'] = $date->format('Y-m-d');
                     $message['time'] = $time->format('h:i a');

                     // debug($message);

                 }

                 $thread->toArray();
            }
            else
            {
                echo 'you are not allowed to view this message';
                die;
            }

        
            $this->set('thread', $thread);
            $this->set('_serialize', ['thread']);
            
        }
    }

    public function get_msg_view($msg_id)
    {
        if($msg_id != null)
        {   
           
            $message = $this->Messages->get($msg_id);
            $id = $this->Auth->user('id');

          
            $message = $this->Messages->get($msg_id);

             $from_user = $this->Messages->Users->find()
            ->where(['Users.id'=> $message['from_user_id']]);

             $from_name = $from_user->toArray();

            $message['from'] = $this->getTheName($message['from_user_id']);

            $message['image_url'] = $from_name[0]->image_url;

             $date = new Time($message['created'],'Asia/Tokyo');
             $time = new Time($message['created'],'Asia/Tokyo');
             $message['date'] = $date->format('Y-m-d');
             $message['time'] = $time->format('h:i a');

         
            $message->toArray();

           return $message;
            
        }
    }

    public function get_last_date($msg_id)
    {

        $message = $this->Messages->get($msg_id);

        $last = $this->Messages->find()
        ->where(['OR' => [['from_user_id' => $message->from_user_id, 'to_user_id' => $message->to_user_id], ['from_user_id' => $message->to_user_id, 'to_user_id' => $message->from_user_id ]]])
        ->where(['id !=' => $message->id])
        ->order(['created' => 'DESC']);

        $date = new Time($last->first()->created,'Asia/Tokyo');
        $last_date = $date->format('Y-m-d');

        return $last_date;
    }

    public function reply()
    {

        $message = $this->Messages->newEntity();


        if ($this->request->is('post')) {

            $data = $this->request->data;

            if (!empty($this->request->data)) {

                $thread = $this->Messages->get($data['msg_id']);

                if($thread->from_user_id == $this->Auth->user('id'))
                { 
                    $data['to_user_id'] = $thread->to_user_id; 
                    $data['from_user_id'] = $this->Auth->user('id');
                }
                else
                {   
                    $data['to_user_id'] = $thread->from_user_id;
                    $data['from_user_id'] = $this->Auth->user('id');
                }
                       
                $message = $this->Messages->newEntity($data);

                if ($this->Messages->save($message)) {

                    $message = $this->get_msg_view($message->id);
                    
                    $date = $message->date;

                    $last_date = $this->get_last_date($message->id);

                    $html = '';

                    if($last_date != $date)
                    {
                        $html .= '<div class="date-header">'.$date.'</div>';
                    }

                    $html .= '<li class="thread-item">';
                    $html .= '<span class="avatar-span">';
                    $html .= '<div class="avatar-small" style="background-image: url('.$this->request->webroot.'upload/avatar/'.$message->image_url.')" data-id="'.$message->id.'">';
                    $html .= '</div>';
                    $html .= $message->from;
                    $html .= '</span>';
                    $html .= '<span class="overview">'.$message->content.'</span>';
                    $html .= '<span class="date">'.$message->time.'</span>';
                    $html .= '<span class="action"></span>';
                    $html .= '</li>';

                    echo $html;
                    
                } else {
                    echo 'error';
                }

                $this->autoRender = false;
                die;

            } 

        }
    }

    public function add()
    {

        $message = $this->Messages->newEntity();

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if (!empty($this->request->data)) {


                $data['to_user_id'] = $this->hashids()->decode($data['To'])[0];
                $data['from_user_id'] = $this->Auth->user('id');
                unset($data['To']);

                $message = $this->Messages->newEntity($data);

                if ($this->Messages->save($message)) {
                    $this->Flash->success(__('The message has been sent.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The message could not be sent. Please, try again.'));
                }

            }

             $message = $this->Messages->newEntity($data);

        }

        $the_users = $this->Messages->Users->find()
        ->contain('Workers')
        ->where(['Users.type'=> 3]);

        foreach ($the_users as $the_user) {
            $users[$this->hashids()->encode($the_user->id)] = $the_user->worker->display_name;
            
        }


        $this->set(compact('message', 'users'));
        $this->set('_serialize', ['message']);

    }

    public function mark_read($msg_id)
    {
        $row = $this->Messages->get($msg_id); 
        $row->status = 1;

        if($this->Messages->save($row)){
            return 'success';
        }
        else
        {
            return 'error';
        }
    }


    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];
        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add'])) {
            return true;
        }


        if($this->myCustomerId() || $this->myWorkerId())
        {
            return true;
        }
        else
        {
            return false;
        }

        return parent::isAuthorized($user);
    }  

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');

        $this->myvars(); //needed variable for view
        
        if($this->myUserType() == 'employees')
        {
            $this->viewBuilder()->layout('employee');
            $this->menus();
        }

    }  
}
