<?php 
 function generateDeliveryRow($title, $data){
  printf("<tr class='rrow'><td class='rqcell'>%s</td><td class='rdcell'>%s</td><tr>",$title,$data);
}

 //echo "<pre>";
 //print_r($patient->delivery);
 //echo "</pre>";
?>

<h3><?php echo getstring(PROTOCOL_DELIVERY);?></h3>

<table class='rtable'>
<tr class='rrow'>
 <th><?php echo getstring('table.heading.question');?></th>
 <th><?php echo getstring('table.heading.data');?></th>
</tr>
<tr class="rrow">
 <td class="rqcell"><?php echo getstring('protocolsubmitted');?></td>
 <td class="rdcell"><?php 
   printf('%1$s %3$s (%2$s)<br/>%4$s (%5$s)',	date('H:i',strtotime($patient->delivery->CREATEDON)),
   date('D d M Y',strtotime($patient->delivery->CREATEDON)),
   displayAsEthioDate(strtotime($patient->delivery->CREATEDON)),
   $patient->delivery->submittedname,
   displayHealthPointName($patient->delivery->protocolhpcode));
    ?></td>
</tr>
<?php 
    $rowArray = array(
    'Q_USERID' => $patient->delivery->Q_USERID,
    'Q_HEALTHPOINTID' => displayHealthPointName($patient->delivery->patienthpcode),
    'Q_YEAROFBIRTH' => $patient->delivery->Q_YEAROFBIRTH,
    'Q_AGE' => $patient->delivery->Q_AGE
    );
    foreach ($rowArray as $k=>$v){
    generateDeliveryRow(getstring($k),$v);
 }
?>
<tr class='rrow'>
 <td colspan="2" class="sh"><?php echo getstring('section.laborprocess');?></td>
</tr>

<?php 
 $rowArray = array(
    'Q_LABORONSETTIME' => getstring("Q_LABORONSETTIME.".$patient->delivery->Q_LABORONSETTIME),
    'Q_ECLAMPSIA' => getstring("Q_ECLAMPSIA.".$patient->delivery->Q_ECLAMPSIA),
    'Q_PROM' => getstring("Q_PROM.".$patient->delivery->Q_PROM),
    'Q_MECONIUM' => getstring("Q_MECONIUM.".$patient->delivery->Q_MECONIUM),
    'Q_PRESENTATION' => getstring("Q_PRESENTATION.".$patient->delivery->Q_PRESENTATION)
    );
 foreach ($rowArray as $k=>$v){
   generateDeliveryRow(getstring($k),$v);
 }
?>

<tr class='rrow'>
 <td colspan="2" class="sh"><?php echo getstring('section.deliveryinfo');?></td>
</tr>

<?php 

 $temp = array();
 foreach($patient->delivery->Q_BIRTHATTENDANT as $vv){
  if(getstring("Q_WHOATTENDED.".$vv)){
   array_push($temp,getstring("Q_WHOATTENDED.".$vv));
  } else {
   array_push($temp,$vv); 
 }
 }
 $q_birthattendant = implode($temp,", ");
 $rowArray = array(
    'Q_DELIVERYOUTCOME' => getstring("Q_DELIVERYOUTCOME.".$patient->delivery->Q_DELIVERYOUTCOME),
    'Q_REFERRALREASON' => ($patient->delivery->Q_REFERRALREASON != "") ? getstring("Q_REFERRALREASON.".$patient->delivery->Q_REFERRALREASON) : "",
    'Q_DELIVERYSITE' => getstring("Q_DELIVERYSITE.".$patient->delivery->Q_DELIVERYSITE),
    'Q_MATERNALDEATH' => $patient->delivery->Q_MATERNALDEATH,
    'Q_DELIVERYDATE' => displayAsEthioDate(strtotime($patient->delivery->Q_DELIVERYDATE))."<br/>".date('D d M Y',strtotime($patient->delivery->Q_DELIVERYDATE)),
    'Q_DELIVERYTIME' => date("H:i",strtotime($patient->delivery->Q_DELIVERYTIME)),
    'Q_BIRTHATTENDANT' => $q_birthattendant,
    'Q_VAGINALDELIVERY' => $patient->delivery->Q_VAGINALDELIVERY,
    'Q_PLACENTA' => getstring("Q_PLACENTA.".$patient->delivery->Q_PLACENTA),
    'Q_VACUUMFORCEPS' => getstring("Q_VACUUMFORCEPS.".$patient->delivery->Q_VACUUMFORCEPS),
    'Q_CSECTION' => $patient->delivery->Q_CSECTION,
    'Q_GENITALIAEXTERNAL' => getstring("Q_GENITALIAEXTERNAL.".$patient->delivery->Q_GENITALIAEXTERNAL),
    'Q_EPISIOTOMY' => $patient->delivery->Q_EPISIOTOMY,
    'Q_PPH' => $patient->delivery->Q_PPH,
    'Q_MISOPROSTOL' => getstring("Q_MISOPROSTOL.".$patient->delivery->Q_MISOPROSTOL),
    'Q_MISOPROSTOLTABLETS' => $patient->delivery->Q_MISOPROSTOLTABLETS,
    'Q_MISOPROSTOLTIMING' =>($patient->delivery->Q_MISOPROSTOLTIMING != "") ? getstring("Q_MISOPROSTOLTIMING.".$patient->delivery->Q_MISOPROSTOLTIMING) : "",
    'Q_OXYTOCIN' => $patient->delivery->Q_OXYTOCIN
    );
 foreach ($rowArray as $k=>$v){
  generateDeliveryRow(getstring($k),$v);
 }
 // TODO add other fields
?>

<tr class='rrow'>
 <td colspan="2" class="sh"><?php echo getstring('section.motherstatus');?></td>
</tr>
<?php 
 $rowArray = array(
    'Q_CONDITION' => $patient->delivery->Q_CONDITION,
    'Q_CARDIACPULSE' => $patient->delivery->Q_CARDIACPULSE,
    'Q_TEMPERATURE' => $patient->delivery->Q_TEMPERATURE,
    'Q_ANEMIA' => $patient->delivery->Q_ANEMIA,
    'Q_SYSTOLICBP' => $patient->delivery->Q_SYSTOLICBP,
    'Q_DIASTOLICBP' =>$patient->delivery->Q_DIASTOLICBP
    );
 foreach ($rowArray as $k=>$v){
  generateDeliveryRow(getstring($k),$v);
 }

?>
<tr class='rrow'>
 <td colspan="2" class="sh"><?php echo getstring('section.newbornstatus');?></td>
</tr>
<?php 
 $rowArray = array(
    'Q_BREASTFEEDING' => $patient->delivery->Q_BREASTFEEDING,
    'Q_ADVICEDANGERSIGNS' => $patient->delivery->Q_ADVICEDANGERSIGNS,
    'Q_ADVICEFEEDING' => $patient->delivery->Q_ADVICEFEEDING,
    'Q_IRONSUPPL' => $patient->delivery->Q_IRONSUPPL,
    'Q_VITASUPPL' => $patient->delivery->Q_VITASUPPL,
    'Q_ARVMOM' => $patient->delivery->Q_ARVMOM
    );
 foreach ($rowArray as $k=>$v){
  generateDeliveryRow(getstring($k),$v);
 }
?>
<tr class='rrow'>
 <td colspan="2" class="sh"><?php echo getstring('section.babies');?></td>
</tr>
<?php 
 $rowArray = array(
    'Q_GESTATIONALAGE' =>$patient->delivery->Q_GESTATIONALAGE,
    'Q_DELIVERIES' => $patient->delivery->Q_DELIVERIES,
    'Q_LIVEBIRTH' => $patient->delivery->Q_LIVEBIRTH,
    'Q_NEWBORNSEX' => $patient->delivery->Q_NEWBORNSEX,
    'Q_APGAR1MIN' => $patient->delivery->Q_APGAR1MIN,
    'Q_APGAR5MIN' => $patient->delivery->Q_APGAR5MIN,
    'Q_NEWBORNRESUSCITATION' => $patient->delivery->Q_NEWBORNRESUSCITATION,
    'Q_NEWBORNWEIGHT' => $patient->delivery->Q_NEWBORNWEIGHT,
    'Q_NEWBORNHEAD' => $patient->delivery->Q_NEWBORNHEAD,
    'Q_TTCEYEOINTMENT' => $patient->delivery->Q_TTCEYEOINTMENT,
    'Q_BCGIMMUNO' => $patient->delivery->Q_BCGIMMUNO,
    'Q_PLOIO0IMMUNO' => $patient->delivery->Q_PLOIO0IMMUNO,
    'Q_VITAMINK' => $patient->delivery->Q_VITAMINK,
    'Q_BABYMOMBOND' => $patient->delivery->Q_BABYMOMBOND,
    'Q_BABYBREATHING' => $patient->delivery->Q_BABYBREATHING,
    'Q_NEWBORNHIV' => $patient->delivery->Q_NEWBORNHIV,
    'Q_ARVNEWBORNHIV' => $patient->delivery->Q_ARVNEWBORNHIV,
    'Q_OTHERCOMMENTS' => $patient->delivery->Q_OTHERCOMMENTS,
    'Q_DELIVERIES' => $patient->delivery->Q_DELIVERIES
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
 if ($patient->delivery->Q_GPSDATA_LAT != ""){
  $q_gpsdata = $patient->delivery->Q_GPSDATA_LAT.",".$patient->delivery->Q_GPSDATA_LNG;
 }
 $rowArray = array(
    'Q_APPOINTMENTDATE' => displayAsEthioDate(strtotime($patient->delivery->Q_APPOINTMENTDATE))."<br/>".date('D d M Y',strtotime($patient->delivery->Q_APPOINTMENTDATE)),
    'Q_IDCARD' => $patient->delivery->Q_IDCARD,
    'Q_LOCATION' => getstring("Q_LOCATION.".$patient->delivery->Q_LOCATION),
    'Q_GPSDATA' => $q_gpsdata
 );
 foreach ($rowArray as $k=>$v){
  generateDeliveryRow(getstring($k),$v);
 }

?>
</table>
