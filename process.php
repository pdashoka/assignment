<?php
include_once("function.php");
@session_start();
$formData = new Frenn_validation();

$FullName 					  = htmlspecialchars(trim($_POST['FullName']));
$PersonalIdentificationNumber = htmlspecialchars(trim($_POST['PersonalIdentificationNumber']));
$LoanAmount					  = htmlspecialchars(trim($_POST['LoanAmount']));
$LoanPeriod 	  			  = htmlspecialchars(trim($_POST['LoanPeriod']));
$PerposeofLoan 				  = htmlspecialchars(trim($_POST['PerposeofLoan']));
//echo $FullName;

$checkIdFullName = $formData->fullnameCheck($FullName);
$checkPIN = $formData->validatePIN($PersonalIdentificationNumber);
$checkLoanAmount = $formData->checkLoanAmount($LoanAmount);
$checkLoanPeriod = $formData->checkLoanPeriod($LoanPeriod);
$checkPerposeofLoan = $formData->checkPerposeofLoan($PerposeofLoan);

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




//logErr($fullData);
// $file_name = 'files/records.txt';
// //opens the file.txt file or implicitly creates the file
// $myfile = fopen($file_name, 'w') or die('Cannot open file: '.$file_name); 
// $movie_name = $FullName;
// // write name to the file
// fwrite($myfile, $movie_name);

// // close the file
// fclose($myfile);
// 

function logErr($data){
  $logPath = 'files/records.txt';
  $mode = (!file_exists($logPath)) ? 'w':'a';
  $logfile = fopen($logPath, $mode);
  fwrite($logfile, "\r\n". $data);
  fclose($logfile);
}
?>