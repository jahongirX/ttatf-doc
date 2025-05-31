<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "document_template".
 *
 * @property int $id
 * @property int $name
 * @property array $allowed_roles
 * @property string $body
 * @property int $status
 * @property string $created_date
 * @property string $updated_date
 */
class DocumentTemplate extends \common\components\Model
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date','updated_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE =>['updated_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document_template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['allowed_roles', 'body', 'status','name'], 'required'],
            [['allowed_roles', 'created_date', 'updated_date'], 'safe'],
            [['body'], 'string'],
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Xujjat nomi',
            'allowed_roles' => 'Ruxsati bor rollar',
            'body' => 'Matn',
            'status' => 'Status',
            'created_date' => 'Yaratilgan vaqt',
            'updated_date' => 'Yangilangan vaqt',
        ];
    }
}
