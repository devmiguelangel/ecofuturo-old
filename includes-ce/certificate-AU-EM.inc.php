<?php
function au_em_certificate($link, $row, $rsDt, $url, $implant, $fac, $reason = '') {
	$use_vehicle = $link->use;
	$traction = $link->traction;
	
	$nUse = count($use_vehicle);
	$nTraction = count($traction);
	
	$respUse = array();	$respTraction = array(); 
	
	if ((boolean)$row['tipo_cliente'] === true) {
		$row['cl_paterno'] = $row['cl_razon_social'];
	}
	ob_start();
?>
<div id="container-c" style="width: 785px; height: auto; 
    border: 0px solid #0081C2; padding: 5px;">
		<div id="main-c" style="width: 775px; font-weight: normal; font-size: 12px; 
        font-family: Arial, Helvetica, sans-serif; color: #000000;">
<?php
	if ($rsDt->data_seek(0) === true) {
		while ($rowDt = $rsDt->fetch_array(MYSQLI_ASSOC)) {
						
			for ($k = 0; $k < $nUse; $k++) {
				$_use_vehicle = explode('|', $use_vehicle[$k]);
				if ($_use_vehicle[0] === $rowDt['uso_vehiculo']) {
					$respUse[$k] = 'X';
				} else {
					$respUse[$k] = '&nbsp;';
				}
			}
			
			for ($k = 0; $k < $nTraction; $k++) {
				$_traction = explode('|', $traction[$k]);
				if ($_traction[0] === $rowDt['traccion']) {
					$respTraction[$k] = 'X';
				} else {
					$respTraction[$k] = '&nbsp;';
				}
			}
?>
		<table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-family: Arial;">
        	<tr>
            	<td style="width:100%;" align="left" valign="top" colspan="3">
                	<img src="<?=$url;?>images/<?=$row['logo_cia'];?>" width="170" class="container-logo" align="left" />
                </td>
            </tr>
            <tr>
            	<td style="width:26%;" align="left" valign="top">&nbsp;
                	
                </td>
                <td style="width:48%; font-weight:bold; text-align:center; font-size: 70%;">
                    
                	 Oficina Principal Calacoto Calle Julio Patiño No. 550 esq. Calle 12<br>
                     Central Piloto (2)2775550 Fax (591-02)2203917<br>
                     e-mail: credinform@credinformsa.com<br><br>
                     NOTA DE COBERTURA INDIVIDUAL<br>
                     P&Oacute;LIZA DE SEGURO AUTOMOTORES                       
                    
                </td>
                <td style="width:26%;" align="right" valign="top">&nbsp;
                	
				</td>
            </tr>
            <tr>
            	<td colspan="3" style="width:100%;">
                	<table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 70%;">
                      <tr>
                        <td style="width:20%; font-weight:bold; text-align:right;">P&Oacute;LIZA No.</td>
                        <td style="width:20%;">
                           <div style="border: 1px solid #999; width:125px;"><?=$row['no_poliza'];?></div>
                        </td>
                        <td style="width:20%;">&nbsp;</td>
                        <td style="width:14%; font-weight:bold; text-align:right;">CERTIFICADO No.</td>
                        <td style="width:26%;">
                           <div style="border: 1px solid #999; width:125px;"><?=$row['no_emision'];?></div>
                        </td>
                      </tr>
                    </table>
                </td>
            </tr>
        </table>
		<br>
                        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:10%;">Nombres: </td>
                <td style="width:25%; text-align:center;"><?=$row['cl_paterno'];?></td>
                <td style="width:22%; text-align:center;"><?=$row['cl_materno'];?></td>
                <td style="width:22%; text-align:center;"><?=$row['cl_nombre'];?></td>
                <td style="width:21%; text-align:center;"><?=$row['cl_ap_casada'];?></td>
            </tr>
            <tr>
            	<td style="width:10%;"></td>
                <td style="width:25%; border-top:1px solid #999; text-align:center;">Apellido Paterno</td>
                <td style="width:22%; border-top:1px solid #999; text-align:center;">Apellido Materno</td>
                <td style="width:22%; border-top:1px solid #999; text-align:center;">Nombres</td>
                <td style="width:21%; border-top:1px solid #999; text-align:center;">Apellido de Casada</td>
            </tr>
		</table>
		<br />
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:10%;">Direcci&oacute;n: </td>
                <td style="width:35%; text-align:center;"><?=$row['cl_avc'].' - '.$row['cl_direccion'];?></td>
                <td style="width:12%; text-align:center;"><?=$row['cl_no_domicilio'];?></td>
                <td style="width:24%; text-align:center;"><?=$row['cl_localidad'];?></td>
                <td style="width:19%;">&nbsp;</td>
            </tr>
            <tr>
            	<td style="width:10%;">&nbsp;</td>
                <td style="width:32%; border-top:1px solid #999; text-align:center;">Av. o Calle</td>
                <td style="width:12%; border-top:1px solid #999; text-align:center;">N&uacute;mero</td>
                <td style="width:24%; border-top:1px solid #999; text-align:center;">Ciudad o Localidad</td>
                <td style="width:22%;">&nbsp;</td>
            </tr>
		</table>
		<br />
        
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:10%;">Tel&eacute;fono: </td>
                <td style="width:20%; text-align:center;"><?=$row['cl_tel_domicilio'];?></td>
                <td style="width:20%; text-align:center;"><?=$row['cl_tel_oficina'];?></td>
                <td style="width:20%; text-align:center;"><?=$row['cl_tel_celular'];?></td>
                <td style="width:30%; text-align:center;"></td>
            </tr>
            <tr>
            	<td style="width:10%;"></td>
                <td style="width:20%; border-top:1px solid #999; text-align:center;">Domicilio</td>
                <td style="width:20%; border-top:1px solid #999; text-align:center;">Oficina</td>
                <td style="width:20%; border-top:1px solid #999; text-align:center;">Celular</td>
                <td style="width:30%; text-align:center;"></td>
            </tr>
		</table>
		<br/>

		<span style="font-weight:bold; font-size:80%;">1. Datos del Vehículo:</span><br>
<?php
          $cols = 5;//NUMERO DE COLUMNAS
		  $select_Tvh="select
					id_tipo_vh,
					id_ef,
					vehiculo
				  from
					s_au_tipo_vehiculo
				  where
					id_ef='".$row['idef']."';";
		  $consult_Tvh = $link->query($select_Tvh,MYSQLI_STORE_RESULT);
		  $num_reg = $consult_Tvh->num_rows;//SACAMOS NUMERO DE REGISTROS
		  $num_result = (round(($num_reg/$cols),0,PHP_ROUND_HALF_UP));
		  if((int)($num_result*$cols)>=$num_reg){//SACAMOS NUMERO DE FILAS
			 $rows = $num_result;//NUMERO DE FILAS
		  }else{
			 $rows = $num_result+1;//NUMERO DE FILAS 
		  }
		  $cell_number = (int)($rows*$cols);//CANTIDAD DE CELDAS
		  $data = array(); $i = 1;
		  while(($row_tvh = $consult_Tvh->fetch_array(MYSQLI_ASSOC)) || ($i<=$cell_number)){
			  if($row_tvh['id_tipo_vh']!==''){
			     $data[$i] = $row_tvh['id_tipo_vh'].'|'.$row_tvh['vehiculo'];
			  }else{
				 $data[$i] = '';  
			  }
			  $i++;
		  }				  
?>
                                 
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:2%;"></td>
                <td style="width:15%; text-align:left;">Tipo del vehículo:</td>
                <td style="width:83%;">
                  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size: 100%;">
<?php
                    $fl=1; $ind=1;
					while($fl<=$rows){
?>                  
                        <tr>
<?php
                        $cl=1;
                        while($cl<=$cols){
							
						   if($data[$ind] !== ''){	 
							   $arr_vh = explode('|',$data[$ind]);
							   $id_tipo_vh = $arr_vh[0];
							   $vehiculo = $arr_vh[1];
	?>                         
								<td style="width:20%; text-align:left;">
									<table border="0" cellpadding="0" cellspacing="0" style="width:100%; margin-bottom:5px; 
										font-size: 100%;">
										<tr>
											<td style="width:70%;"><?=$vehiculo;?></td>
											<td style="width:30%;">
<?php
											   if($ind<=$num_reg){	                                            
?>
                                                    <div style="width:15px; height:15px; border:1px solid #333; text-align:center;">
    <?php
                                                      if($id_tipo_vh === $rowDt['id_tipo_vh']){
                                                         echo 'X';  
                                                      }else{
                                                         echo ''; 
                                                      }
    ?>
                                                    </div>
<?php
											   }else{
												  echo'';   
											   }
?>     
											</td>
										</tr>
									</table>
								</td>
<?php
						   }else{
?>							   
						        <td style="width:20%;">&nbsp;</td>
<?php                           
						   }
                           $cl++; $ind++;
						}
?>                          
                         </tr>  
<?php
                        $fl++;
					}
?>                     
                  </table>    
                </td>    
            </tr>
         </table>
         <br/>
         
         <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
			<tr>
            	<td style="width:2%;"></td>
                <td style="width:6%; text-align:left;">Marca:</td>
                <td style="width:20%; text-align:left; border-bottom:1px solid #999;">
                	<?=$rowDt['marca'];?>
                </td>
                <td style="width:5%;"></td>
                <td style="width:6%; text-align:left;">Modelo:</td>
                <td style="width:20%; text-align:left;border-bottom:1px solid #999;">
                	<?=$rowDt['modelo'];?>
                </td>
                <td style="width:5%;"></td>
                <td style="width:4%; text-align:left;">Año:</td>
                <td style="width:10%; text-align:left; border-bottom:1px solid #999;">
                	<?=$rowDt['anio'];?>
                </td>
                <td style="width:5%;"></td>
                <td style="width:5%; text-align:left;">Placa:</td>
                <td style="width:14%; text-align:left; border-bottom:1px solid #999;">
                	<?=$rowDt['placa'];?>
                </td>
            </tr>
         </table>
         <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial; margin-top:4px;">
			<tr>
            	<td style="width:2%;"></td>
                <td style="width:6%; text-align:left;">Chasis:</td>
                <td style="width:20%; text-align:left; border-bottom:1px solid #999;">
                	<?=$rowDt['chasis'];?>
                </td>
                <td style="width:5%;"></td>
                <td style="width:6%; text-align:left;">Motor:</td>
                <td style="width:20%; text-align:left;border-bottom:1px solid #999;">
                	<?=$rowDt['motor'];?>
                </td>
                <td style="width:5%;"></td>
                <td style="width:4%; text-align:left;">Color:</td>
                <td style="width:14%; text-align:left; border-bottom:1px solid #999;">
                	<?=$rowDt['color'];?>
                </td>
                <td style="width:5%;"></td>
                <td style="width:5%;"></td>
                <td style="width:10%;"></td>
            </tr>
         </table>
         <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial; margin-top:4px; 
            border:0px solid #999;">
			<tr>
            	<td style="width:2%;"></td>
                <td style="width:15%; text-align:left;">Uso del vehículo</td>
                <td style="width:15%; text-align:left;">
                	<table border="0" cellpadding="0" cellspacing="0" style="width:100%; margin-bottom:5px; 
                        font-size: 100%;">
                    	<tr>
                        	<td style="width:45%;">Público</td>
                            <td style="width:55%;">
                            	<div style="width:15px; height:15px; border:1px solid #333; text-align:center;">
									<?=$respUse[0];?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width:15%; text-align:left;">
                	<table border="0" cellpadding="0" cellspacing="0" style="width:100%; margin-bottom:5px; 
                        font-size: 100%;">
                    	<tr>
                        	<td style="width:45%;">Privado</td>
                            <td style="width:55%;">
                            	<div style="width:15px; height:15px; border:1px solid #333; text-align:center;">
									<?=$respUse[1];?>
                                </div>
							</td>
                        </tr>
                    </table>
                </td>
                <td style="width:8%; text-align:left;">&nbsp;</td>
                <td style="width:10%; text-align:left;">
                	<!--<table border="0" cellpadding="0" cellspacing="0" style="width:100%; margin-bottom:5px; 
                        font-size: 100%;">
                    	<tr>
                        	<td style="width:45%;">4X2</td>
                            <td style="width:55%;">
                            	<div style="width:15px; height:15px; border:1px solid #333; text-align:center;">
									<?=$respTraction[0];?>
                                </div>
							</td>
                        </tr>
                    </table>-->
                </td>
                <td style="width:10%; text-align:left;">
                	<!--<table border="0" cellpadding="0" cellspacing="0" style="width:100%; margin-bottom:5px; 
                        font-size: 100%;">
                    	<tr>
                        	<td style="width:45%;">4X4</td>
                            <td style="width:55%;">
                            	<div style="width:15px; height:15px; border:1px solid #333; text-align:center;">
									<?=$respTraction[1];?>
                                </div>
							</td>
                        </tr>
                    </table>-->
                </td>
                <td style="width:20%; text-align:left;">
                	<!--<table border="0" cellpadding="0" cellspacing="0" style="width:100%; margin-bottom:5px; 
                        font-size: 100%;">
                    	<tr>
                        	<td style="width:55%;">Vehículo Pesado</td>
                            <td style="width:45%;">
                            	<div style="width:15px; height:15px; border:1px solid #333; text-align:center;">
									<?=$respTraction[2];?>
                                </div>
							</td>
                        </tr>
                    </table>-->
                </td>
                <td style="width:5%;"></td>
            </tr>
            <tr><td colspan="9" style="width:100%; text-align:left;"><b>Nota importante:</b> El cambio de uso del vehiculo no afecta la cobertura del riesgo</td></tr>
         </table> 
         <br>
         <span style="font-weight:bold; font-size:80%;">2. Valor Asegurado:</span>
         <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial; margin-top:4px;">
			<tr>
            	<td style="width:2%;"></td>
                <td style="width:40%;">Valor Comercial según avalúo del vehículo y/o precio de mercado</td>
                <td style="width:5%;"></td>
                <td style="width:5%;">USD. </td>
                <td style="width:15%; border-bottom:1px solid #999;"><?=$rowDt['valor_asegurado'];?></td>
                <td style="width:33%;">&nbsp;</td>
			</tr>
		</table>
        <br>
        <span style="font-weight:bold; font-size:80%;">3. Categoría de vehículos:</span>
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-family: Arial; margin-top:4px; font-size:80%;">
            <tr>
              <td style="width:50%; padding:4px; text-align:center; background:#CCCCCC; font-weight:bold;
                border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;
                border-left:1px solid #000; font-size: 70%;">
                 CATEGORIA A
              </td>
              <td style="width:50%; padding:4px; text-align:center; background:#CCCCCC; font-weight:bold;
                border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;
                font-size: 70%;">
                 CATEGORIA B
              </td>
            </tr>
            <tr>
              <td style="width:50%; padding:4px; text-align:center; border-right:1px solid #000;
                border-bottom:1px solid #000; border-left:1px solid #000;">
                Vehículos Livianos Particulares y Públicos (automóviles, vagonetas, jeep, camionetas, motocicletas y 
                similares)
              </td>
              <td style="width:50%; padding:4px; text-align:center; border-bottom:1px solid #000;
                border-right:1px solid #000;">
                Minibuses, furgonetas, Microbuses, Flotas y Buses, camiones, tractocamiones, volquetas, chatas, acoples  
                y/o similares.
              </td>
            </tr>
        </table>
        <br>
        <span style="font-weight:bold; font-size:80%;">4. Coberturas:</span> 
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial; margin-top:4px;">
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Sección I: Responsabilidad Civil Extracontractual hasta $us 10.000.00
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Sección II: Pérdida Total por Robo al 100% hasta los valores asegurados establecidos para cada ítem, 
                entendiéndose que robo incluye desaparición misteriosa, atraco y otros que signifiquen desaparición del o
                los vehículos asegurados
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Sección III: Pérdida Total por Accidente al 100%
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Sección IV: Daños Propios para vehículos livianos (Categoría A) con franquicia de: $us. 50.- y para  
                vehículos pesados con franquicia de $us. 150.-  (Categoría B)
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Sección V: Huelgas, Conmoción Civil, Daño Malicioso; Vandalismo y Terrorismo; Sabotaje para vehículos 
                livianos con franquicia de $us. 50.- (Vehículos Categoría A) y para vehículos pesados con franquicia de 
                $us. 150.- (Vehículos Categoría B). Se extiende a cubrir bajo esta cobertura, los daños al vehículo por 
                intento de robo.
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Sección VI: Robo Parcial al 80% (incluyendo accesorios declarados), Solo aplica a Vehículos Livianos 
                (Categoría A)
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Responsabilidad Civil Consecuencial Hasta $us. 3.000.-
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Cobertura por incendio, y/o Explosión,  extendiéndose a cubrir daños por Rayo y/o caída de rayo, sin la 
                aplicación de franquicia. 
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Accesorios hasta su valor declarado sin ninguna limitación
              </td>
            </tr>
            <tr>
              <td style="width:2%; font-size:100%; font-weight:bold;">&bull;</td>
              <td style="width:98%;">
                Extraterritorialidad anual gratuita,  por toda la vigencia de la póliza, sin comunicación previa a la 
                compañía  y aplicable a todas las coberturas
              </td>
            </tr>
        </table>      
        <span style="font-weight:bold; font-size:70%;">5. COBERTURAS ADICIONALES:</span>
        <table 
            cellpadding="0" cellspacing="0" border="0" 
            style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
            <tr> 
              <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                border:0px solid #333;" valign="top">
                <b>Asistencia Jurídica</b> incluyendo<br>  
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Asistencia de audiencias de Tránsito</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Preparación y presentación de memoriales</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Asistencia a audiencias de Conciliación</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Gastos y costas judiciales (por acción civil)</td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Presentación de fianzas judiciales (por acción civil)</td>
                    </tr>
                </table>
                <b>Beneficio de Auxilio Mecánico</b><br/>
                LAS 24 HORAS Y DURANTE TODA LA VIGENCIA DENTRO DE TODO EL TERRITORIO BOLIVIANO EXCEPTO PANDO y vehículos 
                de , Se aclara que (para vehículos pesados o de Categoría B, el servicio de auxilio mecánico y/o de 
                remolque por falla mecánica, se encuentra sujeto a reembolso y hasta un máximo de US$ 250 por evento y en
                 el agregado)
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">Remolque o transporte del vehículo en caso de accidente hasta el 5% del 
                      valor del asegurado</td>
                    </tr>
                </table>    
              </td>
              <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                border:0px solid #333;" valign="top">
                <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">
                     	Desplazamiento por la inmovilización y/o robo del vehículo en caso que los beneficiarios e
                         encuentren a más de 25 km. de su domicilio
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">
                     	Depósito y custodia del vehículo en caso de accidente, avería mecánica o robo hasta un límite de 
                        $us. 20.-
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">
                     	Servicio de conductor profesional en caso de accidente o fallecimiento del asegurado en caso de 
                        imposibilidad de conducir.
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">
                     	Para avería mecánica, Localización y envío de piezas de recambio necesarias para la reparación 
                        cuando no fuera posible su obtención.
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">
                     	Transmisión de mensajes urgente.
                      </td>
                    </tr>
                    <tr>
                      <td style="width:2%;" valign="top">-</td>
                      <td style="width:98%;">
                     	Línea de emergencia gratuita 24 hrs. /365 días 
                      </td>
                    </tr>
                </table>   
              </td>
            </tr>  
        </table>          
              
        <!--CASO FACULTATIVO-->
<?php
        if((boolean)$row['facultativo'] === true){
		   if((boolean)$row['aprobado'] === true){
?>
              <table border="0" cellpadding="1" cellspacing="0" style="width: 100%; font-size: 8px; font-weight: normal; 
                 font-family: Arial; margin: 2px 0 0 0; padding: 0; border-collapse: collapse; vertical-align: bottom;">
                 <tr>
                   <td colspan="7" style="width:100%; text-align: center; font-weight: bold; background: #e57474; 
                      color: #FFFFFF;">
                      Caso Facultativo
                   </td>
                 </tr>
                 <tr>
                   <td style="width:5%; text-align: center; font-weight: bold; border: 1px solid #dedede; 
                     background: #e57474;">Aprobado</td>
                   <td style="width:5%; text-align: center; font-weight: bold; border: 1px solid #dedede; 
                     background: #e57474;">Tasa de Recargo</td>
                   <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; 
                     background: #e57474;">Porcentaje de Recargo</td>
                   <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; 
                     background: #e57474;">Tasa Actual</td>
                   <td style="width:7%; text-align: center; font-weight: bold; border: 1px solid #dedede; 
                     background: #e57474;">Tasa Final</td>
                   <td style="width:69%; text-align: center; font-weight: bold; border: 1px solid #dedede; 
                     background: #e57474;">Observaciones</td>
                 </tr>
                 <tr>
                   <td style="width:5%; text-align: center; background: #e78484; color: #FFFFFF; 
                     border: 1px solid #dedede;"><?=strtoupper($row['aprobado']);?></td>
                   <td style="width:5%; text-align: center; background: #e78484; color: #FFFFFF; 
                     border: 1px solid #dedede;"><?=strtoupper($row['tasa_recargo']);?></td>
                   <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; 
                     border: 1px solid #dedede;"><?=$row['porcentaje_recargo'];?> %</td>
                   <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; 
                     border: 1px solid #dedede;"><?=$row['tasa_actual'];?> %</td>
                   <td style="width:7%; text-align: center; background: #e78484; color: #FFFFFF; 
                     border: 1px solid #dedede;"><?=$row['tasa_final'];?> %</td>
                   <td style="width:69%; text-align: justify; background: #e78484; color: #FFFFFF; 
                     border: 1px solid #dedede;"><?=$row['motivo_facultativo'];?> |<br /><?=$row['observacion'];?></td>
                 </tr>
               </table> 
<?php
		   }else{
?>
              <table border="0" cellpadding="1" cellspacing="0" style="width: 80%; font-size: 9px; 
                 border-collapse: collapse; font-weight: normal; font-family: Arial; margin: 2px 0 0 0; padding: 0; 
                 border-collapse: collapse; vertical-align: bottom;">         
                 <tr>
                  <td  style="text-align: center; font-weight: bold; background: #e57474; color: #FFFFFF;">
                    Caso Facultativo
                  </td>
                 </tr>
                 <tr>
                  <td style="text-align: center; font-weight: bold; border: 1px solid #dedede; background: #e57474;">
                    Observaciones
                  </td>
                 </tr>
                 <tr>
                  <td style="text-align: justify; background: #e78484; color: #FFFFFF; border: 1px solid #dedede;">
                     <?=$row['motivo_facultativo'];?>
                  </td>
                 </tr>
              </table>
<?php
		   }
		}
?>        
        
            
        <page><div style="page-break-before: always;">&nbsp;</div></page>
<?php
           if((boolean)$row['emitir'] === true && (boolean)$row['anulado'] === false){
?>        
              <span style="font-weight: bold; font-size:80%;">6. CLÁUSULAS ADICIONALES:</span>
              <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                  <tr> 
                    <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                      border:0px solid #333;" valign="top">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">Ausencia de control,  para vehículos pertenecientes a empresas y que sean 
                            conducidos por funcionarios dependientes</td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De rescisión decontrato a prorrata, por parte del Asegurado, sujeto a no 
                            siniestralidad</td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De Eliminación de Copia Legalizada de Tránsito,  para casos menores  a 
                            $us. 1.000.-  excepto en eventos de Responsabilidad Civil y Pérdida Total </td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De daños a causa de la naturaleza </td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De Ampliación de Aviso de Siniestro,  a 15 Días .</td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De Circulación en Vías no Autorizadas.</td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De Inclusiones y Exclusiones a prorrata.</td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De Flete Aéreo y/o Courier (Overnight), hasta 4us. 5.000.-sin aplicación 
                            de franquicia.</td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De Elegibilidad de Talleres.</td>
                          </tr>
                      </table>    
                    </td>
                    <td style="width:50%; font-size:100%; text-align: justify; padding:5px; 
                      border:0px solid #333;" valign="top">
                      <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size:100%;">
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">Cobertura de daño de  bolsas de aire (airbags),  a consecuencia de 
                            accidente de tránsito, robo y/o intento de robo sin ninguna limitación.</td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De Errores u Omisiones,  en la descripción de las características de la 
                            Materia Asegurada. </td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De ampliación de vigencia a prorrata hasta 90 días bajo los mismos 
                            términos, condiciones, incluyendo tasas y primas pactadas en el contrato inicial. </td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De extensión de cobertura en caso de no portar licencia, aplicable en 
                            eventos donde el conductor del vehículo asegurado cuente con licencia de conducir, pero al 
                            momento de la ocurrencia del evento no la porte (un evento al año). </td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">De repuestos y partes originales, aplicable solamente a vehículos 
                            importados</td>
                          </tr>
                          <tr>
                            <td style="width:2%; font-size:100%; font-weight:bold;" valign="top">&bull;</td>
                            <td style="width:98%;">Valor de Indemnización a causa de Pérdida Total por Accidente y/o Robo del
                             Vehículo que no exceda los 10.000 kilómetros de recorrido, se deberá considerar como valor de 
                             indemnización, el valor de compra de un vehículo cero kilómetros, descontando la parte 
                             impositiva </td>
                          </tr>
                      </table>
                    </td>
                  </tr>  
              </table><br>
                  
              <span style="font-weight: bold; font-size:80%;">7. Cuadro de Tasas Totales con Vigencia Anual:</span>
              <div style="font-size:75%;"><b>CATEGORIA A:</b> Vehículos Livianos Particulares y Públicos (automóviles, 
              vagonetas, jeep, camionetas, motocicletas y similares)</div>
              <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                <tr>
                  <td rowspan="2" style="width:50%; font-weight:bold; text-align:center; padding:3px; border-top: 1px solid
                   #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-left: 1px solid #000; 
                   background:#D8D8D8;">VALOR</td>
                  <td colspan="5" style="width:50%; font-weight:bold; text-align:center; padding:3px; border-top: 1px solid
                   #000; border-right: 1px solid #000; border-bottom: 1px solid #000; background:#D8D8D8;">TASAS</td>
                </tr>
                <tr>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 1</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 2</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 3</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 4</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 5</td>
                </tr>
                <tr>
                  <td style="width:50%; text-align:left; padding:3px; border-right: 1px solid #000; border-bottom: 1px 
                  solid #000; border-left: 1px solid #000;">Menor o igual a US$. 70.000,00</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  1.75%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  3.40%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  4.99%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  6.51%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  7.88%</td>
                </tr>
              </table>
              
              <div style="font-size:75%; margin-top:5px;"><b>CATEGORIA B:</b> Minibuses, furgonetas, Microbuses, Flotas y 
              Buses, camiones, tractocamiones, volquetas, chatas, acoples  y/o similares</div>
              <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                <tr>
                  <td rowspan="2" style="width:50%; font-weight:bold; text-align:center; padding:3px; border-top: 1px solid
                   #000; border-right: 1px solid #000; border-bottom: 1px solid #000; border-left: 1px solid #000; 
                   background:#D8D8D8;">VALOR</td>
                  <td colspan="5" style="width:50%; font-weight:bold; text-align:center; padding:3px; border-top: 1px solid
                   #000; border-right: 1px solid #000; border-bottom: 1px solid #000; background:#D8D8D8;">TASAS</td>
                </tr>
                <tr>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 1</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 2</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 3</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 4</td>
                  <td style="width:10%; font-weight:bold; text-align:center; padding:3px; border-right: 1px solid #000; 
                  border-bottom: 1px solid #000; background:#D8D8D8;">AÑO 5</td>
                </tr>
                <tr>
                  <td style="width:50%; text-align:left; padding:3px; border-right: 1px solid #000; border-bottom: 1px 
                  solid #000; border-left: 1px solid #000;">Menor o igual a US$. 70.000,00</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  2.50%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  4.85%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  7.13%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  9.30%</td>
                  <td style="width:10%; text-align:center; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                  11.23%</td>
                </tr>
              </table><br>
      <?php
                  $fecha=date('d/m/Y', strtotime($row['ini_vigencia']));
                  $array=explode('/',$fecha);
                  $day=$array[0];
                  $month=$array[1];
                  $year=$array[2];
      ?>   
              <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 80%; font-family: Arial;">
                  <tr>
                    <td style="width:20%; font-weight:bold;">5. Fecha inicio de vigencia:</td>
                    <td style="width:25%;">
                      <table 
                          cellpadding="0" cellspacing="0" border="0" 
                          style="width: 100%; height: auto; font-size: 100%; font-family: Arial;">
                          <tr>
                            <td style="width:32%; border-bottom:1px solid #999; text-align:center;"><?=$day;?></td>
                            <td style="width:2%;">/</td>
                            <td style="width:32%; border-bottom:1px solid #999; text-align:center;"><?=$month;?></td>
                            <td style="width:2%;">/</td>
                            <td style="width:32%; border-bottom:1px solid #999; text-align:center;"><?=$year;?></td>
                          </tr>
                      </table>    
                    </td>
                    <td style="width:55%;">&nbsp;</td>
                  </tr>
              </table>
              <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 90%; font-family: Arial; margin-top:4px;">
                  <tr>
                    <td style="width:25%; font-weight:bold;">6. Plazo del contrato de seguros:</td>
                    <td style="width:20%; border-bottom:1px solid #999; text-align:center;">
                      <?=$row['tipo_plazo'];?>
                    </td>
                    <td style="width:55%; text-align:left;">El plazo de la póliza debe ser igual al plazo del crédito del  
                    asegurado</td>
                  </tr>
              </table>
              <table 
                  cellpadding="0" cellspacing="0" border="0" 
                  style="width: 100%; height: auto; font-size: 90%; font-family: Arial; margin-top:4px;">
                  <tr>
                    <td style="width:15%; font-weight:bold;">8. Forma de Pago:</td>
                    <td style="width:20%; border-bottom:1px solid #999; text-align:center;">
                      <?=$row['forma_pago'];?>
                    </td>
                    <td style="width:65%; text-align:left;">
                     Pago de la prima de acuerdo a la periodicidad de pago del crédito</td>
                  </tr>
              </table>
              <br><br><br><br><br>
              <table 
                cellpadding="0" cellspacing="0" border="0" 
                style="width: 100%; height: auto; font-size: 80%;">
                <tr>
                   <td style="width:25%; border-top:1px solid #999; text-align:center;">Firma del Titular Solicitante</td>
                   <td style="width:50%;">&nbsp;</td>
                   <td style="width:25%; border-top:1px solid #999; text-align:center;">Firmas Autorizadas de la Compañia</td>
                </tr>
              </table>
              <table 
                cellpadding="0" cellspacing="0" border="0" 
                style="width: 100%; height: auto; font-size: 80%; font-family: Arial; margin-top:4px;">
                    <tr>
                      <td style="width:5%; text-align:left;">C.I.</td>
                      <td style="width:15%; border-bottom:1px solid #999; text-align:center;">
                      <?=$row['cl_ci'].$row['cl_complemento'];?></td>
                      <td style="width:2%;">&nbsp;</td>
                      <td style="width:12%; text-align:right;">Expedido en:</td>
                      <td style="width:12%; border-bottom:1px solid #333; text-align:center;"><?=$row['expedido']?></td>
                      <td style="width:54%;">&nbsp;</td>
                    </tr>
                    <tr>
                      <td style="width:46%; padding-top:5px;" colspan="5">
                        <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; font-size: 100%;">
                          <tr>
                            <td style="width:20%; text-align:left;">Lugar y fecha:</td>
                            <td style="width:50%; border-bottom:1px solid #999; text-align:center;">
                              <?=$row['u_depto'].', '.date('d/m/Y', strtotime($row['fecha_emision']));?>
                            </td>
                            <td style="width:30%;">&nbsp;</td>
                          </tr>
                        </table>    
                      </td>
                      <td style="width:54%;">&nbsp;</td>
                    </tr>
              </table><br>
              <table 
                cellpadding="0" cellspacing="0" border="0" 
                style="width: 100%; height: auto; font-size: 80%;">
                 <tr>
                   <td style="width:100%;">
                      <b>INFORMACIÓN ADICIONAL PARA EL SEGURO:</b><br><br>
                      
                      <b>REQUISITOS DE ASEGURABILIDAD:</b>	Antigüedad máxima del vehículo: 20 años<br><br>
                      <span style="font-size:12px;"> 
                      <b>CONDICIONES GENERALES Y EXCLUSIONES:</b> De acuerdo al Condicionado General de Seguro de Automotores. 
                      con Código de Registro 102-910500-2003 10 085<br><br>
                      </span>
                      <b>NOTAS ESPECIALES:</b><br>
                      El asegurado autoriza a la compañía de seguros a enviar el reporte a la central de riesgos del mercado de 
                      seguros acorde a las normativas reglamentarias de la autoridad de fiscalización y control de pensiones y 
                      seguros – APS.<br><br>
                      <span style="font-size:12px;"> 
                      <b>IMPORTANTE:</b><br>
                      La responsabilidad indemnizatoria de la Compañía está limitada como máxima al Valor Total Asegurado o 
                      declarado, en caso de Pérdida Total al momento de la indemnización se aplicará una depreciación automática
                       del 10% por año de uso desde adquirido el vehículo de la casa concesionariao importadora.
                      </span>
                   </td>
                 </tr>
                 <tr>
                   <td style="width:100%; border:1px solid #000; margin-top:4px; text-align:justify; padding:3px;">
                     <b>CONDICION DE ADHESION AL SEGURO:</b><br>
                     El Asegurado se adhiere voluntariamente a los términos establecidos en la presente Póliza de Automotor y 
                     declara conocer y estar de acuerdo con las condiciones del contrato de seguro. Asimismo, acepta la 
                     obligación de pago de prima para mantener vigente la cobertura de la póliza.<br> 
                     <b>PAGO DE PRIMAS.</b> A El incumplimiento en el pago de la prima más los intereses, dentro de los plazos 
                     fijados, suspende la vigencia de la póliza. Si esto sucede, la Compañía tiene derecho con fuerza ejecutiva
                      a la prima correspondiente por el periodo corrido, calculado a prorrata.
      
                   </td>
                 </tr>
              </table><br>
              <table 
                    cellpadding="0" cellspacing="0" border="0" 
                    style="width: 100%; height: auto; font-size: 65%; font-family: Arial;">
                    <tr>
                      <td style="width:100%; text-align:left; font-weight:bold;">
<?php
                       $queryVar = 'set @anulado = "Polizas Anuladas: ";';
                       if($link->query($queryVar,MYSQLI_STORE_RESULT)){
                           $canceled="select 
                                          max(@anulado:=concat(@anulado, prefijo, '-', no_emision, ', ')) as cert_canceled
                                      from
                                          s_au_em_cabecera
                                      where
                                          anulado = 1
                                              and id_cotizacion = '".$row['id_cotizacion']."';";
                           if($resp = $link->query($canceled,MYSQLI_STORE_RESULT)){
                               $regis = $resp->fetch_array(MYSQLI_ASSOC);
                               echo trim($regis['cert_canceled'],', ');
                           }else{
                               echo "Error en la consulta "."\n ".$link->errno. ": " . $link->error;
                           }
                       }else{
                         echo "Error en la consulta "."\n ".$link->errno. ": " . $link->error;   
                       }                
?>              
                      </td>
                    </tr>
              </table>       
<?php
		   }
		   
		}
	}
?>
		
        
	    </div>
</div>
<?php
    if ($fac === TRUE) {
		$url .= 'index.php?ms='.md5('MS_AU').'&page='.md5('P_fac').'&ide='.base64_encode($row['id_emision']).''; 
?>		 
		<br/>
        <div style="width:500px; height:auto; padding:10px 15px; font-size:11px; font-weight:bold; text-align:left;">
            No. de Slip de Cotizaci&oacute;n: <?=$row['no_cotizacion'];?>
        </div><br>
        <div style="width:500px; height:auto; padding:10px 15px; border:1px solid #FF2D2D; background:#FF5E5E; color:#FFF; font-size:10px; font-weight:bold; text-align:justify;">
            Observaciones en la solicitud del seguro:<br><br><?=$reason;?>
        </div>
        <div style="width:500px; height:auto; padding:10px 15px; font-size:11px; font-weight:bold; text-align:left;">
            Para procesar la solicitud ingrese al siguiente link con sus credenciales de usuario:<br>
            <a href="<?=$url;?>" target="_blank">Procesar caso facultativo</a>
        </div> 
<?php	
	}

	if ($implant === TRUE) {
		$url .= 'index.php?ms='.md5('MS_AU').'&page='.md5('P_app_imp').'&ide='.base64_encode($row['id_emision']).'';
?>
<br>
<div style="width:500px; height:auto; padding:10px 15px; border:1px solid #00FFFF; background:#9FE0FF; color:#303030; font-size:10px; font-weight:bold; text-align:justify;">
	Solicitud de Aprobaci&oacute;n: P&oacute;liza: <?=$row['prefijo'].'-'.$row['no_emision'];?><br><br>
</div>
<div style="width:500px; height:auto; padding:10px 15px; font-size:11px; font-weight:bold; text-align:left;">
	Para procesar la solicitud ingrese al siguiente link con sus credenciales de usuario:<br>
	<a href="<?=$url;?>" target="_blank">Procesar Solicitud de Aprobaci&oacute;n</a>
</div>
<?php
	}
	$html = ob_get_clean();
	return $html;
}
?>