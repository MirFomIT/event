<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property int $category_id
 * @property int $count_places
 * @property string $create_at
 * @property string $updated_at
 * @property string $date
 * @property string $description
 * @property string $event_duration
 * @property int $image_id
 * @property int $status
 * @property string $title
 * @property int $user_id
 * @property int $country_id
 * @property int $city_id
 * @property int $home_id
 * @property int $street_id
 * @property int $room_id
 * @property string $time
 *
 * @property Category $category
 * @property City $city
 * @property Home $home
 * @property Image $image
 * @property Room $room
 * @property Street $street
 * @property User $user
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'count_places', 'image_id', 'status', 'user_id', 'country_id', 'city_id', 'home_id', 'street_id', 'room_id'], 'integer'],
            [['date', 'event_duration', 'time'], 'safe'],
            [['description'], 'string'],
            [['title', 'time'], 'required'],
            [['create_at', 'updated_at', 'title'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['home_id'], 'exist', 'skipOnError' => true, 'targetClass' => Home::className(), 'targetAttribute' => ['home_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['street_id'], 'exist', 'skipOnError' => true, 'targetClass' => Street::className(), 'targetAttribute' => ['street_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'count_places' => 'Кол. мест',
            'create_at' => 'Create At',
            'updated_at' => 'Updated At',
            'date' => 'Дата',
            'description' => 'Описание',
            'event_duration' => 'Длительность',
            'image_id' => 'Картинка',
            'status' => 'Проверено',
            'title' => 'Заголовок',
            'user_id' => 'Автор события',
            'country_id' => 'Страна',
            'city_id' => 'Горд',
            'home_id' => 'Дом',
            'street_id' => 'Улица',
            'room_id' => 'Комната',
            'time' => 'Время',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHome()
    {
        return $this->hasOne(Home::className(), ['id' => 'home_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreet()
    {
        return $this->hasOne(Street::className(), ['id' => 'street_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
