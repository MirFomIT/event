<?php
/**
 * Created by PhpStorm.
 * User: Elena
 * Date: 2/1/2019
 * Time: 8:08 PM
 */

namespace app\controllers;


use app\models\Category;
use app\models\Event;
use app\models\Events;
use app\models\EventSearch;
use app\models\Image;
use app\models\Place;
use app\models\User;

use Yii;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class UserController extends Controller
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
        $user_id = Yii::$app->user->identity['id'];
        if(!Yii::$app->user->isGuest) {
            $categories = Category::find()
                //  ->asArray()
                ->leftJoin('event', '`event`.`category_id` = `category`.`id`')
                ->leftJoin('user', '`user`.`id` = `event`.`user_id`')
                ->where(["!=", '`category`.`id`', 1])
                ->andWhere(['`user`.`id`'=>$user_id])
                // ->indexBy('product_code')
                //->groupBy(['norm.dish_code'])
                ->all();

            $date = Yii::$app->request->get('datepicker');

            if ($date != null) {
                $events = Event::find()->where(['date' => $date])->andWhere(['status' => 1])->andWhere(['user_id' => $user_id])->all();
                // $categories = Category::find()->where(['id' => 'event['']']);
                return $this->render('index', compact('events', 'date','categories'));
            } else {
                $events = Event::find()->where(['status' => 1])->andWhere(['user_id' => $user_id])->all();
                //  $categories = Category::find()->where(['id',leftJoin([''])])->all();
                return $this->render('index', compact('events', 'date', 'categories'));

            }


            $searchModel = new EventSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'events' => $events,
                'categories' =>$categories
            ]);
        }
    }
    public function actionCategory(){
        return $this->render('category');
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
         $event = $this->findModel($id);
       //  $image = new Image();

        if(Yii::$app->request->post()){

            $event->load(Yii::$app->request->post());
            if(UploadedFile::getInstance($event,'image_path')){
                $event->image->path = UploadedFile::getInstance($event,'image_path');
                $event->image->path->saveAs('images/'.$event->image_path->baseName.'.'.$event->image_path->extension);
                $event->image->path->save(false);
            }

            $event->image_id = Yii::$app->db->getLastInsertID();
            $event->save(false);

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