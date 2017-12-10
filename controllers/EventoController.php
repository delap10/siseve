<?php 

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\rest\ActiveController;
use app\models\PortadaEvento;
use app\models\InscripcionAlumnoEvento;
use app\models\Alumnos;

/**
* 
*/
class EventoController extends ActiveController
{
	
	public $modelClass = 'app\models\PortadaEvento';

	public $checkAccess = 'app\models\Alumnos';

	public function actions(){
		$actions = parent::actions();

		// disable the "create" action
    	unset($actions['create']);

		// customize the data provider preparation with the "prepareDataProvider()" method
    	$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

    	return $actions;
	}

	public function prepareDataProvider(){
		$query = new Query;
		return $query->select(['id_portada_evento', 'nombre_evento', 'encargado_informacion', 'lugar_evento', 'fecha_inicio_evento', 'fecha_termino_evento', 'hora_inicio_evento', 'hora_termino_evento', 'tipo_evento' => 'b.tipo_evento' , 'objetivo_evento', 'inscritos' => 'COUNT(c.evento)'])
		->from(['a' => 'portada_evento'])
		->join('INNER JOIN', 'tipo_evento b', 'a.tipo_evento = b.id_tipo_evento', [])
		->join('LEFT JOIN', 'inscripcion_alumno_evento c', 'a.id_portada_evento = c.evento', [])
		->where(['activo' => PortadaEvento::STATUS_ACTIVE])
		->groupBy(['id_portada_evento'])
		->all();
	}

	public function actionCreate(){
		$model = new InscripcionAlumnoEvento();

		if($model->load(Yii::$app->request->post(),'')){
			if($this->consultaAlumno(Yii::$app->request->post('matricula_alumno'))){
				if($this->verificaInscripcion(Yii::$app->request->post('matricula_alumno'), Yii::$app->request->post('evento'))){
					if($model->save()){
						echo json_encode(array(
							"message" => "Inscripción exitosa"
						));
					}else{
						echo json_encode(array(
							"message" => "Error al inscribirse"
						));
					}
				}else{
					echo json_encode(array(
						"message" => "Ya estás inscrito en este evento"
					));
				}
			}else{
				echo json_encode(array(
					"message" => "Número de control incorrecto o no registrado"
				));
			}
		}else{
			echo json_encode(array(
				"message" => "No ha ingresado el número de control"
			));
		}
	}

	public function actionAlumnos($v){
		/*Alumnos::findBySql("SELECT CONCAT(apellido_paterno,' ',apellido_materno,' ',nombre_alumno) AS nombre_alumno, nombre_carrera FROM alumnos AS a INNER JOIN carreras AS b ON a.carrera = b.carrera INNER JOIN inscripcion_alumno_evento AS c ON a.no_de_control = c.matricula_alumno INNER JOIN portada_evento AS d ON c.evento = d.id_portada_evento WHERE c.evento = $v")->all();*/

		$query = new Query;
		$query->select(['alumno' => 'CONCAT(apellido_paterno," ",apellido_materno," ",nombre_alumno)', 'nombre_carrera'])
			->from(['a' => 'alumnos'])
			->join('INNER JOIN', 'carreras', 'a.carrera = carreras.carrera', [])
			->join('INNER JOIN', 'inscripcion_alumno_evento', 'a.no_de_control = inscripcion_alumno_evento.matricula_alumno',[])
			->join('INNER JOIN', 'portada_evento', 'inscripcion_alumno_evento.evento = portada_evento.id_portada_evento', [])
			->where(['inscripcion_alumno_evento.evento' => $v]);

		return $query->all();	
	}

	public function consultaAlumno($matricula){
		$verifica = Alumnos::find()->where(['no_de_control' => $matricula])->one();

		if($verifica != null){
			return true;
		}else{
			return false;
		}
	}

	public function verificaInscripcion($matricula, $evento){
		$verifica = InscripcionAlumnoEvento::find()->where([
			'matricula_alumno' => $matricula,
			'evento' => $evento
		])->one();

		if($verifica != null){
			return false;
		}else{
			return true;
		}
	}

	public function actionInscritos($v){
		$query = new Query;
		$query->select(['total' => 'a.*'])
			->from('inscripcion_alumno_evento a')
			->join('INNER JOIN', 'portada_evento b', 'a.evento = b.id_portada_evento')
			->where(['a.evento' => $v]);

		return $query->count();
	}
}

?>