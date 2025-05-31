<?php



namespace backend\controllers;



use Yii;

use common\models\DocumentTemplate;


use common\models\DocumentTemplateSearch;


use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use common\components\Controller;
use Mpdf\Mpdf;

class DocumentTemplateController extends Controller

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

                DocumentTemplate::findOne($items[$i])->delete();

            }

        }




        $searchModel = new DocumentTemplateSearch();

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

        $model = new DocumentTemplate();



        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            print_r($model->errors);
            return $this->render('create', [

                'model' => $model,

            ]);

        }

    }





    public function actionUpdate($id)

    {

        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);

        } else {

            return $this->render('update', [

                'model' => $model,

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


        if (($model = DocumentTemplate::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }

    public function actionPdf($id){

        $model = $this->findModel($id);

        $html = $this->renderPartial('pdf', [
            'model' => $model
        ]);

        // return $html;
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('document.pdf', \Mpdf\Output\Destination::INLINE); // INLINE yoki DOWNLOAD
    }

}

