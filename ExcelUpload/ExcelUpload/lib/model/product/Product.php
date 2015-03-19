<?php
class Product{
	private $nProCode;
	private $sProName;
	private $sProImgURL;
	private $nProMinPrice;
	private $sProDescription;
	private $nProPopular;
	private $nBrandCode;
	private $nCompanyCode;
	private $nCategoryCodeM;
	
	public function setProCode($nProCode){
		$this->nProCode=$nProCode;
	}
	
	public function getProCode(){
		return $this->nProCode;
	}
	
	public function setProName($sProName){
		$this->sProName = $sProName;
	}
	
	public function getProName(){
		$this->sProName;
	}
	
	public function setProImgURL($sProImgURL){
		$this->sProImgURL = $sProImgURL;
	}
	
	public function getProImgURL(){
		return $this->sProImgURL;
	}
	
	public function setProMinPrice($nProMinPrice){
		$this->nProMinPrice = $nProMinPrice;		
	}
	
	public function getProMinPrice(){
		return $this->nProMinPrice;
	}
	
	public function setProDescription($sProDescription){
		$this->sProDescription = $sProDescription;		
	}
	
	public function getProDescription(){
		return $this->sProDescription;
	}
	
	public function setProPopular($nProPopular){
		$this->nProPopular = $nProPopular;
	}
	
	public function getProPopular(){
		return $this->nProPopular;
	}
	
	public function setBrandCode($nBrandCode){
		$this->nBrandCode = $nBrandCode;
	}
	
	public function getBrandCode(){
		return $this->nBrandCode;
	}
	
	public function setCompanyCode($nCompanyCode){
		$this->nCompanyCode = $nCompanyCode;
	}
	
	public function getCompanyCode(){
		return $this->nCompanyCode;
	}
	
	public function setCategoryCodeM($nCategoryCodeM){
		$this->nCategoryCodeM = $nCategoryCodeM;
	}
	
	public function getCategoryCodeM(){
		return $this->nCategoryCodeM;
	}
}