<?php
class Brand{
	private $nBrandCode;
	private $sBrandName;
	
	public function setBrandCode($nBrandCode){
		$this->nBrandCode= $nBrandCode;
	}
	
	public function getBrandCode(){
		return $this->nBrandCode;
	}
	
	public function setBrandName($sBrandName){
		$this->sBrandName = $sBrandName;
	}
	
	public function getBrandName(){
		return $this->sBrandName;
	}
}