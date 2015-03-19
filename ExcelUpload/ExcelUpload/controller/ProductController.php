<?php
ini_set('memory_limit',-1);
header('Content-Type: text/html; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'].'/ExcelUpload/ExcelUpload/lib/ProductService.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ExcelUpload/ExcelUpload/exLib/PHPExcel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ExcelUpload/ExcelUpload/exLib/PHPExcel/IOFactory.php';

$oProductService = ProductService::getInstance();
$oProductDao = ProductDao::getInstance();

$sServername="localhost";
$sUsername="scott";
$sPassword="tiger";

$conn = new PDO("mysql:host=$sServername;dbname=mydb", $sUsername, $sPassword);
$oProductDao->setDbo($conn);

$oProductService->setProductDao($oProductDao);

$oProduct = new Product();
$oCompany = new Company();
$oCategoryL = new CategoryL();
$oCategoryM = new CategoryM();
$oBrand = new Brand();

$sUploaddir=$_SERVER['DOCUMENT_ROOT'].'/ExcelUpload/ExcelUpload/uploadFile/';
$sFileName=iconv("UTF-8", "EUC-KR",$_FILES['fileName']['name']);
$sFileLocation=$sUploaddir.basename($sFileName);
$sFileType = $_FILES['fileName']['type'];

 echo '<pre>';
if(strpos($sFileType,'excel') === false && strpos($sFileType,'sheet') === false && substr($sFileName,-4)!="xlsx" && substr($sFileName,-3) !="xls"){	
	echo "업로드 실패, 엑셀파일만 업로드 가능<br/>";
}else if(move_uploaded_file($_FILES['fileName']['tmp_name'], $sFileLocation)){	
	echo "파일유효, 업로드성공<br/>";
}else{
	print "파일업로드 실패<br/>";
}
echo "디버깅 정보";
print_r($_FILES);
print "</pre>"; 
 
  try{
	$oReader = PHPExcel_IOFactory::createReaderForFile($sFileLocation);
	$oReader->setReadDataOnly(true);
	$oExcel=$oReader->load($sFileLocation);
	$oExcel->setActiveSheetIndex(0);
	$oWorksheet=$oExcel->getActiveSheet();
	$rowIterator=$oWorksheet->getRowIterator();
	
	foreach($rowIterator as $row){
		$cellIterator=$row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(false);
	}
	
	$maxRow = $oWorksheet->getHighestRow();	

	$aCategoryNameL = array();
	$aCategoryNameM = array();
	$aCompanyName = array();
	$aBrandName = array();
	$aProName = array();
	$aProMinPrice = array();
	$aProDescription =array();
	$aProPopular = array();
	$aProImgURL =array();	
	$aProductList = array();
	
	for($i=2; $i<=$maxRow; $i++){
		$aCategoryNameL[] = $oWorksheet->getCell('B'.$i)->getValue();
		$aCategoryNameM[] = $oWorksheet->getCell('C'.$i)->getValue();
		$aCompanyName[] = $oWorksheet->getCell('F'.$i)->getValue();
		$aBrandName[] = $oWorksheet->getCell('G'.$i)->getValue();
		$aProName[] = $oWorksheet->getCell('H'.$i)->getValue();
		$aProMinPrice[] = $oWorksheet->getCell('I'.$i)->getValue();
		$aProDescription[] = $oWorksheet->getCell('J'.$i)->getValue();
		$aProPopular[] = $oWorksheet->getCell('K'.$i)->getValue();
		$aProImgURL[] = $oWorksheet->getCell('L'.$i)->getValue();		
	}			
	
	asort($aCategoryNameL);
	asort($aCompanyName);
	asort($aBrandName);;
	asort($aCategoryNameM);		
	
	
	/*대분류 insert*/
	$aCategoryListL = array();
 	foreach (array_unique($aCategoryNameL) as $kCategoryNameL=>$vCategoryNameL){
		$oCategoryL->setCategoryNameL($vCategoryNameL);
		$aCategoryListL[] = $vCategoryNameL;
		$bChkInCategoryL = $oProductService->insertCategoryL($oCategoryL);		
	} 	
	echo 'CategoryNameL insert : ' . $bChkInCategoryL . '<br/>';	
	
	/*제조사 insert*/
	$aCompanyList = array();
	foreach (array_unique($aCompanyName) as $kCompanyName=>$vCompanyName){
		$oCompany->setCompanyName($vCompanyName);
		$aCompanyList[] = $vCompanyName;
		$nChkInCompanyName = $oProductService->insertCompany($oCompany);		
	}
	echo 'CompanyName insert : ' . $nChkInCompanyName . '<br/>';
	
	/*브랜드 insert*/
	$aBrandList = array();
	foreach (array_unique($aBrandName) as $kBrandName=>$vBrandName){
		$oBrand->setBrandName($vBrandName);
		$aBrandList = $vBrandName;
		$nChkInBrand= $oProductService->insertBrand($oBrand);		
	} 
	echo 'BrandName insert : ' . $nChkInBrand . '<br/>';
	
	//asort($aCategoryListM);
	/*중분류 insert*/
	$aCategoryListM = array();
	for($i=0; $i<count($aCategoryListL); $i++){
		for($i2=0; $i2<$maxRow; $i2++){
			if($aCategoryListL[$i]==$aCategoryNameL[$i2]){
				$aCategoryListM[$aCategoryNameM[$i2]] = $aCategoryNameL[$i2];
			}
		}
	}
		
	//$kCategoryM:중분류 $vCategoryL:대분류
	ksort($aCategoryListM);
	foreach ($aCategoryListM as $kCategoryM=>$vCategoryL){		
		$oCategoryM->setCategoryNameM($kCategoryM);
		$bChkInCategoryM = $oProductService->insertCategoryM($kCategoryM, $vCategoryL);
	}
	echo 'CategoryNameM insert : ' . $bChkInCategoryM . '<br/>';
	print_r($aCategoryListM);
	
	/*상품 insert*/
	for($i=0; $i<$maxRow; $i++){
		
		
	}
	
	
	
	/*상품리스트 출력*/
	
	
	

}
catch(Exception $e){
	echo "엑셀파일을 읽는 도중 오류가 발생하였습니다.";
	print_r($e);
}





