<?php
session_start();

include "view/common_v.php";
require_once "php/include/get_root.php";

/*
if(!isset($_SESSION['login'])){       // can't proceed without log in
	//echo $url_root;
	header('Location: '.$url_root.'login_required.php');
	exit;
}
*/

showExternallink();
showHeader();

include "php/include/header_beta.php"; 


/*
$rockTypeData=getRockType();
$featureTypeData=getFeatureType();
$edPhaseTypeData=getedPhaseType();
$eqTypeData=geteqType();			

$treTypeData=gettremorType();		
$sampleSpeciesData=getSampledGasSpecies();
$pluSpeciesData=getPlumeSpecies();
$soilSpeciesData=getSoilSpecies();
$hdSpeciesData=getHdSpecies();

	
$rockType="[";					
for($i=0;$i<sizeof($rockTypeData);$i++){
	$rockType .= "{val:'".$rockTypeData[$i]."',text:'".$rockTypeData[$i]."'}";
	
	if($i<(sizeof($rockTypeData)-1))
		$rockType .= ",";
	else
		$rockType .= "]";
}

$featureType="[";					
for($i=0;$i<sizeof($featureTypeData);$i++){
	$featureType .= "{val:'".$featureTypeData[$i]."',text:'".$featureTypeData[$i]."'}";
	
	if($i<(sizeof($featureTypeData)-1))
		$featureType .= ",";
	else
		$featureType .= "]";
}


$edPhaseType="[";					
for($i=0;$i<sizeof($edPhaseTypeData);$i++){
	$edPhaseType .= "{val:'".$edPhaseTypeData[$i]."',text:'".$edPhaseTypeData[$i]."'}";
	
	if($i<(sizeof($edPhaseTypeData)-1))
		$edPhaseType .= ",";
	else
		$edPhaseType .= "]";
}



$eqType="[";					
for($i=0;$i<sizeof($eqTypeData);$i++){
	$eqType .= "{val:'".$eqTypeData[$i][1]."',text:'".$eqTypeData[$i][0]."'}";
	
	if($i<(sizeof($eqTypeData)-1))
		$eqType .= ",";
	else
		$eqType .= "]";
}
if ( sizeof($eqType) == 1 ) $eqType .= "]";

$treType="[";					
for($i=0;$i<sizeof($treTypeData);$i++){
	$treType .= "{val:'".$treTypeData[$i]."',text:'".$treTypeData[$i]."'}";
	
	if($i<(sizeof($treTypeData)-1))
		$treType .= ",";
	else
		$treType .= "]";
}
if ( sizeof($treType) == 1 ) $treType .= "]";


$sampleSpecies="[";					
for($i=0;$i<sizeof($sampleSpeciesData);$i++){
	$sampleSpecies .= "{val:'".$sampleSpeciesData[$i]."',text:'".$sampleSpeciesData[$i]."'}";
	
	if($i<(sizeof($sampleSpeciesData)-1))
		$sampleSpecies .= ",";
	else
		$sampleSpecies .= "]";
}
if ( sizeof($sampleSpecies) == 1 ) $sampleSpecies .= "]";


$pluSpecies="[";					
for($i=0;$i<sizeof($pluSpeciesData);$i++){
	$pluSpecies .= "{val:'".$pluSpeciesData[$i]."',text:'".$pluSpeciesData[$i]."'}";
	
	if($i<(sizeof($pluSpeciesData)-1))
		$pluSpecies .= ",";
	else
		$pluSpecies .= "]";
}
if ( sizeof($pluSpecies) == 1 ) $pluSpecies .= "]";


$soilSpecies="[";					
for($i=0;$i<sizeof($soilSpeciesData);$i++){
	$soilSpecies .= "{val:'".$soilSpeciesData[$i]."',text:'".$soilSpeciesData[$i]."'}";
	
	if($i<(sizeof($soilSpeciesData)-1))
		$soilSpecies .= ",";
	else
		$soilSpecies .= "]";
}
if ( sizeof($soilSpecies) == 1 ) $soilSpecies .= "]";

$hdSpecies="[";					
for($i=0;$i<sizeof($hdSpeciesData);$i++){
	$hdSpecies .= "{val:'".$hdSpeciesData[$i]."',text:'".$hdSpeciesData[$i]."'}";
	
	if($i<(sizeof($hdSpeciesData)-1))
		$hdSpecies .= ",";
	else
		$hdSpecies .= "]";
}
if ( sizeof($hdSpecies) == 1 ) $hdSpecies .= "]";


showjquery($rockType,$featureType,$edPhaseType,$eqType,$treType,$sampleSpecies,$pluSpecies,$soilSpecies,$hdSpecies
);
*/


include "view/booleanIndex_v111.php";


showFooter1();
include "php/include/footer_main_beta.php"; 
showFooter2();

?>