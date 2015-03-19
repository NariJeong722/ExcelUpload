<?php
class Company{
	private $nCompanyCode;
	private $sCompanyName;
	
	public function setCompanyCode($nCompanyCode){
		$this->nCompanyCode = $nCompanyCode;
	}
	
	public function getCompanyCode(){
		return $this->nCompanyCode;
	}
	
	public function setCompanyName($sCompanyName){
		$this->sCompanyName = $sCompanyName;
	}
	
	public function getCompanyName(){
		return $this->sCompanyName;
	}
}