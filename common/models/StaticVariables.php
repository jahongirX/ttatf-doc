<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "static_variables".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 */
class StaticVariables extends \common\components\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'static_variables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['name', 'value'], 'string', 'max' => 500],
            ['name','unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
        ];
    }
}
