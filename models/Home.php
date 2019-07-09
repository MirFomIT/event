<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "home".
 *
 * @property int $id
 * @property string $home
 *
 * @property Event[] $events
 */
class Home extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['home'], 'required'],
            [['home'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'home' => 'Дом',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['home_id' => 'id']);
    }
}
