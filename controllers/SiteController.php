<?php

namespace app\controllers;

use app\models\Category;
use app\models\City;
use app\models\Event;
use app\models\Events;
use app\models\Home;
use app\models\Image;
use app\models\Place;
use app\models\RegisterForm;
use app\models\Reserve;
use app\models\Room;
use app\models\Street;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'register'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $events = Event::find()->where(['status' =>1])->all();
        $categories = Category::find()->where(['!=','id',1])->all();
        $user_id =   Yii::$app->user->identity['id'];
        $date = Yii::$app->request->get('datepicker');

        $reserve = new Reserve();


            if($date != null){
                $events  = Event::find()->where(['date' =>$date])->andWhere(['status' =>1])->all();
                return $this->render('index',compact('events','date','categories','user_id'));
            }

// if click button 'GO' - save into table 'RESERVE'
        if(Yii::$app->request->post('go_<?=$event->id?>')){
$event_id = $this->findModel($this->id);
           // search 'ID' event

            return $this->render('index',compact('events','date','categories','user_id','event_id'));

            //save into table RESERVE
            //    $reserve->user_id = Yii::$app->user->identity['first_name'];
             //   $reserve->event_id = $event_id;
              //  $reserve->going = 1;
             //   $reserve->save(false);
        }

        if(Yii::$app->request->post('delete_<?=$event->id?>')){
           // $reserve = Reserve::find()->Where(['event_id' => $event->id])->all();
        }

         if(Yii::$app->request->post('submit')){
    return $this->render('index',compact('events','date','categories','user_id'));
}

         return $this->render('index',compact('events','date','categories','user_id'));
    }

    /**
     * @return string
     */
    public function actionEvent()
    {

        if (Yii::$app->user->isGuest) {
            // $user_id = Yii::$app->user->identity['id'];
            // if(!$user_id){
            $this->redirect('site/register');
            // }
        }

        $categories = Category::find()->all();
        $events = Event::find()->all();
        $session = Yii::$app->session;
        $session->open();
        $image = new Image();
        $event = new Event();
        $city = new City();
        $street = new Street();
        $home = new Home();
        $room = new Room();
        $category = new Category();



        if (
            $event->load(Yii::$app->request->post())
            && $image->load(Yii::$app->request->post())
            && $city->load(Yii::$app->request->post())
            && $street->load(Yii::$app->request->post())
            && $home->load(Yii::$app->request->post())
            && $room->load(Yii::$app->request->post())
            && $category->load(Yii::$app->request->post())
        )
        {


            $isValid = $event->validate();
            $isValid = $image->validate() && $isValid;
            $isValid = $city->validate() && $isValid;
            $isValid = $street->validate() && $isValid;
            $isValid = $home->validate() && $isValid;
            $isValid = $room->validate() && $isValid;

            $event->status = 0;
            $event->user_id = Yii::$app->user->id;

            $city_name = $city->city;
            $street_name = $street->street;
            $home_name = $home->home;
            $room_name = $room->room;
            $category_name = $category->category;

            $city_id = City::find()
                ->select('id')
                // ->asArray()
                ->where(['city' => $city_name])
                ->all();
//var_dump($city_id);die();
            $street_id = Street::find()
                ->select('id')
                // ->asArray()
                ->where(['street' => $street_name])
                ->all();
            $home_id = Home::find()
                ->select('id')
                // ->asArray()
                ->where(['home' => $home_name])
                ->all();
            $room_id = Room::find()
                ->select('id')
                // ->asArray()
                ->where(['room' => $room_name])
                ->all();
            $category_id = Category::find()
                ->select('id')
                ->where(['category' => $category_name])
                ->all();

            if ($city_id) {
                $event->city_id = $city_id;

            } else {

                $city->save(false);
                $city_id = Yii::$app->db->getLastInsertID();

                $event->city_id = $city_id;
            }
            if ($street_id) {
                $event->street_id = $street_id;
            } else {
                $street->save(false);
                $event->street_id = Yii::$app->db->getLastInsertID();
            }
            if ($home_id) {

                $event->home_id = $home_id;
            } else {
                $home->save(false);
                $event->home_id = Yii::$app->db->getLastInsertID();
            }
            if ($room_id) {
                $event->room_id = $room_id;
            } else {
                $room->save(false);
                $event->room_id = Yii::$app->db->getLastInsertID();
            }
            if($category_id){
                $event->category_id = $category_id;
            }else{
                $category->save(false);
                $event->category_id = Yii::$app->db->lastInsertID;
            }



            $image->path = UploadedFile::getInstance($image, 'path');
            $image->path->saveAs('images/' . $image->path->baseName . '.' . $image->path->extension);

            $image->save(false);
            $event->image_id = Yii::$app->db->lastInsertID;

            $event->save(false);


            return $this->redirect('/');

        }

        return $this->render('event',compact('categories','session','event','city','home','street','room','image','category'));
    }
    public function actionUser(){
        return $this->render('user');
    }
    public function actionPlace(){
        return $this->render('place');
    }
    public function actionCategory(){
        $categories = Category::find()->where(['!=','id',1])->all();
        $id = Yii::$app->request->get('id');
        $date = Yii::$app->request->get('datepicker');

        if($date != null){
            $events = Event::find()->where(['category_id'=>$id])->andWhere(['date' =>$date])->andWhere(['status' =>1])->all();
            return $this->render('category', compact('events','date','categories'));
        }else{
            $events = Event::find()->where(['category_id'=>$id])->andWhere(['status' =>1])->all();
            return $this->render('category', compact('events','date','categories'));
        }

    }
    public function actionPage(){
        $categories = Category::find()->where(['!=','id',1])->all();
        $id = Yii::$app->request->get('id');
        $event = Event::findOne($id);

        return $this->render('page',compact('event','categories'));
    }

    /** Register action**/
    public function actionRegister(){
       $model = new RegisterForm();
       if($model->load(Yii::$app->request->post())){
           // var_dump($model);die();

           if ($model->register()) {
               return $this->redirect(['site/login']);
           }

       }
           return $this->render('register', compact('model'));

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

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
        $model = $this->findModel($id);
        $category = Category::find()->where(['id' => $model->category_id])->limit(1)->all();
        $user = User::find()->where(['id'=>$model->user_id])->limit(1)->all();
        $image = Image::find()->where(['id' => $model->image_id])->limit(1)->all();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model', 'category', 'image','user'));

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
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event
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
