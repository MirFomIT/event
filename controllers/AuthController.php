<?php
/**
 * Created by PhpStorm.
 * User: Elena
 * Date: 2/3/2019
 * Time: 11:34 AM
 */

namespace app\controllers;


use app\models\Category;
use app\models\Event;
use app\models\Image;
use app\models\Place;
use app\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class AuthController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $user_id =   Yii::$app->user->identity['id'];
            $categories = Category::find()->where(['id'=>$user_id])->all();
        }

        $date = Yii::$app->request->get('datepicker');

        if($date != null){
            $events  = Event::find()->where(['date' =>$date])->andWhere(['status' =>1])->andWhere(['user_id'=>$user_id])->all();
            return $this->render('index',compact('events','date'));
        }else{
            $events = Event::find()->where(['status' =>1])->andWhere(['user_id'=>$user_id])->all();
            return $this->render('index',compact('events','date','categories'));
        }


        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'events' =>$events
        ]);
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // $id = Yii::$app->request->post();
        $event = $this->findModel($id);
        //$category = $event->getCategory();

        $category = Category::find()->where(['id' => $event->category_id])->all();
        $user = User::find()->where(['id'=>$event->user_id])->limit(1)->all();
        $place = Place::find()->where(['id' => $event->place_id])->limit(1)->all();
        $image = Image::find()->where(['id' => $event->image_id])->limit(1)->all();
        // $event->category_id = $event->category->category;

        if(Yii::$app->request->post()){
            $category->category = $event->getCategory();
            $place->city = $event->getPlace();

            $event->load(Yii::$app->request->post());

        }
        /*if ($event->load(Yii::$app->request->post()) && $event->save()) {
            return $this->redirect(['view', 'id' => $event->id]);
        }else{
            echo'Error';
        }*/

        // return $this->render('update', compact('event', 'category', 'place', 'image','user'));
        return $this->render('update',compact('event'));
    }


    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

        if (($event = Event::findOne($id)) !== null) {
            $event->category_id = $event->category->id;
            return $event;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}