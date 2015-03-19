<?php
class CategoryL{
	private $nCategoryCodeL;
	private $sCategoryNameL;
	
	public function setCategoryCodeL($nCategoryCodeL){
		$this->nCategoryCodeL = $nCategoryCodeL;
	}
	
	public function getCategoryCodeL(){
		return $this->nCategoryCodeL;
	}
	
	public function setCategoryNameL($sCategoryNameL){
		$this->sCategoryNameL = $sCategoryNameL;
	}
	
	public function getCategoryNameL(){
		return $this->sCategoryNameL;
	}
	
	
}