<?php
class CategoryM{
	private $nCategoryCodeM;
	private $sCategoryNameM;
	
	public function setCategoryCodeM($nCategoryCodeM){
		$this->nCategoryCodeM = $nCategoryCodeM;
	}
	
	public function getCategoryCodeM(){
		return $this->nCategoryCodeM;
	}
	
	public function setCategoryNameM($sCategoryNameM){
		$this->sCategoryNameM = $sCategoryNameM;
	}
	
	public function getCategoryNameM(){
		return $this->sCategoryNameM;
	}
	
	
}