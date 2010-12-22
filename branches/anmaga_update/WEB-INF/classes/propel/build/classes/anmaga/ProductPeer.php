<?php

// The parent class
require_once 'om/BaseProductPeer.php';

// The object class
include_once 'Product.php';

/**
 * Class ProductPeer
 *
 * @package Product
 */
class ProductPeer extends BaseProductPeer {

	private $searchParentNodeId;
	private $searchPriceFrom;
	private $searchPriceTo;
	private $searchByCode;

	/**
	* Obtiene la cantidad de filas por pagina por defecto en los listado paginados.
	*
	* @return int Cantidad de filas por pagina
	*/
	function getRowsPerPage() {
		global $system;
		return $system["config"]["system"]["rowsPerPage"];
	}

  /**
  * Crea un product nuevo.
  *
  * @param string $code code del product
  * @param string $name name del product
  * @param string $description description del product
  * @param float $price price del product
  * @param array $image image del product
  * @param integer $parentNodeId Id del nodo padre
  * @param integer $unitId Id de la unidad
  * @param integer $measureUnitId Id de la unidad de medida
  * @param string $orderCode orderCode del product  
  * @param integer $salesUnit Unidad de venta, 1 por defecto
  * @return int Id del nodo creado
	*/
	function create($code,$name,$description,$price,$image,$parentNodeId=0,$unitId,$measureUnitId,$orderCode=null,$salesUnit=1) {
    try {
			$productObj = new Product();
			$productObj->setCode($code);
			if (!empty($orderCode))
				$productObj->setOrderCode($orderCode);
			$productObj->setDescription($description);
			$productObj->setPrice($price);
			$productObj->setUnitId($unitId);
			$productObj->setMeasureUnitId($measureUnitId);
			if (!empty($salesUnit))			
				$productObj->setSalesUnit($salesUnit);
			$productObj->save();
			
			if (!empty($image['tmp_name'])) {
				ProductPeer::createImages($image,$productObj->getId());
			}

	    require_once("NodePeer.php");
  	  return NodePeer::create($name,"Product",$productObj->getId(),$parentNodeId,0);
  	}
		catch (PropelException $e) {
			return false;
		}
	}
	
	/**
	* Chequea el tamaño y formato de la imagen.
	*
	* @param array $image Imagen
	* @return boolean true si es valida
	*/
	function checkImage($image) {
		global $system;
		if ( filesize($image['tmp_name']) <= $system["config"]["catalog"]["image"]["maxSize"]) {
			$parts = split('/',$image['type']);
			$format = $parts[1];
			$formats = $system["config"]["catalog"]["image"]["formats"];
			$valid = false;
			foreach( $formats as $ext => $value )
			{
				if ($value["value"] == "YES" && $ext == $format)
					$valid = true;
			}
			return $valid;
		}	
		else
			return false;
	}
	
	/**
	* Copia la imagen del producto y crea el thumbnail.
	*
	* @param array $image Imagen
	* @param string $name Nombre 
	* @return void
	*/	
	function createImages($image,$name) {		
		
		if (ProductPeer::checkImage($image)) {
			$uploadFile = 'WEB-INF/products/' . $name;
			move_uploaded_file($image['tmp_name'], $uploadFile);	
		
			global $system;	
			$width = $system["config"]["catalog"]["image"]["thumbnail"]["width"];
			$height = $system["config"]["catalog"]["image"]["thumbnail"]["height"];
			$resizeFormat = $system["config"]["catalog"]["image"]["thumbnail"]["resizeFormat"];
			
			$file = $uploadFile;
			list($actualWidth, $actualHeight) = getimagesize($file);
			
			switch ($resizeFormat) {
				case "1":
					$newWidth = $width;
					$newHeight = $height;
					break;
				case "2":
					$newHeight = $height;
					$perc = $newHeight / $actualHeight;
					$newWidth = $actualWidth * $perc;
					break;
				case "3":
					$newWidth = $width;
					$perc = $newWidth / $actualWidth;
					$newHeight = $actualHeight * $perc;			
					break;							
			}

			$tn = imagecreatetruecolor($newWidth, $newHeight);
			
			switch ($image['type']) {
				case "image/jpeg":
					$newImage = imagecreatefromjpeg($file);
					break;
				case "image/png":
					$newImage = imagecreatefrompng($file);
					break;				
			}
			
			imagecopyresampled($tn, $newImage, 0, 0, 0, 0, $newWidth, $newHeight, $actualWidth, $actualHeight);
			
			imagejpeg($tn, $uploadFile."_t0", 100); 	
		}
	
	}
	
  /**
  * Crea un product nuevo, reemplazando al producto de igual codigo, si existia.
  *
  * @param string $code code del product
  * @param string $name name del product
  * @param string $description description del product
  * @param float $price price del product
  * @param array $image image del product
  * @param integer $parentNodeId Id del nodo padre
  * @param integer $unitId Id de la unidad  
  * @param integer $measureUnitId Id de la unidad de medida
  * @param string $orderCode orderCode del product    
  * @param integer $salesUnit Unidad de venta, 1 por defecto
  * @return int Id del nodo creado
	*/
	function createAndReplace($code,$name,$description,$price,$image,$parentNodeId=0,$unitId,$measureUnitId,$orderCode=null,$salesUnit=1) {
    try {
			$oldProduct = ProductPeer::getByCode($code);
			if (!empty($oldProduct))
				$productObj = $oldProduct;
			else
				$productObj = new Product();
  	  		$productObj->setCode($code);
			if (!empty($orderCode))
				$productObj->setOrderCode($orderCode);	  
			$productObj->setDescription($description);
			$productObj->setPrice($price);
			$productObj->setUnitId($unitId);
			$productObj->setMeasureUnitId($measureUnitId);
			if (!empty($salesUnit))			
				$productObj->setSalesUnit($salesUnit);
			$productObj->save();

			if (!empty($image['tmp_name'])) {
				ProductPeer::createImages($image,$productObj->getId());
			}

			if (!empty($oldProduct)) {
				$productObj->setActive(true);
				$productObj->save();
			  	$node = $productObj->getNode();
			  	$node->setName($name);
			  	$node->setParentId($parentNodeId);
			  	$node->save();
				return $node->getId();
			}
			else {
				require_once("NodePeer.php");
				return NodePeer::create($name,"Product",$productObj->getId(),$parentNodeId,0);
  		}
  	}
		catch (PropelException $e) {
			return false;
		}
	}


  /**
  * Actualiza la informacion de un product.
  *
  * @param int $id id del nodo del product
  * @param string $code code del product
  * @param string $name name del product
  * @param string $description description del product
  * @param float $price price del product
  * @param array $image image del product
  * @param integer $parentNodeId Id del nodo padre
  * @param integer $unitId Id de la unidad  
  * @param integer $measureUnitId Id de la unidad de medida    
  * @param string $orderCode orderCode del product    
  * @param integer $salesUnit Unidad de venta, 1 por defecto  
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$code,$name,$description,$price,$image,$parentNodeId=0,$unitId,$measureUnitId,$orderCode=null,$salesUnit=1) {
    require_once("NodePeer.php");
		$node = NodePeer::get($id);
		$node->setName($name);
		$node->setParentId($parentNodeId);
		$node->save();

  		$productObj = $node->getInfo();
    	$productObj->setcode($code);
		if (!empty($orderCode))
			$productObj->setOrderCode($orderCode);
	
		$productObj->setdescription($description);
		$productObj->setprice($price);
		$productObj->setUnitId($unitId);
		$productObj->setMeasureUnitId($measureUnitId);
		if (!empty($salesUnit))			
			$productObj->setSalesUnit($salesUnit);
		if (!empty($image['tmp_name'])) {
			ProductPeer::createImages($image,$productObj->getId());
		}
		$productObj->save();
		return true;
  }

	/**
	* Elimina un product a partir de los valores de la clave.
	*
  * @param int $id id del product
	*	@return boolean true si se elimino correctamente el product, false sino
	*/
  function delete($id) {
  	$productObj = ProductPeer::retrieveByPK($id);
    $productObj->setActive(false);
	$productObj->save();
		return true;
  }

	/**
	* Elimina todos los productos.
	*
	* @return void
	*/
  function deleteAll() {
  	$products = ProductPeer::getAll();
	foreach ($products as $productObj) {
    	$productObj->setActive(false);
		$productObj->save();
	}
	return;
  }

	/**
	* Elimina todos los productos.
	*
	* @param int $parentNodeId Id del nodo de la categoria padre
	* @return void
	*/
  function deleteAllByParentId($parentNodeId) {
	$cond = new Criteria();
	$cond->add(NodePeer::KIND, "Product");
	$cond->addJoin(NodePeer::OBJECTID, ProductPeer::ID);
	$cond->add(ProductPeer::ACTIVE, true);		
	$cond->add(NodePeer::PARENTID, $parentNodeId);
	$products = ProductPeer::doSelect($cond);
	foreach ($products as $productObj) {
    	$productObj->setActive(false);
		$productObj->save();
	}
	return;
  }

  /**
  * Obtiene la informacion de un product.
  *
  * @param int $id id del product
  * @return array Informacion del product
  */
  function get($id) {
		$productObj = ProductPeer::retrieveByPK($id);
    return $productObj;
  }

  /**
  * Obtiene todos los productos.
	*
	*	@return array Informacion sobre todos los products
  */
	function getAll() {
		$cond = new Criteria();
		$cond->add(ProductPeer::ACTIVE, true);
		$alls = ProductPeer::doSelect($cond);
		return $alls;
  }

  /**
  * Obtiene todos los productos con stock.
  *
  *	@return array Informacion sobre todos los products
  */
	function getAllWithStock() {
		$cond = new Criteria();
		$cond->add(ProductPeer::ACTIVE, true);
		//regla de negocio, aquellos productos de precio cero no tienen stock y no pueden ser comprados.
		$cond->add(ProductPeer::PRICE, 0, Criteria::NOT_EQUAL);
		$alls = ProductPeer::doSelect($cond);
		return $alls;
  }

  
  /**
  * Obtiene todos los productos paginados.
	*
	*	@return array Informacion sobre los productos
  */
	function getAllPaginated($page=1,$perPage=-1) {
		if ($perPage == -1)
			$perPage = 	ProductPeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->add(ProductPeer::ACTIVE, true);
		$cond->addAscendingOrderByColumn(ProductPeer::CODE);

		$pager = new PropelPager($cond,"ProductPeer", "doSelect",$page,$perPage);
		return $pager;
	 }
	 
  /**
  * Obtiene un producto en base a su codigo.
	*
	* @param string $code Codigo del producto
	*	@return Product Producto con el codigo pasado como parametro
  */
	function getByCode($code) {
		$cond = new Criteria();
		$cond->add(ProductPeer::CODE, $code);
		$alls = ProductPeer::doSelect($cond);
		return $alls[0];
  }

  /**
  * Obtiene un producto en base a su codigo, quitando los guiones de los codigos de los productos.
	*
	* @param string $code Codigo del producto
	*	@return Product Producto con el codigo pasado como parametro
  */
	function getByCodeModified($code) {
		$con = Propel::getConnection(ProductPeer::DATABASE_NAME);
		$sql = "SELECT * FROM ".ProductPeer::TABLE_NAME." WHERE REPLACE(code,'-','') = '".$code."'";
		$stmt = $con->createStatement();
		$rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		
		$objects = parent::populateObjects($rs);
		return $objects[0]; 		
  }
  
  /**
  * Obtiene un producto en base al codigo de producto del afiliado.
	*
	* @param int $affiliateId Id del Afiliado
	* @param string $code Codigo del producto
	*	@return Product Producto con el codigo pasado como parametro
  */
	function getByAffiliateProductCode($affiliateId,$code) {
		require_once("AffiliateProductCodePeer.php");
		$affiliateProductCode = AffiliateProductCodePeer::getByAffiliateAndCode($affiliateId,$code);
		if (empty($affiliateProductCode) || $affiliateProductCode->getProductCode() == 0)
			return false;
		else
			return $affiliateProductCode->getProduct();
	}  

	/**
	* Actualiza el precio de un producto.
	*
	* @param string $code Codigo del producto
	* @param int $price Nuevo Precio
	* @return boolean true si se actualizo la informacion correctamente, false sino
	*/
	function updatePrice($code,$price) {
		$product = ProductPeer::getByCode($code);

		global $system;
		
		$decimalSeparator = $system['config']['system']['parameters']['decimalSeparator'];

		if (!empty($product)) {

	/*		if ($decimalSeparator == ',') {
				//saco los . por ser posibles separadores de miles
				$price = str_replace('.','',$price);  
				//reemplazo la , del separador decimal por .
				$price = str_replace(',','.',$price);				
			}
	*/		$product->setPrice($price);
			$product->save();
			return true;
		}
		return false;
	}

  function doImportPrices($filename) {

      $archive = array();
      $rowsReaded = 0;
      $rowsCreated = 0;
      $errorCodes = array();
      $handle = fopen($filename, "r");
      $separator = ",";

      $data = fgetcsv($handle, 1000, $separator);

      if (stripos($data[0],';') !== false) {
              $semicolonSeparator = true;
              $separator = ";";
      }			

      //me posiciono al principio del archivo
      fseek($handle,0);

      //lee todo el archivo
      while (($data = fgetcsv($handle, 1000, $separator)) !== FALSE) {

              //si el ; es el separador, debo reformatear los numeros
              if ($semicolonSeparator) {
                      //saco los .
                      $data[1] = str_replace('.','',$data[1]);  
                      //reemplazo la , por .
                      $data[1] = str_replace(',','.',$data[1]);				
              }
              
              $archive[] = $data;
              $rowsReaded++;                       
      }
      
      fclose($handle); 

      if ($rowsReaded > 0) { 
//              AffiliateProductPeer::deletePrices($this->getId());				

              //procesamiento de filas de datos		
              foreach ($archive as $row) {
                      if (ProductPeer::updatePrice($row[0],$row[1])!= false) {
                              $rowsCreated++;
                      }
                      else {
                              $errorCodes[] = $row[0];
					  }

              }	
      }

      $result = array("rowsReaded" => $rowsReaded, "rowsCreated" => $rowsCreated, "errorCodes" => $errorCodes);
      
      return $result;
	
  }
  
  function setSearchParentNodeId($parentNodeId) {
  	$this->searchParentNodeId = $parentNodeId;
  }
  
  function setSearchPriceFrom($priceFrom) {
  	$this->searchPriceFrom = $priceFrom;
  }

  function setSearchPriceTo($priceTo) {
  	$this->searchPriceTo = $priceTo;
  }

  function setSearchByCode($productCode) {
  	$this->searchByCode = $productCode;
  }


  /**
  * Obtiene todos los productos paginados.
	*
	*	@return array Informacion sobre los productos
  */
	function getAllNodesPaginated($page=1,$perPage=-1) {
		if ($perPage == -1)
			$perPage = 	ProductPeer::getRowsPerPage();
		if (empty($page))
			$page = 1;
		require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->add(NodePeer::KIND, "Product");
		$cond->addJoin(NodePeer::OBJECTID, ProductPeer::ID);
		$cond->add(ProductPeer::ACTIVE, true);
		
    if (!empty($this->searchParentNodeId))
			$cond->add(NodePeer::PARENTID, $this->searchParentNodeId);

    if (!empty($this->searchByCode))
			$cond->add(ProductPeer::CODE,"%".$this->searchByCode."%",Criteria::LIKE);

    if ( !empty($this->searchPriceFrom) || !empty($this->searchPriceTo) ) {    	
    	if ( !empty($this->searchPriceFrom) ) {
				$criterion = $cond->getNewCriterion(ProductPeer::PRICE, $this->searchPriceFrom, Criteria::GREATER_EQUAL);
			}
    	if ( !empty($this->searchPriceTo) ) {
      	if (!empty($criterion))
      		$criterion->addAnd($cond->getNewCriterion(ProductPeer::PRICE, $this->searchPriceTo, Criteria::LESS_EQUAL));
        else
        	$criterion = $cond->getNewCriterion(ProductPeer::PRICE, $this->searchPriceTo, Criteria::LESS_EQUAL);
     	}
      $cond->add($criterion);
    }

		$pager = new PropelPager($cond,"NodePeer", "doSelect",$page,$perPage);
		return $pager;
	 }
	
	/**
	* Obtiene todos los productos.
	*
	* @return array Informacion sobre los productos
	*/
	function getAllNodes() {
		$cond = new Criteria();
		$cond->add(NodePeer::KIND, "Product");
		$cond->addJoin(NodePeer::OBJECTID, ProductPeer::ID);
		$cond->add(ProductPeer::ACTIVE, true);		
		return NodePeer::doSelect($cond);
	 }	

}
