<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "social_button".
 *
 * @property int $id
 * @property string $http_path
 * @property string $image
 */
class SocialButton extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social_button';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['http_path', 'image'], 'required'],
            [['http_path', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'http_path' => 'Http Path',
            'image' => 'Image',
        ];
    }
}
