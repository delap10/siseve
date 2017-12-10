<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class AgregarForm extends Model{
    public $nombre_evento;
    public $coordinador_evento;
    public $coordinador_operativo;
    public $responsable_informacion;
    public $lugar_evento;
    public $fecha_inicio_evento;
    public $fecha_termino_evento;
    public $hora_inicio_evento;
    public $hora_termino_evento;
    public $objetivo_evento;
    public $lema_evento;

    /*Anexo 1. Difusión*/
    public $difusion_evento;
    public $impresion_papeleria;
    public $invitacion_evento;
    public $television;
    public $prensa;
    public $fotografia;
    public $duplicados;
    public $copias;
    public $invitaciones_externas;
    public $invitaciones_internas;


    /**
     * @return array the validation rules.
     */
    public function rules(){
        return [
            ['nombre_evento', 'required', 'message' => 'El nombre del evento es requerido'],
            ['nombre_evento', 'match', 'pattern' => "/^.{1,100}$/", 'message' => 'Mínimo 1 caracter, máximo 100'],
            ['nombre_evento', 'match', 'pattern' => "/^[a-zñáéíóú\s]+$/i", 'message' => 'Sólo se permiten letras'],

            ['coordinador_evento', 'required', 'message' => 'El coordinador del evento es requerido'],
            ['coordinador_evento', 'match', 'pattern' => "/^.{1,100}$/", 'message' => 'Mínimo 1 caracteres, máximo 100'],
            ['coordinador_evento', 'match', 'pattern' => "/^[a-zñáéíóú\s]+$/i", 'message' => 'Sólo se permiten letras'],

            ['coordinador_operativo', 'required', 'message' => 'El coordinador operativo es requerido'],
            ['coordinador_operativo', 'match', 'pattern' => "/^.{1,100}$/", 'message' => 'Mínimo 1 caracteres, máximo 100'],
            ['coordinador_operativo', 'match', 'pattern' => "/^[a-zñáéíóú\s]+$/i", 'message' => 'Sólo se permiten letras'],

            ['lugar_evento', 'required', 'message' => 'El lugar del evento es requerido'],
            ['lugar_evento', 'match', 'pattern' => "/^.{1,100}$/", 'message' => 'Mínimo 1 caracteres, máximo 100'],
            ['lugar_evento', 'match', 'pattern' => "/^[a-zñáéíóú\s]+$/i", 'message' => 'Sólo se permiten letras'],

            ['fecha_inicio_evento', 'required', 'message' => 'El fecha de inicio del evento es requerido'],

            ['fecha_termino_evento', 'required', 'message' => 'El fecha de inicio del evento es requerido'],

            ['hora_inicio_evento', 'required', 'message' => 'El hora de inicio del evento es requerido'],

            ['hora_termino_evento', 'required', 'message' => 'El hora de inicio del evento es requerido'],

            ['objetivo_evento', 'match', 'pattern' => "/^.{1,100}$/", 'message' => 'Mínimo 1 caracter, máximo 100'],
            ['objetivo_evento', 'match', 'pattern' => "/^[a-zñáéíóú\s]+$/i", 'message' => 'Sólo se permiten letras'],

            ['lema_evento', 'match', 'pattern' => "/^.{1,100}$/", 'message' => 'Mínimo 1 caracter, máximo 100'],
            ['lema_evento', 'match', 'pattern' => "/^[a-zñáéíóú\s]+$/i", 'message' => 'Sólo se permiten letras'],
        ];
    }

}

?>