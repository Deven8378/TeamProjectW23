<?php
namespace app\controllers;

class User extends \app\core\Controller
{
   
    public function index()
    {
        if (!isset($_SESSION['user_id']))
        {
            if(isset($_POST['action']))
            {
                $user = new \app\models\User();
                $user = $user->getByUsername($_POST['username']);
                
                if($user)
                {
                    if(password_verify($_POST['password'], $user->password_hash))
                    {
                        //the user is correct
                        $_SESSION['user_id'] = htmlentities($user->user_id);
                        $_SESSION['user_type'] = htmlentities($user->user_type);


                        //Redirect the User to the correct page depending on the user_type
                        if($_SESSION['user_type'] =="itspecialist"){
                           // header('location:/User/twofasetup');
                            header('location:/itspecialist/index');
                        }else
                        {
                            header('location:/Main/index');
                        }

                    } 
                    else 
                    {
                        header('location:/User/index?error=Bad username/password combination.');
                    }
                } 
                else 
                {    //no such user
                    header('location:/User/index?error=Bad username/password combination.');
                }
            } 
            else 
            {
                $this->view('User/index');
            }
        }
        else 
        {
            header('location:/Main/index?error=User already logged in.');
        }
    }

    public function logout()
    {
        if(isset($_SESSION['user_id']))
        {
            session_destroy();
            header('location:/Main/index?success=Successfully logged out.');
        }
        else
        {
            header('location:/Main/index?error=ERROR: Could not log out.');
        }
    }
        

    // Use: /Default/makeQRCode?data=protocol://address
    public function makeQRCode()
    {
        $data = $_GET['data'];
        \QRcode::png($data);
    }

    #[\app\filters\ITSpecialist]
    public function twofasetup(){
            $user = new \app\models\User();
            $user = $user->getSecretKey();
            $secretkey = $user->secret_key;
            if ($secretkey != null) {
                $_SESSION['secretkey'] = $secretkey;
            }

        if(isset($_POST['action'])){
            $currentcode = $_POST['currentCode'];
        if(\app\core\TokenAuth6238::verify($_SESSION['secretkey'],$currentcode)){//the user has verified their proper 2-factor authentication setup
             $user->secret_key = $_SESSION['secretkey'];
             $user->update2fa();
             header('location:/ITspecialist/index');
        }else{
             header('location:/User/twofasetup?error=token not verified!');//reload
        }
        }else if ($secretkey == null){
            $secretkey = \app\core\TokenAuth6238::generateRandomClue();
            $_SESSION['secretkey'] = $secretkey;
        } else {
            $url = \app\core\TokenAuth6238::getLocalCodeUrl($_SESSION['user_type'],'sweemory.com',$secretkey,'Sweemory App');
            $this->view('ITspecialist/twofasetup', $url);
            $token = \app\core\TokenAuth6238::getTokenCode($secretkey);
            var_dump($token);
            var_dump($secretkey);
        }
        
    }

}