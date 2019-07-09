<?php
/**
 * Created by PhpStorm.
 * User: Elena
 * Date: 3/26/2019
 * Time: 4:14 PM
 */

namespace app\models;


use yii\db\ActiveRecord;

class Reserve extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserve';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['going'], 'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }

    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id'=>'event_id']);
    }
}