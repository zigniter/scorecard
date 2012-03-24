<?php 
	$i = array(0,1,2);
	function generatePNCOpenRow($title){
		printf("<tr class='rrow'><td class='rqcell'>%s</td>",$title);
	}
	function generatePNCCell($data){
		printf("<td class='rdcell'>%s</td>",$data);
	}
	function generatePNCCloseRow(){
		printf("</tr>");
	}
?>

<h3><?php echo getstring(PROTOCOL_PNC);?></h3>
<table class='rtable'>
<tr class='rrow'>
	<th><?php echo getstring('table.heading.question');?></th>
	<?php 
		for($x=0;$x <count($pnc); $x++ ){
			echo "<th>".getstring('table.heading.data')."</th>";
		}
	?>
</tr>
<tr class="rrow">
	<td class="rqcell"><?php echo getstring('protocolsubmitted');?></td>
	<?php 
		for($x=0;$x <count($pnc); $x++ ){
			echo "<td class='rdcell'>";
			if (isset($pnc[$x])){
				printf('%1$s %3$s (%2$s)<br/>%4$s (%5$s)',date('H:i',strtotime($pnc[$x]->CREATEDON)), 
														date('D d M Y',strtotime($pnc[$x]->CREATEDON)), 
														displayAsEthioDate(strtotime($pnc[$x]->CREATEDON)), 
														$pnc[$x]->submittedname, 
														displayHealthPointName($pnc[$x]->protocolhpcode));
			}
			echo "</td>";
		}
	?>
</tr>

<?php 
	$rows = array(	'Q_USERID',	
					'Q_HEALTHPOINTID',	
					'Q_YEAROFBIRTH',
					'Q_AGE' 
					);
	
	foreach($rows as $r){
		generatePNCOpenRow(getstring($r));
		$data = array();
		for($x=0;$x <count($pnc); $x++ ){
			$data[$x] = array(
							'Q_USERID' => $pnc[$x]->Q_USERID,
							'Q_HEALTHPOINTID'  => displayHealthPointName($pnc[$x]->patienthpcode),
							'Q_YEAROFBIRTH'  => $pnc[$x]->Q_YEAROFBIRTH,
							'Q_AGE'  => $pnc[$x]->Q_AGE
			);
		}
		for($x=0;$x <count($pnc); $x++ ){
			generatePNCCell($data[$x][$r]);
		}
		generatePNCCloseRow();
	}	

	// TODO : add other fields
?>
<tr class='rrow'>
	<td colspan="<?php echo 1+count($pnc);?>" class="sh"><?php echo getstring('section.pnc.deliverysummary');?></td>
</tr>
<?php 
	$rowArray = array(
					'Q_DELIVERYDATE' => displayAsEthioDate(strtotime($patient->pnc->Q_DELIVERYDATE))."<br/>".date('D d M Y',strtotime($patient->pnc->Q_DELIVERYDATE)),
					'Q_DELIVERYNOBABIES' => getstring("Q_DELIVERYNOBABIES.".$patient->pnc->Q_DELIVERYNOBABIES),
					'Q_DELIVERYMODE' => getstring("Q_DELIVERYMODE.".$patient->pnc->Q_DELIVERYMODE),
					'Q_DELIVERYSITE' => getstring("Q_DELIVERYSITE.".$patient->pnc->Q_DELIVERYSITE),
					'Q_BIRTHATTENDANT' => getstring("Q_BIRTHATTENDANT.".$patient->pnc->Q_BIRTHATTENDANT),
					'Q_COMPLICATIONS' => getstring("Q_COMPLICATIONS.".$patient->pnc->Q_COMPLICATIONS),
					'Q_MATERNALDEATH' => getstring("Q_MATERNALDEATH.".$patient->pnc->Q_MATERNALDEATH)
					);
	foreach ($rowArray as $k=>$v){
		generateDeliveryRow(getstring($k),$v);
	}
	
?>
<tr class='rrow'>
	<td colspan="<?php echo 1+count($pnc);?>" class="sh"><?php echo getstring('section.pnc.mother');?></td>
</tr>
<?php 
	$rowArray = array(
					'Q_MOTHERCONDITION' => getstring("Q_MOTHERCONDITION.".$patient->pnc->Q_MOTHERCONDITION),
					'Q_LOCHIACOLOUR' => getstring("Q_LOCHIACOLOUR.".$patient->pnc->Q_LOCHIACOLOUR),
					'Q_LOCHIAAMOUNT' => getstring("Q_LOCHIAAMOUNT.".$patient->pnc->Q_LOCHIAAMOUNT),
					'Q_LOCHIAODOUR' => getstring("Q_LOCHIAODOUR.".$patient->pnc->Q_LOCHIAODOUR),
					'Q_TEMPERATURE' => getstring("Q_TEMPERATURE.".$patient->pnc->Q_TEMPERATURE),
					'Q_SYSTOLICBP' => getstring("Q_SYSTOLICBP.".$patient->pnc->Q_SYSTOLICBP),
					'Q_DIASTOLICBP' => getstring("Q_DIASTOLICBP.".$patient->pnc->Q_DIASTOLICBP),
					'Q_CARDIACPULSE' => getstring("Q_CARDIACPULSE.".$patient->pnc->Q_CARDIACPULSE),
					'Q_PALLORANEMIA' => getstring("Q_PALLORANEMIA.".$patient->pnc->Q_PALLORANEMIA),
					'Q_LEAKINGURINE' => getstring("Q_LEAKINGURINE.".$patient->pnc->Q_LEAKINGURINE),
					'Q_GENITALIAEXTERNA' => getstring("Q_GENITALIAEXTERNA.".$patient->pnc->Q_GENITALIAEXTERNA),
					'Q_IRONSUPPL' => getstring("Q_IRONSUPPL.".$patient->pnc->Q_IRONSUPPL),
					'Q_VITASUPPL' => getstring("Q_VITASUPPL.".$patient->pnc->Q_VITASUPPL),
					'Q_TETANUS' => getstring("Q_TETANUS.".$patient->pnc->Q_TETANUS),
					'Q_TT1' => getstring("Q_TT1.".$patient->pnc->Q_TT1),
					'Q_TT2' => getstring("Q_TT2.".$patient->pnc->Q_TT2),
					'Q_FPCOUNSELED' => getstring("Q_FPCOUNSELED.".$patient->pnc->Q_FPCOUNSELED),
					'Q_FPACCEPTED' => getstring("Q_FPACCEPTED.".$patient->pnc->Q_FPACCEPTED),
					'Q_HIV' => getstring("Q_HIV.".$patient->pnc->Q_HIV),
					'Q_HIVTREATMENT' => getstring("Q_HIVTREATMENT.".$patient->pnc->Q_HIVTREATMENT),
					'Q_DRUGS' => getstring("Q_DRUGS.".$patient->pnc->Q_DRUGS),
					'Q_DRUGSDESCRIPTION' => getstring("Q_DRUGSDESCRIPTION.".$patient->pnc->Q_DRUGSDESCRIPTION),
					'Q_COMMENTSMOTHER' => getstring("Q_COMMENTSMOTHER.".$patient->pnc->Q_COMMENTSMOTHER)

					);
		foreach ($rowArray as $k=>$v){
		generateDeliveryRow(getstring($k),$v);
	}
	
?>
<tr class='rrow'>
	<td colspan="<?php echo 1+count($pnc);?>" class="sh"><?php echo getstring('section.pnc.baby');?></td>
</tr>
<?php 
	$rowArray = array(
					'Q_BABIES' => getstring("Q_BABIES.".$patient->pnc->Q_BABIES),
					'Q_BABYCONDITION' => getstring("Q_BABYCONDITION.".$patient->pnc->Q_BABYCONDITION),
					'Q_DEATHDATE' => displayAsEthioDate(strtotime($patient->pnc->Q_DEATHDATE))."<br/>".date('D d M Y',strtotime($patient->pnc->Q_DEATHDATE)),
					'Q_DEATHCOMMENTS' => getstring("Q_DEATHCOMMENTS.".$patient->pnc->Q_DEATHCOMMENTS),
					'Q_BABYBREATHING' => getstring("Q_BABYBREATHING.".$patient->pnc->Q_BABYBREATHING),
					'Q_NEWBORNWEIGHT' => getstring("Q_NEWBORNWEIGHT.".$patient->pnc->Q_NEWBORNWEIGHT),
					'Q_NEWBORNHEIGHT' => getstring("Q_NEWBORNHEIGHT.".$patient->pnc->Q_NEWBORNHEIGHT),
					'Q_NEWBORNHEADCIRCUM' => getstring("Q_NEWBORNHEADCIRCUM.".$patient->pnc->Q_NEWBORNHEADCIRCUM),
					'Q_CORDCONDITION' => getstring("Q_CORDCONDITION.".$patient->pnc->Q_CORDCONDITION),
					'Q_IMMUNO_BCG' => getstring("Q_IMMUNO_BCG.".$patient->pnc->Q_IMMUNO_BCG),
					'Q_IMMUNO_BCG_LASTDATE' => displayAsEthioDate(strtotime($patient->pnc->Q_IMMUNO_BCG_LASTDATE))."<br/>".date('D d M Y',strtotime($patient->pnc->Q_IMMUNO_BCG_LASTDATE)),
					'Q_IMMUNO_OPV' => getstring("Q_IMMUNO_OPV.".$patient->pnc->Q_IMMUNO_OPV),
					'Q_IMMUNO_OPV_LASTDATE' => displayAsEthioDate(strtotime($patient->pnc->Q_IMMUNO_OPV_LASTDATE))."<br/>".date('D d M Y',strtotime($patient->pnc->Q_IMMUNO_OPV_LASTDATE)),
					'Q_IMMUNO_PENTA' => getstring("Q_IMMUNO_PENTA.".$patient->pnc->Q_IMMUNO_PENTA),
					'Q_IMMUNO_PENTA_LASTDATE' => displayAsEthioDate(strtotime($patient->pnc->Q_IMMUNO_PENTA_LASTDATE))."<br/>".date('D d M Y',strtotime($patient->pnc->Q_IMMUNO_PENTA_LASTDATE)),
					'Q_IMMUNO_IPTI' => getstring("Q_IMMUNO_IPTI.".$patient->pnc->Q_IMMUNO_IPTI),
					'Q_IMMUNO_IPTI_LASTDATE' => displayAsEthioDate(strtotime($patient->pnc->Q_IMMUNO_IPTI_LASTDATE))."<br/>".date('D d M Y',strtotime($patient->pnc->Q_IMMUNO_IPTI_LASTDATE)),
					'Q_BABYMUMBOND' => getstring("Q_BABYMUMBOND.".$patient->pnc->Q_BABYMUMBOND),
					'Q_BABYBREASTFEED' => getstring("Q_BABYBREASTFEED.".$patient->pnc->Q_BABYBREASTFEED),
					'Q_HIV_BABY' => getstring("Q_HIV_BABY.".$patient->pnc->Q_HIV_BABY),
					'Q_ARV_HIV_BABY' => getstring("Q_ARV_HIV_BABY.".$patient->pnc->Q_ARV_HIV_BABY),
					'Q_COMMENTSBABY' => getstring("Q_COMMENTSBABY.".$patient->pnc->Q_COMMENTSBABY),
					'Q_BABIES' => getstring("Q_BABIES.".$patient->pnc->Q_BABIES)
					);
	foreach ($rowArray as $k=>$v){
		generateDeliveryRow(getstring($k),$v);
	}
	
?>
<tr class='rrow'>
	<td colspan="2" class="sh"><?php echo getstring('section.checklist');?></td>
</tr>
<?php 
	$q_gpsdata = "";
	if ($patient->pnc->Q_GPSDATA_LAT != ""){
		$q_gpsdata = $patient->pnc->Q_GPSDATA_LAT.",".$patient->pnc->Q_GPSDATA_LNG;
	}
	$rowArray = array(
					'Q_APPOINTMENTDATE' => displayAsEthioDate(strtotime($patient->pnc->Q_APPOINTMENTDATE))."<br/>".date('D d M Y',strtotime($patient->pnc->Q_APPOINTMENTDATE)),
					'Q_IDCARD' => $patient->pnc->Q_IDCARD,
					'Q_LOCATION' => getstring("Q_LOCATION.".$patient->pnc->Q_LOCATION),
					'Q_GPSDATA' => $q_gpsdata,
					
	);
	foreach ($rowArray as $k=>$v){
		generateANCFirstRow(getstring($k),$v);
	}

?>
</table>
