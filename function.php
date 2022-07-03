<?php
class Frenn_validation
{
	public function getIdentificationNumber($identificationNumber)
    {
        /* Do first run. */
		$total = 0;
        for ($i = 0; $i < 10; $i++) {
            $multiplier = $i + 1;
            $total += substr($identificationNumber, $i, 1) * ($multiplier > 9 ? 1 : $multiplier);
        }

        $modulo = $total % 11;

        /* If modulus is ten we need second run. */
        if ($modulo >= 10) {
            $total = 0;

            for ($i = 0; $i < 10; $i++) {
                $multiplier = $i + 3;
                $total += substr($identificationNumber, $i, 1) * ($multiplier > 9 ? $multiplier - 9 : $multiplier);
            }

            $modulo = $total % 11;
			/* If modulus is still ten revert to 0. */
            if ($modulo >= 10) {
                $modulo = 0;
            }
        }

        return $modulo;
    }
	
	public function validatePIN($IdentificationNumber)
	{	
		$controlNumber = (int)substr($IdentificationNumber, -1);
		$returnPinValue = $this->getIdentificationNumber($IdentificationNumber);
		
		if($controlNumber !== $returnPinValue) {
            $returnValue = 0;
        }else{
			 $returnValue = 1;
		}
		return $returnValue;
	}
	
	public function fullnameCheck($name)
	{
		$nameExplode = explode(" ",$name);
		$countValue = count($nameExplode);
		
		if($countValue > 1){
			if(strlen($nameExplode[0]) == 1) //checking for first name -Should be more then 1 string
			{
			$returnValue = 0;	
			}else{
			$returnValue = 1;
			}
			
		}else{
			$returnValue = 0;
		}
		return $returnValue;
	}
	
	public function checkLoanAmount($amount){
	  if($amount > 10000 || $amount < 1000){
		 $returnValue = 0; 
	  }else{
		$returnValue = 1;   
	  }
	  return $returnValue;
	}
	
	public function checkLoanPeriod($loanterm){
	  if($loanterm > 24 || $loanterm < 6){
		 $returnValue = 0; 
	  }else{
		$returnValue = 1;   
	  }
	  return $returnValue;
	}
	
	public function checkPerposeofLoan($loanperpose){
		$PerposeofLoan = array("Holiday","Repair","Consumer Electronics","Wedding","Rental","Car","School","Investment");
		if(in_array($loanperpose, $PerposeofLoan))
		  {
		   $returnValue = 1;
		  }else{
			$returnValue = 0; 
		  }
		return $returnValue;
	}
	
	
	
	public function recordsLogs($data){
		$content = $data;
		$logPath = 'files/'.date("Ymdhis").'_'.session_id().'.json';
		$fp = fopen($logPath,"wb");
		fwrite($fp,$content);
		fclose($fp);
	}
	
}
?>