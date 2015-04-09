<?php
function de_vgc_certificate($link, $rs, $url) {
    ob_start();

    $no_client = $rs->num_rows;
    $gender = array();
    foreach ($link->gender as $key => $value) {
    	$data = explode('|', $value);
    	$gender[$data[0]] = $data[1];
    }

    $k = 0;
?>
<div id="container-c" style="width: 1024px; height: auto; 
    border: 0px solid #0081C2; padding: 5px;">
    <div id="main-c" style="width: 1024px; font-weight: normal; font-size: 12px; 
        font-family: Arial, Helvetica, sans-serif; color: #000000;">
<?php while ($row = $rs->fetch_array(MYSQLI_ASSOC)): $k += 1; ?>
		<table cellpadding="0" cellspacing="0" border="0"
			style="width: 100%; height: auto; font-size: 80%; font-weight: normal; font-family: Arial;">
			<tr>
				<td style="width: 50%; padding: 5px;">
					<span style="font-weight: bold;">2.3 ASISTENCIA DE EDUCACION TELEFÓNICA</span>
					<br><br>

					<p style="text-align: justify; padding: 0; margin: 0;">
						UYAS se propone contribuir a la difusión y mejor compresión de las temáticas 
						economías y financieras, en el convencimiento de que estas deben incorporarse 
						como un ingrediente natural en la vida cotidiana de todos. Mediante este 
						servicio, UYAS ofrece asesoramiento financiero básico en forma telefónica. 
						El cliente podrá realizar consultas a un profesional en la materia, sobre: 
					</p>
					<br>
					
					<div style="padding-left: 30px;">
						Asusntos financieros <br>
						Noticias financieras <br>
						Leyes financieras <br>
						Reglamentos financieras <br>
						Herramientas y parámetros básicos para administrar su dinero y realizar 
							seguimiento de sus finanzas. <br>
						Mantenerse informado sobre asuntos financieros relacionados. <br>
						Como administrar su dinero. <br>
						Como planificar su presupuesto <br>
						Como planificar su ahorro <br>
						Como planificar sus gastos. <br>
						Claves en el proceso de toma de decisiones económicas. <br>
					</div>
					<br>
					
					<span style="font-weight: bold;">TERCERA: EXCLUSIONES</span>
					<br><br>
					No son objeto de la cobertura de asistencias, los siguientes servicios y hechos:
					<br><br>

					<div style="padding-left: 30px;">
						Los servicios que el ASEGURADO haya concertado por su cuenta sin previo 
							consentimiento de la empresa terciarizada, salvo caso de fuerza mayor que 
							le impida comunicarse con ésta. <br>
    					Los gastos de asistencia médica, hospitalaria o sanitaria. <br>
					</div>
					<br>

					<span style="font-weight: bold;">CUARTA: REQUISITOS PARA UTILIZAR EL SERVICIO</span>
					<br><br>

					<div style="padding-left: 30px;">						
					    Ser ASEGURADO de la Póliza <br>
					    Tener las primas pagadas en los plazos establecidos en el Condicionado 
					    	General y Particular de la Póliza. <br>
					</div>
					<br>

					La empresa que brindará la asistencia podrá solicitar información para validar 
						la identidad del usuario/ASEGURADO antes de otorgar el servicio de asistencia.
					<br><br>

					<span style="font-weight: bold;">QUINTA: RECLAMOS</span>
					<br><br>

					<p style="text-align: justify; padding: 0; margin: 0;">
						Nacional Vida Seguros de Personas S.A. canalizará, todos los reclamos que 
						se originen en el servicio brindado por la Empresa de Servicio de Asistencias 
						o por las empresas que éste contrate para brindar el servicio objeto de las 
						Asistencias Adicionales cubiertas por ésta Póliza, limitándose su 
						responsabilidad solamente a la canalización del reclamo, el asegurado tendrá 
						la facultad de iniciar o continuar acciones contra la empresa de asistencias 
						por mal servicio.
						<br><br>
						Todos los demás términos y condiciones de la Póliza no se modifican y 
						permanecen en pleno vigor.
					</p>
				</td>
				<td style="width: 50%; padding: 5px;" valign="top">
					<div style="height: 50px;">
						<img src="<?= $url ;?>images/<?= $row['cia_logo'] ;?>"
                            height="50" class="container-logo" align="left" />
					</div>

					<div style="font-weight: bold; text-align: right;">
						DECLARACION JURADA DE SALUD <br>
						SOLICITUD DE SEGURO DE VIDA EN GRUPO 
					</div>
					<br>
					Estimado Cliente, agradeceremos completar la información que se requiere a 
					continuación: (utilice letra clara)
					<br><br>

					<span style="font-weight: bold;">1. DATOS PERSONALES: (TITULAR)</span>
					<br><br>

					<table
		                cellpadding="0" cellspacing="0" border="0"
		                style="width: 100%; height: auto; font-size: 90%; font-weight: normal; 
		                	font-family: Arial;">
		                <tr>
		                	<td style="width: 100%; font-weight: bold; padding: 3px 0;" colspan="4">
		                		Nombres y Apellidos:
		                	</td>
		                </tr>
		                <tr>
		                	<td style="width: 100%; border-bottom: 1px solid #000; padding: 3px 0;" colspan="4">
		                		<?= $row['cl_nombre'] . ' ' . $row['cl_paterno'] . ' ' 
		                			. $row['cl_materno']  ;?>
		                	</td>
		                </tr>
		                <tr>
		                	<td style="width: 25%; padding: 3px 0;">Lugar y Fecha de Nacimiento: </td>
		                	<td style="width: 50%; border-bottom: 1px solid #000; padding: 3px 0;">
		                		<?= $row['cl_lugar_nacimiento'] . ' ' . $row['cl_fecha_nacimiento'] ;?>
		                	</td>
		                	<td style="width: 6%; padding: 3px 0;">Sexo:</td>
		                	<td style="width: 19%; border-bottom: 1px solid #000; padding: 3px 0;">
		                		<?= $gender[$row['cl_genero']] ;?>
		                	</td>
		                </tr>
					</table>
					<table
		                cellpadding="0" cellspacing="0" border="0"
		                style="width: 100%; height: auto; font-size: 90%; font-weight: normal; 
		                	font-family: Arial;">
		                <tr>
		                	<td style="width: 18%; padding: 3px 0;">Carnet de Identidad: </td>
		                	<td style="border-bottom: 1px solid #000; width: 25%; 
		                		padding: 3px 0;">
		                		<?= $row['cl_ci'] . $row['cl_complemento'] . ' ' 
		                			. $row['cl_extension'] ;?>
		                	</td>
		                	<td style="width: 6%; padding: 3px 0;">Edad: </td>
		                	<td style="border-bottom: 1px solid #000; width: 11%; padding: 3px 0;">
		                		<?= $row['cl_edad'] ;?>
		                	</td>
		                	<td style="width: 6%; padding: 3px 0;">Peso: </td>
		                	<td style="border-bottom: 1px solid #000; width: 12%; padding: 3px 0;">
		                		<?= $row['cl_peso'] ;?> kg.
		                	</td>
		                	<td style="width: 10%; padding: 3px 0;">Estatura: </td>
		                	<td style="border-bottom: 1px solid #000; width: 12%; padding: 3px 0;">
		                		<?= $row['cl_estatura'] ;?> cm.
		                	</td>
		                </tr>
              		</table>
              		<table
		                cellpadding="0" cellspacing="0" border="0"
		                style="width: 100%; height: auto; font-size: 90%; font-weight: normal; 
		                	font-family: Arial;">
		                <tr>
		                	<td style="width: 9%; padding: 3px 0;">Dirección: </td>
		                	<td style="border-bottom: 1px solid #000; width: 41%; padding: 3px 0;">
		                		<?= $row['cl_direccion'] . ' ' . $row['cl_localidad'] ;?>
		                	</td>
		                	<td style="width: 9%; padding: 3px 0;">Tel. Dom.: </td>
		                	<td style="border-bottom: 1px solid #000; width: 16%; padding: 3px 0;">
		                		<?= $row['cl_tel_domicilio'] ;?>
		                	</td>
		                	<td style="width: 8%; padding: 3px 0;">Tel. Of.: </td>
		                	<td style="border-bottom: 1px solid #000; width: 17%; padding: 3px 0;">
		                		<?= $row['cl_tel_oficina'] ;?>
		                	</td>
		                </tr>
		                <tr>
		                	<td style="width: 9%; padding: 3px 0;">Ocupación: </td>
		                	<td style="width: 91%; border-bottom: 1px solid #000; padding: 3px 0;" 
		                		colspan="5">
		                		<?= $row['cl_desc_ocupacion'] ;?>
		                	</td>
		                </tr>
              		</table>
              		<br>

              		<span style="font-weight: bold;">2. CUESTIONARIO</span>
					<br><br>

					<table
		                cellpadding="0" cellspacing="0" border="0"
		                style="width: 100%; height: auto; font-size: 90%; font-weight: normal; 
		                	font-family: Arial;">
	                	<?php
	                	$response = json_decode($row['vg_respuesta'], true);

	                	if (($rsq = $link->get_question($_SESSION['idEF'], 'VG')) !== false) {
	                		while ($rowq = $rsq->fetch_array(MYSQLI_ASSOC)) {
	                			if (array_key_exists($rowq['orden'], $response) === true) {
	                				switch ($response[$rowq['orden']]['value']) {
                					case 0:
                						$resp = array('X', '');
                						break;
                					case 1:
                						$resp = array('', 'X');
                						break;
	                				}
						?>
	                	<tr>
	                		<td style="width: 5%;">
	                			<?= $rowq['orden'] ;?>
	                		</td>
	                		<td style="width: 65%;">
	                			<?= $rowq['pregunta'] ;?>
	                		</td>
	                		<td style="width: 5%; text-align: right; padding-right: 3px;">SI</td>
	                		<td style="width: 5%; height: 6px; border: 1px solid #000;
	                			text-align: center;">
	                			<?= $resp[1] ;?>
	                		</td>
	                		<td style="width: 10%; text-align: right; padding-right: 3px;">NO</td>
	                		<td style="width: 5%; height: 6px; border: 1px solid #000;
	                			text-align: center;">
	                			<?= $resp[0] ;?>
	                		</td>
	                		<td style="width: 5%;"></td>
	                	</tr>
						<?php
	                			}
	                		}
	                	}
	                	?>
                	</table>
					<br>

					<p style="text-align: justify; margin: 0;">
						Declaro haber contestado con total veracidad, máxima buena fe a todas 
						las preguntas del presente cuestionario y no haber omitido u ocupado 
						hechos y/o circunstancias que hubiera podido influir en la celebración 
						del contrato de seguro. Las declaraciones de salud que hacen anulable 
						el Contrato de Seguros y en la que el asegurado pierde su derecho a 
						indemnización, se enmarcan en los artículos 992, 993, 999 y 1038 del 
						Código de Comercio.
						<br><br>
						 Relevo expresamente del secreto profesional y legal, a cualquier 
						 médico que me hubiese asistido y/o tratado de dolencias y le autorizo 
						 a revelar a Nacional Vida Seguros de Personas S.A. todos los datos y 
						 antecedentes patológicos que pudiera tener o de los que hubiera 
						 adquirido conocimiento al prestarme sus servicios. Entiendo que de 
						 presentarse alguna eventualidad contemplada bajo la póliza de seguro 
						 como consecuencia de alguna enfermedad existente a la fecha de la 
						 firma de este documento o cuando haya alcanzado la edad límite 
						 estipulada en la póliza, la compañía aseguradora quedará liberada 
						 de toda la responsabilidad en lo que respecta a mí seguro.
					</p>
					<br>

					<table
		                cellpadding="0" cellspacing="0" border="0"
		                style="width: 100%; height: auto; font-size: 90%; font-weight: normal; 
		                	font-family: Arial; margin-top: 40px;">
		                <tr>
		                	<td style="width: 14%;">Lugar y Fecha: </td>
		                	<td style="width: 36%; text-align: center; border-bottom: 1px solid #000;">
		                		<?= $row['user_depto'] . ' ' . $row['fecha_emision'] ;?>
		                	</td>
		                	<td style="width: 10%; text-align: right; padding-right: 3px;">Firma: </td>
		                	<td style="width: 40%; border-bottom: 1px solid #000;"></td>
		                </tr>
		                <tr>
		                	<td style="width: 60%;" colspan="3"></td>
		                	<td style="width: 40%; text-align: center;">ASEGURADO</td>
		                </tr>
                	</table>
				</td>
			</tr>
		</table>
		
		<page><div style="page-break-before: always;">&nbsp;</div></page>

		<table cellpadding="0" cellspacing="0" border="0"
			style="width: 100%; height: auto; font-size: 80%; font-weight: normal; font-family: Arial;">
			<tr>
				<td style="width: 50%; padding: 5px;">
					<div style="font-weight: bold; text-align: center;">
						CERTIFICADO INDIVIDUAL DE SEGURO Nº 88 <br>
						PÓLIZA DE SEGURO DE VIDA EN GRUPO <br>
						POL-VG-LP-00000181-2014-00 <br>
						(Formato aprobado de la S.P.V.S. mediante Resolución 
						Administrativa N° 081 del 10/03/00) <br>
						206-934601-2000 03 005-3004
					</div>
					<br>

					<p style="text-align: justify; margin: 0;">
						NACIONAL VIDA Seguros de Personas S.A., (denominada en adelante 
						“La Compañía"), por el presente CERTIFICADO INDIVIDUAL DE 
						SEGURO hace constar que JUAN PEREZ VELASCO (denominado en 
						adelante el “Asegurado”), está protegido por la Póliza de 
						Seguro de Vida en Grupo arriba mencionada y de acuerdo con 
						la misma está asegurado bajo las siguientes condiciones:
					</p>
					<br><br>

					<span style="font-weight: bold;">
						1. COBERTURAS VALORES ASEGURADOS
					</span>
					<br><br>

					<table
		                cellpadding="0" cellspacing="0" border="0"
		                style="width: 100%; height: auto; font-size: 90%; font-weight: normal; 
		                	font-family: Arial;">
		                <tr>
		                	<td style="width: 30%; text-align: center;">VIDA</td>
		                	<td style="width: 20%;"></td>
		                	<td style="width: 30%; text-align: center;">
		                		Bs. <?= number_format($row['vg_monto'], 2, '.', ',') ;?>
		                	</td>
		                	<td style="width: 20%;"></td>
		                </tr>
                	</table>
                	<br><br>

					<span style="font-weight: bold;">
						2. PAGO DE LAS INDEMNIZACIONES
					</span>
                	<br><br>

                	<p style="text-align: justify; margin: 0;">
                		La Compañía después de recibir prueba fehaciente sobre el 
                		fallecimiento del Asegurado, ocurrido mientras gozaba de 
                		protección bajo el presente seguro, pagará al Beneficiario 
                		la suma asegurada. <br>
                		Los pagos serán hechos por la Compañía por conducto del Contratante.
                	</p>
                	<br><br>
					
					<span style="font-weight: bold;">
						3. VIGENCIA
					</span>
                	<br><br>

                	<p style="text-align: justify; margin: 0;">
                		La cobertura del seguro inicia su vigencia el 29 de Diciembre 
                		de 2014 a hrs. 12:00:00 meridiano y concluirá de acuerdo a la 
                		vigencia original de la Póliza de Seguro de Vida en Grupo, en 
                		virtud de la cual se emite el presente Certificado Individual; 
                		de manera que al caducar aquella caducará automáticamente el 
                		presente Certificado.
                	</p>
                	<br><br>

					<span style="font-weight: bold;">
						4. CONTRATO PRINCIPAL (Póliza Maestra)
					</span>
                	<br><br>

                	<p style="text-align: justify; margin: 0;">
                		Todos los beneficios a los cuales el Asegurado tiene derecho, 
                		dependen de lo estipulado en la Póliza de Seguros de Vida en 
                		Grupo suscrita por el Contratante, la cual constituye el 
                		Contrato principal en virtud del cual se regula el seguro y 
                		se efectúan los pagos. El hecho de la posesión o el mero uso 
                		que el Asegurado o sus beneficiarios hagan de este Certificado, 
                		implica aceptación por ellos de todas las condiciones de la 
                		Póliza Maestra, tanto en lo que les beneficie como en lo que 
                		les afecte. <br><br>

                		En fe de lo cual se emite el presente Certificado y se da por 
                		aceptado tanto por el Asegurado como por el Contratante:
                		<br><br>
                		Fin de Vigencia:

                		<br><br>
                		NACIONAL VIDA SEGUROS DE PERSONAS S.A. <br>
                		<?= $row['user_depto'] ;?>, 
                		<?= date('d', strtotime($row['fecha_emision'])) ;?>
                		de
                		<?= date('m', strtotime($row['fecha_emision'])) ;?>
                		de
                		<?= date('Y', strtotime($row['fecha_emision'])) ;?>
                	</p>
                	<br><br>

                	<table
		                cellpadding="0" cellspacing="0" border="0"
		                style="width: 100%; height: auto; font-size: 90%; font-weight: normal; 
		                	font-family: Arial; margin-top: 60px;">
		                <tr>
		                	<td style="width: 30%;"></td>
		                	<td style="width: 40%; text-align: center;">
		                		FIRMAS AUTORIZADAS
		                	</td>
		                	<td style="width: 30%;"></td>
		                </tr>
		                <tr>
		                	<td style="width: 30%;"></td>
		                	<td style="width: 40%; border-bottom: 1px solid #000; height: 50px;"></td>
		                	<td style="width: 30%;"></td>
		                </tr>
		                <tr>
		                	<td style="width: 30%;"></td>
		                	<td style="width: 40%; text-align: center;">ASEGURADO</td>
		                	<td style="width: 30%;"></td>
		                </tr>
	               	</table>                	
				</td>
				<td style="width: 50%; padding: 5px;">
					<div style="font-weight: bold; text-align: center;">
						ASISTENCIAS ADICIONALES <br>
						“SEGURO POL-VG-LP-00000181-2014-00” <br>
						Registrada en Autoridad de Fiscalización y Control de 
							Pensiones y Seguros (APS) mediante <br>
						Resolución Administrativa APS/DS/N°_______ con Código 
							de Registro N° __________________ <br>
						Forma parte integrante de la Póliza registrada en la 
							APS bajo el Registro N° __________________ 
					</div>
					<br>

                	<p style="text-align: justify; margin: 0;">
                		Se acuerda y establece, no obstante lo estipulado en las 
                		Condiciones Generales de la Cobertura Principal de la Póliza, 
                		que las Asistencias Adicionales se rigen por lo establecido en 
                		el presente texto, de acuerdo a lo siguiente:
                	</p>
                	<br>
					
					<span style="font-weight: bold;">
						PRIMERA: DEFINICIONES
					</span>
					<br><br>

                	<p style="text-align: justify; margin: 0;">
                		Empresa de Servicio de Asistencias: 
                		<span style="font-weight: bold;"><?= $row['cia_nombre'] ;?></span> 
                		podrá terciarizar el servicio de asistencias 
                		mediante una empresa que brinde o intermedie este servicio. <br>
                		Servicio: Conjunto de actividades que buscan responder a 
                		las necesidades de la gente. <br>
                		Usuario: El usuario de este servicio de asistencias además 
                		del ASEGURADO es su cónyuge, sus descendientes en primer 
                		grado y su BENEFICIARIO.
                	</p>
					<br>
					
					<span style="font-weight: bold;">
						SEGUNDA: DESCRIPCIÓN Y ALCANCE
					</span>
					<br><br>
					
                	<p style="text-align: justify; margin: 0;">
						El ASEGURADO, su cónyuge y los descendientes en primer grado, 
						podrán ser beneficiados con las asistencias que se detallan 
						en el presente documento, comunicándose al número de 
						teléfono 901-11-2255 a costo del usuario/ASEGURADO.
                	</p>
                	<br>

					<span style="font-weight: bold;">
						2.1 ASISTENCIA LEGAL TELEFONICA
					</span>
					<br><br>
                	
                	<p style="text-align: justify; margin: 0;">
						<span style="font-weight: bold;">
							Asistencia legal telefónica en todas las áreas:
						</span>
						Se brindará a los usuarios/ASEGURADOS de la presente Póliza 
						un servicio de asistencia legal telefónica en relación a 
						cualquier cuestión legal, civil, penal, fiscal, 
						administrativa, mercantil, laboral u otras que se le pudiera presentar.
						<br>
						La consulta será atendida por uno de los abogados designados 
						por la empresa terciarizada que brindará la asistencia y se 
						limitará a la orientación verbal respecto a la consulta planteada, 
						sin emitir dictamen por escrito sobre la misma.
                	</p>
                	<br>
					
					<p>
						<span style="text-decoration: underline;">
							Límite de eventos a cubrir: 
						</span>
						Por el servicio de asistencia legal telefónica se cubrirán 
						hasta 2 eventos por año calendario para accidentes de transito. 
						Para consultas de otros temas el servicio es ilimitado
					</p>
					<br>

					<span style="font-weight: bold;">
						2.2 ASISTENCIA MEDIPHONE
					</span>
					<br><br>
					
					<p>
						Información Sanitaria: Se pondrá a disposición del 
						usuario/ASEGURADO la información precisa, mediante los 
						distintos tipos de servicios que se detallan.
						<br><br>

						Los servicios se prestarán de acuerdo con las condiciones 
						que se establecen a continuación:
						<br><br>

						<span style="font-weight: bold;">
							Consejo Médico Telefónico
						</span>
						<br><br>

						En caso de necesidad, el ASEGURADO podrá efectuar una consulta 
						médica telefónica relacionada con cuadros patológicos durante 
						las 24 horas del día los 365 días del año. Esta información 
						médica podrá versar sobre los siguientes aspectos:
						<br><br>

					    <div style="padding-left: 20px;">
					    	Procedimientos a seguir en determinadas patologías. <br>
						    Centros médicos donde acudir para un tratamiento ambulatorio. <br>
						    Consejos ante emergencias médicas. <br>
						    Información sobre medicamentos y prescripciones. <br>
						    Medicina preventiva <br>
						    Consejos de salud. <br>
					    </div>
					</p>
				</td>
			</tr>
		</table>
		<?php if ($k < $no_client): ?>
		<page><div style="page-break-before: always;">&nbsp;</div></page>
		<?php endif ?>
<?php endwhile ?>
    </div>
</div>
<?php
    $html = ob_get_clean();
    return $html;
}
?>