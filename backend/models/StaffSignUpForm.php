<?php


namespace backend\models;

use common\models\Staff;
use common\models\User;
use yii\base\Model;

class StaffSignUpForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $hemis_staff_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Staff', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Staff', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['hemis_statt_id','string'],
            ['hemis_statt_id', 'unique', 'targetClass' => '\common\models\Staff', 'message' => 'This email address has already been taken.'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Staff();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->hemis_staff_id = $this->hemis_staff_id;

        return $user->save() ? $user : null;
    }
}
