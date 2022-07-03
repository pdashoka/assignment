<?php
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    public function testPositiveForassertEqualWithGreaterValPerposeofLoan()
    {  
		$expected = 1; 
		$loanperpose = 'Wedding';
		
        $actual = $this->checkPerposeofLoan($loanperpose); 
        $this->assertEquals($expected,$actual,"Equal to expected"); 
    }
	
	 public function testPositiveassertEqualsWithGreaterValLoanAmount()
    {  
		$expected = 1; 
		$loanamount = 1500;
		$actual = $this->checkLoanAmount($loanamount); 
		
		$this->assertEquals($expected,$actual,"Equal to expected"); 
	}
	
	 public function testPositiveassertEqualsWithGreaterValPin()
    {  
		$expected = 1; 
		//$IdentificationNumber = 11111111111;
		$IdentificationNumber = 31256723565;
		
        $actual = $this->validatePIN($IdentificationNumber); 
		
       $this->assertEquals($expected,$actual,"Equal to expected"); 
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
	
	public function checkLoanAmount($amount){
	  if($amount > 10000 || $amount < 1000){
		 $returnValue = 0; 
	  }else{
		$returnValue = 1;
	  }
	  return $returnValue;
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
	
 }
	
 