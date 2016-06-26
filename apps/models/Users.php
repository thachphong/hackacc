<?php

namespace Multiple\Models;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $username;
    public $password;
    public $fullname;
    public $email;
    public $avata;
    public function initialize()
    {
        $this->setSource("userm");
    }
    public function get_All(){
        $usr_data = Users::query()->execute();
        return $usr_data;
    }
    /*public function validation()
    {
        $this->validate(new EmailValidator(array(
            'field' => 'email'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'email',
            'message' => 'Sorry, The email was registered by another user'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'username',
            'message' => 'Sorry, That username is already taken'
        )));
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }*/
}
