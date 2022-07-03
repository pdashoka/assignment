<?php
include_once("function.php");
@session_start();

$formData = new Frenn_validation();

if(isset($_POST['FullName'])){
$FullName = htmlspecialchars(trim($_POST['FullName']));	
}

if(isset($_POST['PersonalIdentificationNumber'])){
$PersonalIdentificationNumber = htmlspecialchars(trim($_POST['PersonalIdentificationNumber']));
}
if(isset($_POST['LoanAmount'])){
$LoanAmount = htmlspecialchars(trim($_POST['LoanAmount']));
}
if(isset($_POST['LoanPeriod'])){
$LoanPeriod = htmlspecialchars(trim($_POST['LoanPeriod']));
}
if(isset($_POST['PerposeofLoan'])){
$PerposeofLoan = htmlspecialchars(trim($_POST['PerposeofLoan']));
}

if($FullName){
$checkIdFullName = $formData->fullnameCheck($FullName);	
}
if($PersonalIdentificationNumber){
$checkPIN = $formData->validatePIN($PersonalIdentificationNumber);
}
if($LoanAmount){
$checkLoanAmount = $formData->checkLoanAmount($LoanAmount);
}
if($LoanPeriod){
$checkLoanPeriod = $formData->checkLoanPeriod($LoanPeriod);
}
if($PerposeofLoan){
$checkPerposeofLoan = $formData->checkPerposeofLoan($PerposeofLoan);
}

if($checkIdFullName == 0)
{
	echo "11";
}else if($checkPIN == 0){
	echo "12";
}else if($checkLoanAmount == 0){
	echo "13";
}else if($checkLoanPeriod == 0){
	echo "14";
}else if($checkPerposeofLoan == 0){
	echo "15";
}else{
	echo '1';
	$arrayData = array();
	$arrayData['FullName'] = $FullName;
	$arrayData['PersonalIdentificationNumber'] = $PersonalIdentificationNumber;
	$arrayData['LoanAmount'] = $LoanAmount;
	$arrayData['LoanPeriod'] = $LoanPeriod;
	$arrayData['PerposeofLoan'] = $PerposeofLoan;
	$fullData = json_encode($arrayData);
	$formData->recordsLogs($fullData);

}


?>