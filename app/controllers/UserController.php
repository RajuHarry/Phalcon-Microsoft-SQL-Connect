<?php

use Phalcon\Tag as Tag; 

class UserController extends Phalcon\Mvc\Controller
{    
    public function indexAction()
    {
        
    }
    
    public function editAction()
    {
         // load template           
        $id = $this->request->get('id', 'int');        
        $user = Users::findFirst(array(
            'id = :id:',
            'bind' => array('id' => $id)
            ));        
        $this->view->setVar('user', $user);
        // if !isset id then show 404
    }
    
    public function deleteAction()
    {
        /*$di = $this->di
        or
        $di =  Phalcon\DI::getDefault();
        $db = $di->get("db");  //you should register "db" first*/
        $id = $this->request->get('id', 'int');        
        $user = Users::findFirst(array(
            'id = :id:',
            'bind' => array('id' => $id)
            ));                
        if ($user->delete() == true) {
            $this->view->setVar('success',true);
        } else {
            echo 'Sorry, the next problems were generated: ';
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), '<br/>';
            }
        }
    }
    
    public function updateAction() {
        //Request variables from html form
        $name = $this->request->getPost('name', 'string');
        $email = $this->request->getPost('email', 'email');
        $id = $this->request->getPost('id', 'int');        
        
        
        $user = Users::findFirst(array(
            'id = :id:',
            'bind' => array('id' => $id)
            ));                
        
        $user->name = $name;
        $user->email = $email;
                
        //Store and check for errors                
                
        if ($user->save() == true) {
            $this->view->setVar('success',true);
            // echo 'User details updated!';
            //$response = new Phalcon\Http\Response();
            //$response->redirect('/users/delete');
            //die;                 
            $this->view->setVar('success',true);
        } else {
            echo 'Sorry, the next problems were generated: ';
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), '<br/>';
            }
        }
    }

}