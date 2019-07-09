<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * EventSearch represents the model behind the search form of `app\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'count_places', 'event_duration', 'image_id', 'status', 'user_id', 'country_id','city_id','street_id','home_id'], 'integer'],
            [['create_at', 'updated_at', 'date', 'description', 'title', 'time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Event::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'count_places' => $this->count_places,
            'date' => $this->date,
            'event_duration' => $this->event_duration,
            'image_id' => $this->image_id,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'street_id' =>$this->street_id,
            'home_id' => $this->home_id,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'create_at', $this->create_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
