<?php

class SignupController extends Phalcon\Mvc\Controller
{

	public function indexAction()
	{

	}
        
       

	public function registerAction()
	{

		//Request variables from html form
		$name = $this->request->getPost('name', 'string');
		$email = $this->request->getPost('email', 'email');
                // kry get variables so
                // stuur jou get query string so
                // $id = $this->request->get('id', 'id');

		$user = new Users();
		$user->name = $name;
		$user->email = $email;

		//Store and check for errors
		if ($user->save() == true) {                                                         
                    $this->view->setVar('success',true);                                        			
		} else {
			echo 'Sorry, the next problems were generated: ';
			foreach ($user->getMessages() as $message){
				echo $message->getMessage(), '<br/>';
			}
		}
	}

}
