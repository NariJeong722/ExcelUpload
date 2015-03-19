<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ExcelUpload/ExcelUpload/lib/model/product/Product.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ExcelUpload/ExcelUpload/lib/model/category/CategoryL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ExcelUpload/ExcelUpload/lib/model/category/CategoryM.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ExcelUpload/ExcelUpload/lib/model/company/Company.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ExcelUpload/ExcelUpload/lib/model/brand/Brand.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ExcelUpload/ExcelUpload/lib/dao/ProductDao.php';


class ProductService{
	private static $oProductService;
		
	private $oProductDao;
	
	public static function getInstance(){
		if(!isset(ProductService::$oProductService)){
			ProductService::$oProductService = new ProductService();
		}
		return ProductService::$oProductService;
	}
	
	public function setProductDao(ProductDao $oProductDao){
		$this->oProductDao = $oProductDao;
	}	
 	
	public function insertCategoryL(CategoryL $oCategoryL){
		try {
			$bChkInCategotyL = $this->oProductDao->insertCategoryL($oCategoryL);
		} catch (Exception $e) {
			echo '***ProductService::insertCategoryL : ' . $e;
		}
		return $bChkInCategotyL;
	}
	
	public function insertCompany(Company $oCompany){
		try {
			$bChkInBrand= $this->oProductDao->insertCompany($oCompany);
		} catch (Exception $e) {
			echo '***ProductService::insertCompany : ' . $e;
		}
		return $bChkInBrand;
	}
	
	public function insertBrand(Brand $oBrand){
		try {
			$bChkInBrand = $this->oProductDao->insertBrand($oBrand);
		} catch (Exception $e) {
			echo '***ProductService::insertBrand : ' . $e;
		}
		return $bChkInBrand;
	}
	
 	public function insertCategoryM($sCategoryNameM, $sCategoryNameL){
		try {
			$bChkInCategotyM = $this->oProductDao->insertCategoryM($sCategoryNameM, $sCategoryNameL);
		} catch (Exception $e) {
			echo '***ProductService::insertCategoryM : ' . $e;
		}
		return $bChkInCategotyM;
	}	 
	
}