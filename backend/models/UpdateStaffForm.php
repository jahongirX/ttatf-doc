<?php
namespace backend\models;

use common\models\Staff;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class UpdateStaffForm extends Model
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
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'trim'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['hemis_staff_id','string']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function update($id,$password)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = Staff::findOne($id);
        $user->username = $this->username;
		$user->password = $user->setPassword($password);
        $user->hemis_staff_id = $this->hemis_staff_id;
        return $user->save() ? $user : null;
    }
}
