<?php

class IndexController extends Phalcon\Mvc\Controller 
{
	public function indexAction()
	{           
            
            $this->view->setVar('users', Users::find());
            $user = Users::find();
        
            $connection = $this->db;
            $exegetgeo = "SELECT * FROM users";
            //echo '<pre>';print_r($exegetgeo);exit;
            try 
            {
                $bhimrao = $connection->query($exegetgeo);
                
                //echo '<pre>';print_r($bhimrao);exit;
                
                $getnum = trim($bhimrao->numRows());
                if($getnum!=0)
                {
                    while($row = $bhimrao->fetch())
                    {
                        $getlistmn[] = $row;
                    }
                    $getlist = $getlistmn;
                }
                else{
                    $getlist = array();
                }       
            }
            catch (Exception $e) {
                $getlist = $e;
            }
            echo '<pre>';print_r($getlist);exit;
    }                             

}
