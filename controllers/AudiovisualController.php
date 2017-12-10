<?php

namespace app\controllers;

use Yii;
use app\models\Audiovisual;
use app\models\AudiovisualSearch;
use app\controllers\DifusionController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AudiovisualController implements the CRUD actions for Audiovisual model.
 */
class AudiovisualController extends Controller
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
     * Lists all Audiovisual models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AudiovisualSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Audiovisual model.
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
     * Creates a new Audiovisual model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Audiovisual();

        if ($model->load(Yii::$app->request->post())) {
            //Recoger opciones seleccionadas del checkbox
            $equipo_audiovisual = DifusionController::getCheckBoxList($_POST['Audiovisual']['equipo_audiovisual']);
            $equipo_computo = DifusionController::getCheckBoxList($_POST['Audiovisual']['equipo_computo']);

            //Guardar datos
            $model->equipo_audiovisual = $equipo_audiovisual;
            $model->equipo_computo = $equipo_computo;
            $model->departamento = $_POST['Audiovisual']['departamento'];
            $model->id_portada = $_POST['Audiovisual']['id_portada'];

            //Verificar si se guardó
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id_anexo_4_audiovisual]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Audiovisual model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_anexo_4_audiovisual]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Audiovisual model.
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
     * Finds the Audiovisual model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Audiovisual the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Audiovisual::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
