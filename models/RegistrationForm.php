<?php

namespace mas\yii2users\models;

use Yii;
use yii\base\Model;

/**
 * RegistrationForm is the model behind the registration form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegistrationForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
         return [
            // Validations for username
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'mas\yii2users\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            // Validations for email
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'mas\yii2users\models\User', 'message' => 'This email address has already been taken.'],
            // Validations for password
            ['password', 'required'],
            ['password', 'string', 'min' => 6],            
            // Validations for password
            ['password_repeat', 'compare','compareAttribute'=>'password','message'=>'Password Repeat must be equal to "Password".'],
        ];
    }

     /**
     * Register user
     *
     * @return User|null the saved model or null if saving fails
     */
    public function Register()
    {
        if (!$this->validate()) {            
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();        
        return $user->save(false) ? $user : null;
    }
}
