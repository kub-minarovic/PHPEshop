<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user register form data. It is used by the 'index' action of 'RegistrationController'.
 */
class RegisterForm extends CFormModel
{
    public $username;
    public $password;
    public $email;
    public $name;
    public $surname;
    public $password_repeat;

    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username, password and email are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('username, password, email, name, surname', 'required','message'=>'Please enter a value for {attribute}.'),
            array('password_repeat', 'required', 'on'=>'register'),
            array('username', 'length', 'min'=>7, 'message'=>'Your {attribute} needs to be longer then 7 chars.'),
            array('password', 'length', 'min'=>7, 'message'=>'Your {attribute} needs to be longer then 7 chars.'),
            array('email','email'),
            array('password', 'compare', 'compareAttribute' => 'password_repeat'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'username'=>'Your Username',
            'password'=>'Your Password',
            'email'=>'Email address',
            'name'=>'First name',
            'surname'=>'Last name',
        );
    }


}
