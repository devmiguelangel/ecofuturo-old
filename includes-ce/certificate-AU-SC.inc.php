<?php
function au_sc_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
	$conexion = $link;
			
	ob_start();
?>
<div id="container-c" style="width: 785px; height: auto; 
    border: 0px solid #0081C2; padding: 5px;">
	<div id="main-c" style="width: 775px; font-weight: normal; font-size: 12px; 
        font-family: Arial, Helvetica, sans-serif; color: #000000;">
   
     <table 
         cellpadding="0" cellspacing="0" border="0" 
         style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
         <tr>
           <td style="width:34%;">
              <img src="<?=$url;?>images/<?=$row['logo_ef'];?>" height="60"/>
           </td>
           <td style="width:32%;"></td>
           <td style="width:34%; text-align:right;">
              <img src="<?=$url;?>images/<?=$row['logo_cia'];?>" height="60"/>
           </td>
         </tr>
         <tr><td colspan="3" style="width:100%;">&nbsp;</td></tr>
         <tr>
           <td style="width:34%;">SLIP DE COTIZACIÓN<br/>Cotizacion No <?=$row['no_cotizacion'];?></td>
           <td style="width:32%;"></td> 
           <td style="width:34%; text-align:right;">
<?php
		      $fecha_registro = $row['fecha_creacion'];
			  $num_limit = $row['limite_cotizacion'];
		      $fecha_valido = date("d-m-Y", strtotime("$fecha_registro +$num_limit day"));
              echo'Cotización válida hasta el: '.$fecha_valido;
?>	
           </td>
         </tr>
     </table><br/>
     <span style="font-weight:bold; font-size:80%;">Datos del Titular:</span><br>

    <table 
        cellpadding="0" cellspacing="0" border="0" 
        style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
         <tr style="font-weight:bold;">
           <td style="width:33%; text-align:center; font-weight:bold;">Apellido Paterno</td>
           <td style="width:33%; text-align:center; font-weight:bold;">Apellido Materno</td>
           <td style="width:34%; text-align:center; font-weight:bold;">Nombres</td>
         </tr>
         <tr>
           <td style="width:33%; text-align:center;"><?=$row['paterno'];?></td>
           <td style="width:33%; text-align:center;"><?=$row['materno'];?></td>
           <td style="width:34%; text-align:center;"><?=$row['nombre'];?></td>
         </tr>
          <tr style="font-weight:bold;">
           <td style="width:33%; text-align:center; font-weight:bold;">Documento de Identidad</td>
           <td style="width:33%; text-align:center; font-weight:bold;">Genero</td>
           <td style="width:34%; text-align:center; font-weight:bold;">Fecha de Nacimiento</td>
         </tr>
         <tr>
           <td style="width:33%; text-align:center;"><?=$row['ci'];?></td>
           <td style="width:33%; text-align:center;"><?=$row['genero'];?></td>
           <td style="width:34%; text-align:center;"><?=$row['fecha_nacimiento'];?></td>
         </tr>
         <tr style="font-weight:bold;">
           <td style="width:33%; text-align:center; font-weight:bold;">Telefono Domicilio</td>
           <td style="width:33%; text-align:center; font-weight:bold;">Telefono Celular</td>
           <td style="width:34%; text-align:center; font-weight:bold;">&nbsp;</td>
         </tr>
         <tr>
           <td style="width:33%; text-align:center;"><?=$row['telefono_domicilio'];?></td>
           <td style="width:33%; text-align:center;"><?=$row['telefono_celular'];?></td>
           <td style="width:34%; text-align:center;">&nbsp;</td>
         </tr>
      </table><br/>		
     
     <span style="font-weight:bold; font-size:80%;">Datos de Solicitud:</span><br>
<?php
       if($row['prima_total']!=0){
		  $prima_total=$row['prima_total']; 
	   }else{
		  if($rsDt->data_seek(0)){ 
			  $prima_total = 0; 
			  while($regi = $rsDt->fetch_array(MYSQLI_ASSOC)){
					  $year = $conexion->get_year_final($row['plz_anio'], $row['tip_plz_code']);
					  $tasaf = $conexion->get_tasa_year_au(base64_encode($row['id_compania']), base64_encode($row['idef']), $regi['category'], $year, $row['frm_pago_code']);
					  $tf_prima = $conexion->get_prima_au($row['plz_anio'],$row['tip_plz_code'],$regi['valor_asegurado'],$tasaf['t_tasa_final'],$year);
					  
					  //$prima_vehiculo = ($tasanual['t_tasa_final']*$regi['valor_asegurado'])/100;
					  $prima_total = $prima_total+$tf_prima;
					  
			  }  
		  }
	   }
?>
     <table 
        cellpadding="0" cellspacing="0" border="0" 
        style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
         <tr>
           <td style="width:50%; text-align:right;"><b>Compañía de Seguros:</b></td>
           <td style="width:50%;"><?=$row['compania'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Seguro a contratar:</b></td>
           <td style="width:50%;">Automotores</td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Periodo de contratacion:</b></td>
           <td style="width:50%;"><?=$row['tipo_plazo'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Prima anual:</b></td>
           <td style="width:50%;"><?=number_format($prima_total,2,".",",");?> USD</td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Prima total:</b></td>
           <td style="width:50%;"><?=number_format(($prima_total*$row['cant_plazo']),2,".",",");?> USD</td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Inicio de vigencia:</b></td>
           <td style="width:50%;"><?=$row['ini_vigencia'];?></td>
         </tr>
         <tr>
           <td style="width:50%; text-align:right;"><b>Fin de vigencia:</b></td>
           <td style="width:50%;"><?=$row['fin_vigencia'];?></td>
         </tr>
      </table><br/>
      
      <span style="font-weight:bold; font-size:80%;">Datos de Vehiculo:</span><br>
        <table 
           cellpadding="0" cellspacing="0" border="0" 
           style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <tr>
            <td style="width:10%; text-align:center;"><b>Tipo de vehiculo</b></td>
            <td style="width:10%; text-align:center;"><b>Marca</b></td>
            <td style="width:10%; text-align:center;"><b>Modelo</b></td>
            <td style="width:10%; text-align:center;"><b>Cero km.</b></td>
            <td style="width:10%; text-align:center;"><b>Año</b></td>
            <td style="width:10%; text-align:center;"><b>Placa</b></td>
            <td style="width:10%; text-align:center;"><b>Categoria</b></td>
            <td style="width:10%; text-align:center;"><b>Valor Asegurado</b></td>
            <td style="width:10%; text-align:center;"><b>Tasa anual</b></td>
            <td style="width:10%; text-align:center;"><b>Prima</b></td>
            </tr>
<?php
			  if($rsDt->data_seek(0)){
				  $sum_facu=0;
				  while($rowDt = $rsDt->fetch_array(MYSQLI_ASSOC)){
					  $year = $conexion->get_year_final($row['plz_anio'], $row['tip_plz_code']);
					  $tasaf = $conexion->get_tasa_year_au(base64_encode($row['id_compania']), base64_encode($row['idef']), $rowDt['category'], $year, $row['frm_pago_code']);
					  $tf_prima = $conexion->get_prima_au($row['plz_anio'],$row['tip_plz_code'],$rowDt['valor_asegurado'],$tasaf['t_tasa_final'],$year);
					  //$prima_vehiculo=($tasa_anual['t_tasa_final']*$rowDt['valor_asegurado'])/100;
					  if($rowDt['facultativo']==1){$sum_facu++;}
?>
                      <tr>
                      <td style="width:10%; text-align:center;"><?=$rowDt['vehiculo'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['marca'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['modelo'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['km'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['anio'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['placa'];?></td>
                      <td style="width:10%; text-align:center;"><?=$rowDt['categoria'];?></td>
                      <td style="width:10%; text-align:center;"><?=number_format($rowDt['valor_asegurado'],2,".",",");?></td>
                      <td style="width:10%; text-align:center;"><?=$tasaf['t_tasa_final'];?></td>
                      <td style="width:10%; text-align:center;"><?=number_format($tf_prima,2,".",",");?></td>
                      </tr> 
<?php
			      }
			  }
?>
        </table>
        <span style="font-weight: normal; font-size:80%;">
          <i>&bull; Todos los montos se encuentran expresados en d&oacute;lares americanos</i>
        </span><br/>
<?php
        if($sum_facu>0){
?>	
           <div style="font-size:8pt; text-align:justify; margin-top:5px; margin-bottom:0px; border:1px solid #C68A8A; background:#FFEBEA; padding:8px;">
                  La presente cotizaci&oacute;n referencial contiene uno o mas veh&iacute;culos cuya antig&uuml;edad supera los <?=$row['anio_max'];?> a&ntilde;os o cuyo monto supera el maximo valor permitido <?=number_format($row['monto_facultativo'],2,".",",");?> USD, por lo tanto la aseguradora se reserva el derecho de solicitar inspecci&oacute;n, adicion de medidas de seguridad, solicitud de reaseguro y otros.
           </div><br/>
<?php
		}
?>
        <span style="font-weight: bold; font-size:80%;">Forma de Pago</span><br>
        <?php
           $sqlCia = 'select 
						sac.id_cotizacion as idc,
						sef.id_ef as idef,
						scia.id_compania as idcia,
						scia.nombre as cia_nombre,
						scia.logo as cia_logo,
						sfp.id_forma_pago,
						sac.plazo as c_plazo,
						sac.tipo_plazo as c_tipo_plazo,
						sac.certificado_provisional as cp
					from
						s_au_cot_cabecera as sac
							inner join
						s_entidad_financiera as sef ON (sef.id_ef = sac.id_ef)
							inner join
						s_ef_compania as sec ON (sec.id_ef = sef.id_ef)
							inner join
						s_compania as scia ON (scia.id_compania = sec.id_compania)
							inner join
						s_forma_pago as sfp ON (sfp.id_forma_pago = sac.id_forma_pago)
					where
						sac.id_cotizacion = "'.$row['id_cotizacion'].'"
							and sef.id_ef = "'.$row['idef'].'"
							and sef.activado = true
							and scia.id_compania = "'.$row['id_compania'].'"
							and sec.producto = "AU"
							and scia.activado = true
					order by scia.id_compania asc;';
		   $rsfp = $conexion->query($sqlCia, MYSQLI_STORE_RESULT);
		   $rowfp = $rsfp->fetch_array(MYSQLI_ASSOC);
		   $rsfp->free();
		   
		   $arr_share = array();
		   if($row['frm_pago_code']=='CO'){
		       $year = 1;
			   $cuota = $prima_total*$row['cant_plazo'];
		   }else{
			   $year = $conexion->get_year_final($rowfp['c_plazo'], $rowfp['c_tipo_plazo']);
			   $cuota = $prima_total;
		   }
		   $primaT = 0;
		   $tasaT = 0;
			
		   $date_begin = date('d-m-Y', strtotime(date('15-m-Y'). '+ 1 month'));
		   $percent = number_format((100 / $year), 4, '.', ',');
		   $date_payment = '';
			
		   for($i = 0; $i < $year; $i++){
				$date_payment = date('d/m/Y', strtotime($date_begin. '+ '.$i.' year'));
				$arr_share[] = ($i + 1).'|'.$date_payment.'|'.$percent;
		   }			
		   		  
		   echo'<table 
                 cellpadding="0" cellspacing="0" border="0" 
                 style="width: 90%; height: auto; font-size: 80%; font-family: Arial;" align="center">
		         <tr>
				  <td style="width:30%; text-align:center;"><b>Año</b></td>
				  <td style="width:30%; text-align:center;"><b>Fecha de Pago</b></td>
				  <td style="width:30%; text-align:center;"><b>Cuota</b></td>
				 </tr>';
		   foreach ($arr_share as $valor) {
			   $vec=explode('|',$valor);
			   echo'<tr>
					  <td style="width:30%; text-align:center;">'.$vec[0].'</td>
					  <td style="width:30%; text-align:center;">'.$vec[1].'</td>
					  <td style="width:30%; text-align:center;">'.number_format($cuota,2,".",",").'</td>
					</tr>';
		   }
		   echo'</table><br/>';
		?>
      
       <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <tr> 
              <td style="width:100%; font-size:100%; text-align: justify; padding:5px; 
                border:0px solid #333;" valign="top">
                <b>COBERTURAS</b><br>
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Responsabilidad Civil Hasta $us 10.000.00</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Pérdida Total por Robo al 100% hasta los valores asegurados establecidos para cada ítem, entendiéndose que robo incluye desaparición misteriosa, atraco y otros que signifiquen desaparición del o los vehículos asegurados</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Pérdida Total por Accidente al 100%</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Daños Propios para vehículos livianos (Categoría A)con franquicia de: $us. 50.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Daños propios para  vehículos pesado con franquicia de $us 150  (minibuses, furgonetas, microbuses, flotas, buses, camiones tractocamiones, volquetas, chatas, acoplados y otros – Categoría B)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Huelgas, Conmociones Civiles, Daños Maliciosos, Vandalismo y Sabotaje y Terrorismo para vehículos livianos con franquicia de $us50.(Vehículos Categoría A)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Huelgas, Conmociones Civiles, Daños Maliciosos, Vandalismo y Sabotabje y 
                      Terrorismo para vehículos pesados con franquicia de $us150.(Vehículos Categoría B)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Robo Parcial de partes y piezas al 80% (incluyendo accesorios declarados), 
                      Solo aplica a Vehiculos Livianos (Categoría A).</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Responsabilidad Civil Consecuencial Hasta $us. 3.000.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Cobertura por incendio, Rayo y/o Explosión, caída de rayo, sin la aplicación 
                      de franquicia.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Accesorios hasta su valor declarado sin ninguna limitación</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Daños causados por intento de robo al 80% con pago de franquiciabajo la 
                      cobertura de Daño Malicioso</td>
                    </tr>
                </table><br>
                <b>COBERTURAS ADICIONALES</b><br> 
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Extraterritorialidad gratuita por toda la vigencia de la póliza, sin 
                      comunicación previa a la compañía  y aplicable a todas las coberturas</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Servicio de Asistencia Jurídica incluyendo:<br> 
                        &omicron; Asistencia de audiencias de Tránsito<br>
                        &omicron; Preparación y presentación de memoriales<br>
                        &omicron; Asistencia a audiencias de Conciliación<br>
                        &omicron; Gastos y costas judiciales (por acción civil)<br>
                        &omicron; Presentación de fianzas judiciales (por acción civil)
                      </td>
                    </tr>
                    <tr>
                    <td colspan="2" style="width:100%;">
                      ASISTENCIA AL VEHÍCULO 	LAS 24 HORAS Y DURANTE TODA LA VIGENCIA DENTRO DE TODO EL TERRITORIO BOLIVIANO EXCEPTO PANDO (para vehículos pesados o de Categoría B, el servicio de auxilio mecánico y/o de remolque por falla mecánica, se encuentra sujeto a reembolso y hasta un máximo de US$ 250 por evento y en el agregado)
                    </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Remolque o transporte del vehículo en caso de accidente hasta el 5% del valor
                       del asegurado</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Desplazamiento por la inmovilización y/o robo del vehículo en caso que los 
                      beneficiarios e encuentren a más de 25km. de su domicilio</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Depósito y custodia del vehículo en caso de accidente, avería mecánica o robo
                       hasta un límite de $us. 20.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Servicio de conductor profesional en caso de accidente o fallecimiento del 
                      asegurado en caso de imposibilidad de conducir.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Para avería mecánica, Localización y envío de piezas de recambio necesarias 
                      para la reparación cuando no fuera posible su obtención.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Transmisión de mensajes urgente.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Línea de emergencia gratuita 24 hrs. /365 días </td>
                    </tr>
                </table><br>
                <b>CLAUSULAS ADICIONALES</b><br>
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Ausencia de control para vehículos pertenecientes a empresasy que conducidos por funcionarios dependientes</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Rehabilitación Automática de la Suma Asegurada </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De prorrata en caso de rescisión del contrato por parte del Asegurado, sujeto a no siniestralidad</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Eliminación de la Copia Legalizada de Tránsito para la Póliza excepto en casos de Responsabilidad Civil y Pérdida Total para casos menores  a $us. 1.000.-</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De daños a consecuencia de la naturaleza.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Ampliación de Aviso de Siniestro a15 Días .</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De  elegibilidad de Ajustadores</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Tránsito en Vías no autorizadas.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De inclusiones y exclusiones a prorrata</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De Flete Aéreo y/o expreso, y/o Courier (Overnight) hasta 4us. 5.000.-sin 
                      aplicación de franquicia.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De elegibilidad de talleres.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Cobertura para bolsas de aire por daños a consecuencia de accidente de tránsito, robo y/o intento de robo sin ninguna limitación.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De errores u omisiones en la descripción de las características de la Materia Asegurada. </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De ampliación de vigencia a prorrata hasta 90 días sin modificación de términos, condiciones, tasas y primas pactadas en el contrato inicial. </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De cobertura para eventos cuando el conductor del vehículo asegurado cuente con licencia de conducir, pero al momento de la ocurrencia del evento no la porte (un evento al año). </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De piezas y partes genuinas. Para vehículos importados</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">De siniestros a consecuencia de Pérdida Total por accidente y/o robo a vehículos cuya antigüedad no exceda el primer año o los 10.000 KM de recorrido, se deberá considerar como valor de indemnización, el valor de compra de un vehículo cero kilómetros, descontando la parte impositiva</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Se deja sin efecto la presentación del Test de Alcoholemia para accidentes ocurridos en el área rural  o pueblos alejados de las ciudades principales. En su reemplazo la Aseguradora aceptará la presentación del informe de la autoridad competente de la localidad  en la que haya ocurrido el siniestro o localidades más cercanas.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Si aplicará una depreciación automática del 10% por año al momento de la indemnización en caso de pérdida total, para las pólizas de vigencia mayor a un año.  Se aclara que la tasa aplicada para el pago de prima por periodos mayores a un año cuenta con un descuento por la depreciación anual del 10% que tendrá el vehículo.</td>
                    </tr>
                </table><br>
                <b>CONDICIONES ESPECIALES</b><br>
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">El valor asegurado corresponderá al valor comercial.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Para todo certificado emitido para vehículos cero kilómetros deberá adjuntarse únicamente la nota de entrega o factura de compra de la casa de venta.</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">La cobertura de robo total contratada, se extenderá a cubrir los daños y/o perdidas parciales ocurridas como consecuencia del robo total perpetrado, en la eventualidad de haberse logrado el recupero del vehículo dentro de los 45 días. </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">El presente seguro se extiende a cubrir todos los daños y/o pérdidas que sufran los vehículos asegurados como consecuencia de cualquier servicio adicional que preste la compañía de seguros (instalaciones, auxilio mecánico, grúa, rastreo). </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">&bull;</td>
                      <td style="width:98%;">Aceptación del riesgo al que están expuestos los bienes, en función a las actividades que desarrolla el Contratante. </td>
                    </tr>
                </table><br>
                <b>NOTAS ESPECIALES</b><br>
                EL ASEGURADO AUTORIZA A LA COMPAÑÍA DE SEGUROS A ENVIAR EL REPORTE A LA CENTRAL DE RIESGOS DEL MERCADO DE SEGUROS ACORDE A LAS NORMATIVAS REGLAMENTARIAS DE LA AUTORIDAD DE FISCALIZACIÓN Y CONTROL DE PENSIONES Y SEGUROS – APS.                 
              </td> 
       	    </tr>
       </table>     
    </div>
</div>
<?php
	$html = ob_get_clean();
	return $html;
}
?>