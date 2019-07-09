<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\City;
use app\models\Home;
use app\models\Image;
use app\models\Place;
use app\models\Room;
use app\models\Street;
use app\models\User;
use Yii;
use app\models\Event;
use app\models\EventSearch;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
        $events = Event::find()->all();
        $cities = City::find()->all();
        $streets = Street::find()->all();
        $homes = Home::find()->all();
        $rooms = Room::find()->all();

        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',
            compact('searchModel',
                'dataProvider',
                'events',
                'cities',
                'streets',
                'homes',
                'rooms'
            ));
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
       // find the event by id
        $event = $this->findModel($id);
        //??
        $category = Category::find()->where(['id' => $event->category_id])->limit(1)->all();

        //???
        $user = User::find()->where(['id' => $event->user_id])->limit(1)->all();
       // $city = City::find()->where(['id' => $event->city->city])->limit(1)->all();
        //$image = Image::find()->where(['id' => $event->image->path])->limit(1)->all();

        // if  $city, $street, $home or $room are the new - safe this variables
        $city = new City();
        $street = new Street();
        $home = new Home();
        $room = new Room();
// create new image
        $image = new Image();

        if ($event->load(Yii::$app->request->post())) {
            if ($image->load(Yii::$app->request->post())) {
//this image downloads into file 'images'
                    $image->path = UploadedFile::getInstance($image, 'path');
                    $image->path->saveAs('images/' . $image->path->baseName . '.' . $image->path->extension);
  //this image saves.
                    $image->save(false);

 //find last 'id'
                    $image_id = Yii::$app->db->lastInsertID;
 //update '$event->image_id'
                    $event->image_id = $image_id;
                   $event->update(false);

                }

                return $this->redirect(['view', 'id' => $event->id]);
            }

            return $this->render('update', compact('event', 'image'));

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
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
