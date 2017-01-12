<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workers Controller
 *
 * @property \App\Model\Table\WorkersTable $Workers
 */
class WorkersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $id = $this->Auth->user('id');

        $this->paginate = [
            'contain' => ['ServiceProviders', 'Users']
        ];

         switch ($this->myUserType()) {
            case 'employees':

             $workers = $this->paginate($this->Workers->find('all')
            ->where(['service_provider_id' => $this->mySesId()]));

             break;

            case 'workers':

              $workers = $this->paginate($this->Workers->find('all')
            ->where(['user_id' => $id]));

            break;

            default:
                # code...
            break;

         }

       
        $this->set(compact('workers'));
        $this->set('_serialize', ['workers']);
    }

    /**
     * View method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {
        if($this->myUserType() == 'employees' || $this->myCustomerId()){

                if($this->myUserType() != 'employees')
                {
                    $the_id = $this->hashids()->decode($id);
                    $id = $the_id[0];
                }

             

                $worker = $this->Workers->get($id, [
                    'contain' => ['ServiceProviders', 'Users', 'Bookmarks', 'Histories', 'Licenses', 'Skills', 'WorkersProjects']
                ]);

                

                $skillview = $this->skillView($id);
                $this->set('skillview', $skillview);
                $this->viewVars['skillview'];

                $this->set('worker', $worker);
                $this->set('_serialize', ['worker']);

                $projectview = $this->projectView($id);
                $this->set('projectview', $projectview);
                $this->viewVars['projectview'];
        }
        else
        {
            if($this->myWorkerId())
            {
                $worker = $this->Workers->get($this->myWorkerId(), [
                    'contain' => ['ServiceProviders', 'Users', 'Bookmarks', 'Histories', 'Licenses', 'Skills', 'WorkersProjects']
                ]);

                $skillview = $this->skillView();
                $this->set('skillview', $skillview);
                $this->viewVars['skillview'];

                $this->set('worker', $worker);
                $this->set('_serialize', ['worker']);

                $projectview = $this->projectView();
                $this->set('projectview', $projectview);
                $this->viewVars['projectview'];

            }
        }
            
    }

     public function modalView($id = null)
    {
        if($this->myUserType() == 'employees' || $this->myCustomerId()){

                if($this->myUserType() != 'employees')
                {
                    $the_id = $this->hashids()->decode($id);
                    $id = $the_id[0];
                }

             

                $worker = $this->Workers->get($id, [
                    'contain' => ['ServiceProviders', 'Users', 'Bookmarks', 'Histories', 'Licenses', 'Skills', 'WorkersProjects']
                ]);

                

                $skillview = $this->skillView($id);
                $this->set('skillview', $skillview);
                $this->viewVars['skillview'];

                $this->set('worker', $worker);
                $this->set('_serialize', ['worker']);

                $projectview = $this->projectView($id);
                $this->set('projectview', $projectview);
                $this->viewVars['projectview'];
        }
        else
        {
            if($this->myWorkerId())
            {
                $worker = $this->Workers->get($this->myWorkerId(), [
                    'contain' => ['ServiceProviders', 'Users', 'Bookmarks', 'Histories', 'Licenses', 'Skills', 'WorkersProjects']
                ]);

                $skillview = $this->skillView();
                $this->set('skillview', $skillview);
                $this->viewVars['skillview'];

                $this->set('worker', $worker);
                $this->set('_serialize', ['worker']);

                $projectview = $this->projectView();
                $this->set('projectview', $projectview);
                $this->viewVars['projectview'];

            }
        }

        $this->viewBuilder()->layout('resume');
        $this->render('view');
            
    }


    public function skillView($id = null){


        $html = '<table class="skill-sheet">';

       
            $skillcats = $this->Workers->ServiceProviders->SkillCategories->find('all')
        ->where(['service_provider_id' => $this->mySesId()]);
       
        
        
        foreach ($skillcats as $cats): 

         $skilloptions = $this->Workers->ServiceProviders->SkillCategories->SkillOptions->find('all')
        ->where(['skill_category_id' => $cats->id, 'service_provider_id' => $this->mySesId()]);

        $html .= '<tr>';
        $html .= '<td class="td-label big" rowspan="2">'.$cats->name.'</td>';
                foreach ($skilloptions as $options): 
                $html .= '<td class="td-label">'.$options->skill_name.'</td>';
                endforeach; 
        $html .= '</tr>';
        $html .= '<tr>';
                 foreach ($skilloptions as $options):

                if($this->myUserType()=='employees'||$this->myUserType()=='customers')
                {
                    $query = $this->Workers->Skills->find('all')
                    ->select(['skill_level_id'])
                    ->where(['worker_id' => $id, 'skill_option_id' => $options->id]);
                }
                else
                {
                    $query = $this->Workers->Skills->find('all')
                    ->select(['skill_level_id'])
                    ->where(['worker_id' => $this->myWorkerId(), 'skill_option_id' => $options->id]);
                }

                $row = $query->first();

                // print_r($row);

                $slevel =  $row['skill_level_id'];

                // $this->autoRender = false;

               $query = $this->Workers->Skills->SkillLevels->find('all')
                ->select(['level'])
                ->where(['id' => $slevel]);


                $row = $query->first();

                if(count($row))
                {
                    $level = $row['level'];
                }
                else
                {
                    $level = '-';
                }

                $html .= '<td>'.$level.'</td>';
                endforeach; 
                $html .= '</tr>';
        endforeach; 
        $html .= '</table>';

        return $html;
        
    }

    public function projectView($id = null){

       if (!empty($this->Workers->WorkersProjects)):
        $html = '<table class="skill-sheet columnar" cellpadding="0" cellspacing="0">';
        $html .= '<tr>';
        $html .= '<th>Project Category</th>';
        $html .= '<th>Project</th>';
        $html .= '<th>Created</th>';
        $html .= '<th>Modified</th>';
        // $html .= '<th class="actions">Actions</th>';
        $html .= '</tr>';

        if($this->myUserType()=='employees'||$this->myUserType()=='customers')
        {
             $query = $this->Workers->WorkersProjects->find('all')
        ->where(['worker_id' => $id]);
        }
        else
        {
             $query = $this->Workers->WorkersProjects->find('all')
        ->where(['worker_id' => $this->myWorkerId()]);
        }

        $res = $query->all();

            foreach ($res as $projects): 
             $html .= '<tr>';

            $pquery = $this->Workers->ServiceProviders->Projects->find('all')
                ->select(['project_category_id','name'])
                ->where(['id' => $projects->project_id]);

            $pquery = $pquery->first();


            $catquery = $this->Workers->ServiceProviders->ProjectCategories->find('all')
                ->select(['name'])
                ->where(['id' => $pquery['project_category_id']]);

            $catquery = $catquery->first();

             $html .= '<td>'.$catquery['name'].'</td>';
             $html .= '<td>'.$pquery['name'].'</td>';
             $html .= '<td>'.$projects->created.'</td>';
             $html .= '<td>'.$projects->modified.'</td>';
             // $html .= '<td class="actions">';
             // $html .= '<a href="/taiyaki/workers-projects/view/'.$projects->id.'">View</a>';
             // $html .= '<a href="/taiyaki/workers-projects/edit/'.$projects->id.'">Edit</a>';
             // $html .= '</td>';
             $html .= '</tr>';
            endforeach;
         $html .= '</table>';
        endif; 

        return $html;
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $worker = $this->Workers->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;

            if (!empty($this->request->data)) {
                if (!empty($this->request->data['upload']['name'])) {
                $file = $this->request->data['upload']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                $setNewFileName = time() . "_" . rand(000000, 999999);

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/upload/avatar/' . $setNewFileName . '.' . $ext);

                    //prepare the filename for database entry 
                    $imageFileName = $setNewFileName . '.' . $ext;
                    }
                }

            }

        
            $data['user']['type'] = 3;
            $data['user']['status'] = 1;
            if (!empty($this->request->data['upload']['name'])) {
                $data['user']['image_url'] = $imageFileName;
            }

            $data['service_provider_id'] = $this->mySesId();

             

            $worker = $this->Workers->newEntity($data, ['associated' => ['Users']] );

            $user = $this->Workers->Users->newEntity();

            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('The worker has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The worker could not be saved. Please, try again.'));
            }
        }
        $serviceProviders = $this->Workers->ServiceProviders->find('list', ['limit' => 200]);
        $users = $this->Workers->Users->find('list', ['limit' => 200]);
        $this->set(compact('worker','serviceProviders', 'users'));
        $this->set('_serialize', ['worker']);
    }

    public function newWorker()
    {
        $worker = $this->Workers->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;

            if (!empty($this->request->data)) {
                if (!empty($this->request->data['upload']['name'])) {
                $file = $this->request->data['upload']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                $setNewFileName = time() . "_" . rand(000000, 999999);

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/upload/avatar/' . $setNewFileName . '.' . $ext);

                    //prepare the filename for database entry 
                    $imageFileName = $setNewFileName . '.' . $ext;
                    }
                }

            }

        
            $data['user']['type'] = 3;
            $data['user']['status'] = 1;
            if (!empty($this->request->data['upload']['name'])) {
                $data['user']['image_url'] = $imageFileName;
            }

            $data['service_provider_id'] = 1;


            $worker = $this->Workers->newEntity($data, ['associated' => ['Users']] );

            $user = $this->Workers->Users->newEntity();

            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('Welcome to Work Studio. Please login to your account.'));
                $this->redirect(array("controller" => 'Users', 
                      "action" => "login"), $exit);
            } else {
                $this->Flash->error(__('The worker could not be saved. Please, try again.'));
            }
        }
        $serviceProviders = $this->Workers->ServiceProviders->find('list', ['limit' => 200]);
        $users = $this->Workers->Users->find('list', ['limit' => 200]);
        $this->set(compact('worker','serviceProviders', 'users'));
        $this->set('_serialize', ['worker']);
    }




    /**
     * Edit method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        if($this->myUserType()=='employees'){
            $worker = $this->Workers->get($id, [
                'contain' => ['Users']
            ]);
        }
        else
        {
            $worker = $this->Workers->get($this->myWorkerId(), [
                'contain' => ['Users']
            ]);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {


            if (!empty($this->request->data)) {
                if (!empty($this->request->data['upload']['name'])) {
                $file = $this->request->data['upload']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                $setNewFileName = time() . "_" . rand(000000, 999999);

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/upload/avatar/' . $setNewFileName . '.' . $ext);

                    //prepare the filename for database entry 
                    $imageFileName = $setNewFileName . '.' . $ext;
                    }
                }

            }

            $data = $this->request->data;

            if (!empty($this->request->data['upload']['name'])) {
                $data['user']['image_url'] = $imageFileName;
            }
                
            if($this->myUserType()=='employees')
            {
                $worker = $this->Workers->patchEntity($worker, $data);
            }
            else
            {
                
                $data['id'] = $this->myWorkerId();
                $worker = $this->Workers->patchEntity($worker, $data);
            }

            
            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('The worker has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The worker could not be saved. Please, try again.'));
            }
        }
        $serviceProviders = $this->Workers->ServiceProviders->find('list', ['limit' => 200]);
        $users = $this->Workers->Users->find('list', ['limit' => 200]);
       
        $this->set(compact('worker', 'serviceProviders', 'users'));
        $this->set('_serialize', ['worker']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $worker = $this->Workers->get($id);
        if ($this->Workers->delete($worker)) {
            $this->Flash->success(__('The worker has been deleted.'));
        } else {
            $this->Flash->error(__('The worker could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];
        // The add and index actions are always allowed.
        // if (in_array($action, [])) {
        //     return true;
        // }
        if (in_array($action, ['topWorkers'])) {
            if($this->myWorkerId()){
                return false;
            }      
        }


        if($this->myWorkerId())
        {
            return true;
        }
        else if($this->myCustomerId()){
            return true;
        }
        else if($this->myEmployeeType()==1)
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

        $this->myvars(); //needed variable for view

        if($this->myUserType() == 'employees')
        {
            $this->viewBuilder()->layout('employee');
            $this->menus();
        }

         $this->Auth->allow(['newWorker']);
        
    }  

}
