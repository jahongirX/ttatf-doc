<?php

namespace frontend\models;

use yii\httpclient\Client;
use Yii;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $client = new Client([
            'requestConfig' => [
                'headers' => [
                    'User-Agent' => 'MyYii2App/1.0',
                ],
            ],
        ]);
    
        $token = Yii::$app->session->get('user_token');

        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://student.ttatf.uz/rest/v1/account/me')
            ->addHeaders([ 'Authorization' => 'Bearer ' . $token])
            ->send();
    
        if ($response->isOk && isset($response->data['data'])) {
            $data = $response->data['data'];
    
            // API dan kelgan ma’lumotlar asosida user obyektini yaratamiz
            return new static([
                'id' => $data['student_id_number'],
                'username' => $data['short_name'],
                'authKey' => $token,
                'accessToken' => $token,
            ]);
        }
    
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
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

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
