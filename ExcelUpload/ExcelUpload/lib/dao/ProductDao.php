<?php
class ProductDao{
	private static $oProductDao;
	
	private $oDbo;
	
	public static function getInstance(){
		if(!isset(ProductDao::$oProductDao)){
			ProductDao::$oProductDao = new ProductDao();
		}
		return ProductDao::$oProductDao;
	}
	
	public function setDbo($oDbo){
		$this->oDbo = $oDbo;
		$oDbo->beginTransaction();
		$oDbo->query("SET NAMES utf8");
	}	
	
	public function insertCategoryL(CategoryL $oCategoryL){
		try {
			$query = '
				   INSERT
				   INTO  
				   tCategoryL (sCategoryNameL)
				   VALUES(:sCategoryNameL)
			';
			
			$stmt = $this->oDbo->prepare($query);
			if($oCategoryL->getCategoryNameL()!=null){
				$stmt->bindParam(':sCategoryNameL',$oCategoryL->getCategoryNameL(),PDO::PARAM_STR);
			}
						
			$bChkInCategotyL=TRUE;
			
			if($stmt->execute() === FALSE){
				$error = $stmt->errorInfo();
				$bChkInCategotyL=FALSE;
				throw new PDOException();
			}
			
		} catch (Exception $e) {
			echo '[' . $error[0] . '] ' . ' [' .$error[1] . '] ' . ' [' . $error[2] . '] ' ;
		}
		
		return $bChkInCategotyL;		
	}
	
	public function insertCompany(Company $oCompany){
		try {
			$query = '
				   INSERT
				   INTO
				   tCompany (sCompanyName)
				   VALUES(:sCompanyName)
			';
				
			$stmt = $this->oDbo->prepare($query);
			
			if($oCompany->getCompanyName()!=null){
				$stmt->bindParam(':sCompanyName',$oCompany->getCompanyName(),PDO::PARAM_STR);
			}
			
			$bChkInCompany=TRUE;
				
			if($stmt->execute() === FALSE){
				$error = $stmt->errorInfo();
				$bChkInCompany=FALSE;
				throw new PDOException();
			}
				
		} catch (Exception $e) {
			echo '[' . $error[0] . '] ' . ' [' .$error[1] . '] ' . ' [' . $error[2] . '] ' ;
		}
	
		return $bChkInCompany;
	}
	
	public function insertBrand(Brand $oBrand){
		try {
			$query = '
				   INSERT
				   INTO
				   tBrand (sBrandName)
				   VALUES(:sBrandName)
			';
				
			$stmt = $this->oDbo->prepare($query);
			
			if($oBrand->getBrandName() != null){
				$stmt->bindParam(':sBrandName',$oBrand->getBrandName(),PDO::PARAM_STR);
			
				$bChkInBrand=TRUE;
				
				if($stmt->execute() === FALSE){
					$error = $stmt->errorInfo();
					$bChkInBrand=FALSE;
					throw new PDOException();
				}
			}							
				
		} catch (Exception $e) {
			echo '[' . $error[0] . '] ' . ' [' .$error[1] . '] ' . ' [' . $error[2] . '] ' ;
		}
	
		return $bChkInBrand;
	}
	

 	public function insertCategoryM($sCategoryNameM, $sCategoryNameL){
		try {
			$query = '
					INSERT
					INTO tCategoryM (sCategoryNameM, nCategoryCodeL)
					VALUES (:sCategoryNameM,
											(SELECT nCategoryCodeL 
											 FROM tCategoryL
											 WHERE sCategoryNameL=:sCategoryNameL))
			';
			
			$stmt = $this->oDbo->prepare($query);
				
			if($oCategoryM != null){
				$stmt->bindParam(':sCategoryNameM', $sCategoryNameM, PDO::PARAM_STR);
				$stmt->bindParam(':sCategoryNameL', $sCategoryNameL, PDO::PARAM_STR);
					
				$bChkInCategotyM=TRUE;
			
				if($stmt->execute() === FALSE){
					$error = $stmt->errorInfo();
					$bChkInCategotyM=FALSE;
					throw new PDOException();
				}
			}
		} catch (Exception $e) {
			echo '[' . $error[0] . '] ' . ' [' .$error[1] . '] ' . ' [' . $error[2] . '] ' ;
		}
		
		return $bChkInCategotyM;
	} 
	
	
}