<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\web\View;

	$this->registerJs(
	    "inicio();
	    $('#anexo1').on('click', function() {
	    	if(!$(this).is(':checked')){
	    		$('.cobertura').prop('disabled', true);
	    		$('.television').prop('disabled', true);
	    		$('.prensa').prop('disabled', true);
	    		$('.fotografia').prop('disabled', true);
	    		$('.duplicados').prop('disabled', true);
	    		$('.copias').prop('disabled', true);
	    		$('.impresion').prop('disabled', true);
	    		$('.externas').prop('disabled', true);
	    		$('.internas').prop('disabled', true);
	    	}else{
	    		$('.cobertura').prop('disabled', false);
	    		$('.television').prop('disabled', false);
	    		$('.prensa').prop('disabled', false);
	    		$('.fotografia').prop('disabled', false);
	    		$('.duplicados').prop('disabled', false);
	    		$('.copias').prop('disabled', false);
	    		$('.impresion').prop('disabled', false);
	    		$('.externas').prop('disabled', false);
	    		$('.internas').prop('disabled', false);
	    	}
	    });
	    function inicio(){
		    $('.cobertura').prop('disabled', true);
		    $('.television').prop('disabled', true);
		    $('.prensa').prop('disabled', true);
			$('.fotografia').prop('disabled', true);
			$('.duplicados').prop('disabled', true);
			$('.copias').prop('disabled', true);
			$('.impresion').prop('disabled', true);
			$('.externas').prop('disabled', true);
			$('.internas').prop('disabled', true);
		}",
	    View::POS_READY,
	    'my-button-handler'
	);

	$formulario = ActiveForm::begin([
		'id' => 'agrega_evento',
		'method' => 'post',
		'enableClientValidation' => true,
		'enableAjaxValidation' => false,
		'options' => ['class' => 'form-horizontal'],
	]);
?>

<div class="site-agregar">
	<h1 class="text-center">Registrar solicitud de evento</h1>
	<?php if(isset($mensaje)){ ?>
	<h3 class="alert alert-success alert-dismissible"><?= $mensaje ?></h3>
	<?php }elseif (isset($mensaje_error)) { ?>
	<h3 class="alert alert-danger alert-dismissible"><?= $mensaje_error ?></h3>
	<?php } ?>

	<br>

	<!--Campos del formulario-->
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-10">
				<div class="form-group">
					<?= $formulario->field($model, 'nombre_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('text', ['placeholder' => 'Nombre del evento'])->label('Nombre del evento')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'coordinador_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('text', ['placeholder' => 'Coordinador del evento'])->label('Coodinador del evento')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'coordinador_operativo', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('text', ['placeholder' => 'Coordinador operativo del evento'])->label('Coordinador operativo')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'responsable_informacion', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('text', ['placeholder' => 'Responsable de proporcionar infomación'])->label('Responsable de proporcionar información')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'lugar_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('text', ['placeholder' => 'Lugar del evento'])->label('Lugar')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'fecha_inicio_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('date')->label('Fecha de incio')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'fecha_termino_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('date')->label('Fecha de término')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'hora_inicio_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('time')->label('Hora de inicio')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'hora_termino_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('time')->label('Hora de término')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'objetivo_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('text', ['placeholder' => 'Objetivo del evento'])->label('Objetivo del evento')?>
				</div>
				<div class="form-group">
					<?= $formulario->field($model, 'lema_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->input('text', ['placeholder' => 'Lema del evento'])->label('Lema')?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  	<div class="panel panel-primary">
			    	<div class="panel-heading" role="tab" id="headingOne">
			      		<h4 class="panel-title">
			        		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          			Anexo 1. Difusión del evento
			        		</a>
			      		</h4>
			    	</div>
			    	<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			      		<div class="panel-body">
			      			<div class="col-md-10" style="margin-left: 30px;">
				        		<div class="form-group">
									<div class="checkbox">
										<?= Html::checkbox('anexo1', false,['label' => 'Activar', 'id' => 'anexo1']) ?>
									</div>
								</div>
								<div class="form-group">
									<?php 
										$items = array('Entrevistas', 'Spots', 'Anuncions', 'Boletín de prensa');
										echo $formulario->field($model, 'difusion_evento', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox cobertura'])->label('Cobertura del evento');
									?>
								</div>
								<div class="form-group">
									<?php 
										$items = array('Canal 4', 'Televisión privada');
										echo $formulario->field($model, 'television', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox television'])->label('Televisón');
									?>
								</div>
								<div class="form-group">
									<?php 
										$items = array('Orbe', 'Diario del sur');
										echo $formulario->field($model, 'prensa', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox prensa'])->label('Prensa');
									?>
								</div>
								<div class="form-group">
									<?= $formulario->field($model, 'fotografia', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control fotografia']])->input('number', ['placeholder' => 'Cantidad'])->label('Cantidad de fotografías') ?>
								</div>

								<div class="form-group">
									<?php 
										$items = array('Diplomas', 'Constancias', 'Reconocimientos', 'Gafetes', 'Personificaciones', 'Trípticos', 'Invitaciones', 'Dípticos', 'Cartel', 'Avisos doble cara', 'Folders', 'Tarjetas', 'Avisos tamaño carta');
										echo $formulario->field($model, 'impresion_papeleria', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox impresion'])->label('Impresión de papelería');

										echo $formulario->field($model, 'duplicados', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control duplicados']])->input('number', ['placeholder' => 'Cantidad'])->label('Cantidad de duplucados');

										echo $formulario->field($model, 'copias', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control copias']])->input('number', ['placeholder' => 'Cantidad'])->label('Cantidad de copias');
									?>
								</div>

								<div class="form-group">
									<?php 
										$items = array('Autoridades educativas ferales', 'Autoridades educativas estatales', 'Autoridades educativas municipales', 'Presidente de colegios y asosiaciones', 'Empresarios', 'Directores de instituciones de prensa');
										echo $formulario->field($model, 'invitaciones_externas', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox externas'])->label('Invitaciones externas');
									?>
								</div>
								<div class="form-group">
									<?php 
										$items = array('Directivos docentes', 'Funcionarios docentes', 'Presidente de academia', 'Personal docente', 'Sindicato', 'Personal de apoyo y asistencia a la educación', 'Sociedad de alumnos');
										echo $formulario->field($model, 'invitaciones_internas', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox internas'])->label('Invitaciones internas');
									?>
								</div>
							</div>
			      		</div>
			    	</div>
			  	</div>
			  	<div class="panel panel-danger">
			    	<div class="panel-heading" role="tab" id="headingTwo">
			      		<h4 class="panel-title">
			        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          			Anexo 2. Protocolos
			        		</a>
			      		</h4>
			    	</div>
			    	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			      		<div class="panel-body">
			      			<div class="col-md-10" style="margin-left: 30px;">
				        		<div class="form-group">
									<div class="checkbox">
										<?= Html::checkbox('anexo2', false,['label' => 'Activar', 'id' => 'anexo1']) ?>
									</div>
								</div>
			        			<div class="form-group">
									<?= $formulario->field($model, 'fotografia', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textArea(['placeholder' => 'Leyenda para la lona'])->label('Leyenda para lona') ?>
								</div>
								<div class="form-group"><label>Necesidades</label></div>
								<div class="form-group">
									<?php 
										$items = array('Secretarias', 'Edecanes', 'Confirmación de presidium', 'Recepción de invitados', 'Registro de participantes / asistentes');
										echo $formulario->field($model, 'invitaciones_internas', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox'])->label('Recepción');
									?>
								</div>
								<div class="form-group">
									<?php 
										$items = array('Escoltas y banda de guerra', 'Director de himnos');
										echo $formulario->field($model, 'invitaciones_internas', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox'])->label('Honores a la bandera');
									?>
								</div>
								<div class="form-group">
									<?php 
										$items = array('Maestro de ceremonia', 'Elaboración de programa', 'Redacción de discursos Director', 'Reconocimientos/Diplomas/Constancias', 'Trofeos', 'Premios');
										echo $formulario->field($model, 'invitaciones_internas', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox'])->label('Centro de información');
									?>
								</div>
								<div class="form-group">
									<?php 
										$items = array('Agua', 'Vasos de cristal', 'Dulces', 'Servilletas', 'Café', 'Refrescos');
										echo $formulario->field($model, 'invitaciones_internas', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox'])->label('Atención al presidium');
									?>
								</div>
							</div>
			      		</div>
			    	</div>
			  	</div>
			  	<div class="panel panel-success">
			    	<div class="panel-heading" role="tab" id="headingThree">
			      		<h4 class="panel-title">
			        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          			Anexo 3. Recursos materiales
			        		</a>
			      		</h4>
			    	</div>
			    	<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      		<div class="panel-body">
			        		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			      		</div>
			    	</div>
			  	</div>
			  	<div class="panel panel-warning">
			    	<div class="panel-heading" role="tab" id="headingFour">
			      		<h4 class="panel-title">
			        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
			          			Anexo 4. Equipo audiovisual
			        		</a>
			      		</h4>
			    	</div>
			    	<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
			      		<div class="panel-body">
			        		<div class="col-md-10" style="margin-left: 30px;">
				        		<div class="form-group">
									<div class="checkbox">
										<?= Html::checkbox('anexo4', false,['label' => 'Activar', 'id' => 'anexo4']) ?>
									</div>
								</div>
			        			<div class="form-group">
									<?= $formulario->field($model, 'fotografia', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textArea(['placeholder' => 'Leyenda para la lona'])->label('Leyenda para lona') ?>
								</div>
								<div class="form-group"><label>Necesidades</label></div>
								<div class="form-group">
									<?php 
										$items = array('Proyector de acetatos', 'Cañón', 'Reproductor de CD o MP3', 'DVD', 'Videocasetera', 'Pantalla', 'Apuntador láser', 'Rotafolio');
										echo $formulario->field($model, 'invitaciones_internas', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox'])->label('Equipo audiovisual y de apoyo');
									?>
								</div>
								<div class="form-group">
									<?php 
										$items = array('Computadora', 'Laptop', 'Impresora', 'Cañón', 'Pantalla para cañón');
										echo $formulario->field($model, 'invitaciones_internas', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->dropdownList($items, ['class' => 'checkbox'])->label('Equipo de cómputo');
									?>
								</div>
							</div>
			      		</div>
			    	</div>
			  	</div>
			</div>
			<!--div class="form-group">
				<label for="anexo1">Anexo 1. Difusión del evento</label>
				<div class="checkbox">
					<?= Html::checkbox('anexo1', false,['label' => 'Activar', 'id' => 'anexo1']) ?>
				</div>
			</div>
			<div class="form-group">
				<?php 
					$items = array('Entrevistas', 'Spots', 'Anuncions', 'Boletín de prensa');
					echo $formulario->field($model, 'difusion_evento')->dropdownList($items, ['class' => 'checkbox cobertura'])->label('Cobertura del evento');
				?>
			</div>
			<div class="form-group">
				<?php 
					$items = array('Canal 4', 'Televisión privada');
					echo $formulario->field($model, 'television')->dropdownList($items, ['class' => 'checkbox television'])->label('Televisón');
				?>
			</div>
			<div class="form-group">
				<?php 
					$items = array('Orbe', 'Diario del sur');
					echo $formulario->field($model, 'prensa')->dropdownList($items, ['class' => 'checkbox prensa'])->label('Prensa');
				?>
			</div>
			<div class="form-group">
				<?= $formulario->field($model, 'fotografia')->input('number', ['class' => 'fotografia'])->label('Cantidad de fotografías') ?>
			</div>

			<div class="form-group">
				<?php 
					$items = array('Diplomas', 'Constancias', 'Reconocimientos', 'Gafetes', 'Personificaciones', 'Trípticos', 'Invitaciones', 'Dípticos', 'Cartel', 'Avisos doble cara', 'Folders', 'Tarjetas', 'Avisos tamaño carta');
					echo $formulario->field($model, 'impresion_papeleria')->dropdownList($items, ['class' => 'checkbox impresion'])->label('Impresión de papelería');

					echo $formulario->field($model, 'duplicados')->input('number', ['class' => 'duplicados'])->label('Cantidad de duplucados');
					echo $formulario->field($model, 'copias')->input('number', ['class' => 'copias'])->label('Cantidad de copias');
				?>
			</div>

			<div class="form-group">
				<?php 
					$items = array('Autoridades educativas ferales', 'Autoridades educativas estatales', 'Autoridades educativas municipales', 'Presidente de colegios y asosiaciones', 'Empresarios', 'Directores de instituciones de prensa');
					echo $formulario->field($model, 'invitaciones_externas')->dropdownList($items, ['class' => 'checkbox externas'])->label('Invitaciones externas');
				?>
			</div>
			<div class="form-group">
				<?php 
					$items = array('Directivos docentes', 'Funcionarios docentes', 'Presidente de academia', 'Personal docente', 'Sindicato', 'Personal de apoyo y asistencia a la educación', 'Sociedad de alumnos');
					echo $formulario->field($model, 'invitaciones_internas')->dropdownList($items, ['class' => 'checkbox internas'])->label('Invitaciones internas');
				?>
			</div-->
		</div>
	</div>
	<div class="row">
		<div class="form-group text-center">
			<?= Html::submitButton('Registrar solicitud', ['class' => 'btn btn-primary']) ?>
		</div>
	</div>
</div>

<!--
	
-->

<?php ActiveForm::end() ?>