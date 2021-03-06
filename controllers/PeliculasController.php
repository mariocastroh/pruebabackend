<?php

namespace app\controllers;

use Yii;
use app\models\Peliculas;
use app\models\PeliculasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Genero;
use app\models\FormUpload;
use yii\web\UploadedFile;


/**
 * PeliculasController implements the CRUD actions for Peliculas model.
 */
class PeliculasController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Peliculas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeliculasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peliculas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Peliculas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peliculas();
        $modelupl = new FormUpload;
        $genero  = ArrayHelper::map(Genero::find()->all(), 'id', 'nombre');
        $msg = null;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

          // Upload images
       $modelupl->file = UploadedFile::getInstances($modelupl, 'file');

       if ($modelupl->file && $modelupl->validate()) {
           foreach ($modelupl->file as $file) {
             $nameimg = 'imagen' . time() . '.' . $file->extension;
             $file->saveAs('archivos/' . $nameimg);
             $msg = "<p><strong class='label label-info'>Subida realizada con éxito</strong></p>";
           }
          $model->imagen = $nameimg;
          if ( $model->save()) {
              return $this->redirect(['view', 'id' => $model->id]);
           }else{
             $msg = 'Error, no se puedo guardar informacion en "Inicio"';
             $msgtipo = 'danger';
           }

         }else{
           $msg = "Error, no se ha seleccionado la imagen";
           $msgtipo = 'danger';
         }
        } else {
            return $this->render('create', [
                'model' => $model,
                'genero' => $genero,
                'modelupl' => $modelupl,
                'msg' => $msg,
            ]);
        }

        $model->urlimagen = $nameimg;
    }

    /**
     * Updates an existing Peliculas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelupl = new FormUpload;
        $genero  = ArrayHelper::map(Genero::find()->all(), 'id', 'nombre');
        $msg = null;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'genero' => $genero,
                'modelupl' => $modelupl,
                'msg' => $msg,

            ]);
        }
    }

    /**
     * Deletes an existing Peliculas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peliculas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peliculas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peliculas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
