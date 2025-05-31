<?php



namespace backend\controllers;

use backend\models\StaffSignUpForm;
use backend\models\UpdateStaffForm;
use Yii;

use common\models\Staff;


use common\models\StaffSearch;


use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use common\components\Controller;



class StaffController extends Controller

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





    public function actionIndex()

    {

        if(Yii::$app->request->post()){

            $items = Yii::$app->request->post()['rm-input'];

            $items = explode(',', $items);

            for($i = 0; $i < count($items) - 1;$i++){

                if($items[$i] != null)

                Staff::findOne($items[$i])->delete();

            }

        }




        $searchModel = new StaffSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);


    }





    public function actionView($id)

    {

        return $this->render('view', [

            'model' => $this->findModel($id),

        ]);

    }





    public function actionCreate()
    {
        $model = new StaffSignUpForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = new UpdateStaffForm();
        $userm = Staff::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->update($id,$model->password)) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'userm' => $userm,
            ]);
        }
    }





    public function actionDelete($id)

    {

        $this->findModel($id)->delete();



        return $this->redirect(['index']);

    }





    protected function findModel($id)

    {


        if (($model = Staff::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }

}

