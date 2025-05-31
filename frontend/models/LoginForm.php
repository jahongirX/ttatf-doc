<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\httpclient\Client;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUserByApi();

            if (!$user) {
                $this->addError($attribute, 'Login yoki parol xato.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            // print_r($this->getUserByApi());die;
            return Yii::$app->user->login($this->getUserByApi(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Talaba ID',
            'password' => 'Parol'
        ];
    }

    /**
     * Finds user by username and password by API
     *
     * @return User|null
     */
    public function getUserByApi(){
        if ($this->_user === false) {
            $client = new Client([
                'requestConfig' => [
                    'headers' => [
                        'User-Agent' => 'MyYii2App/1.0',
                    ],
                ],
            ]);

            $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://student.ttatf.uz/rest/v1/auth/login')
            ->addHeaders(['Authorization' => '1iOc7IajuJCeTJ0fQR2y_31GaE-7tsUR'])
            ->setData([
                'login' => $this->username,
                'password' => $this->password,
            ])
            ->send();
            
            if ($response->isOk) {
                $data = $response->data;

                if($data['data']['token']){
                   
                    $userData = $this->getUserByToken($data['data']['token']);
                    Yii::$app->session->set('user_token', $data['data']['token']);
                    if($userData){
                        // Example: if API returns a token and user data
                        $user = new User([
                            'id' => $userData['student_id_number'],
                            'username' => $userData['short_name'],
                            'authKey' => $data['data']['token'], // optional
                            'accessToken' => $data['data']['token'],
                            'password' => $this->password
                        ]);

                        $this->_user = $user;
                    }
                }

                
            } 
        }

        return $this->_user;
    }

    public function getUserByToken($token = null){

        $client = new Client([
            'requestConfig' => [
                'headers' => [
                    'User-Agent' => 'MyYii2App/1.0',
                ],
            ],
        ]);
       
        $response = $client->createRequest()
        ->setMethod('GET')
        ->setUrl('https://student.ttatf.uz/rest/v1/account/me')
        ->addHeaders([ 'Authorization' => 'Bearer ' . $token])
        ->send();
        if ($response->isOk) {
            return $response->data['data'];
        }

        return null;
    }
}
