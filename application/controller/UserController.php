<?php

class UserController extends BaseController
{
    public function indexAction() {

    	$regions = [];
    	$location = new LocationModel();
    	$regions = $location->findRegion();


    	$this->view->render('index', ['regions' => $regions]);
    }

    public function regionAction() {
    	$input = file_get_contents('php://input');
        $data = json_decode($input, TRUE);
        $terr = new LocationModel();
        $result = $terr->findNextRegion($data['ter_pid']);
        
        echo (json_encode($result));
    }

    public function saveAction() {
        $input = file_get_contents('php://input');
        $data = json_decode($input, TRUE);

        $user = new UserModel($data['name'], $data['email'], $data['location']);
        if ($user->findByEmail()) {
            $terr = new LocationModel();
            $location = $terr->findById($data['location']);
            $msg = 'User already exist';
            $result = array('name' => $user->name, 
                        'email' => $user->email,
                        'location' => $location,
                        'msg' => $msg);
        } else {
            $user->save();
            $terr = new LocationModel();
            $location = $terr->findById($data['location']);
            $msg = 'User saved successfully';
            $result = array('name' => $user->name, 
                        'email' => $user->email,
                        'location' => $location,
                        'msg' => $msg);
        }
        echo (json_encode($result));
    }

}