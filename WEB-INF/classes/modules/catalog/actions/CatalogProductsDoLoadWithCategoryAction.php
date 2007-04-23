<?php

require_once("BaseAction.php");
require_once("ProductPeer.php");
require_once("ProductCategoryPeer.php");

class CatalogProductsDoLoadWithCategoryAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function CatalogProductsDoLoadWithCategoryAction() {
		;
	}


	// ----- Public Methods ------------------------------------------------- //

	/**
	* Process the specified HTTP request, and create the corresponding HTTP
	* response (or forward to another web component that will create it).
	* Return an <code>ActionForward</code> instance describing where and how
	* control should be forwarded, or <code>NULL</code> if the response has
	* already been completed.
	*
	* @param ActionConfig		The ActionConfig (mapping) used to select this instance
	* @param ActionForm			The optional ActionForm bean for this request (if any)
	* @param HttpRequestBase	The HTTP request we are processing
	* @param HttpRequestBase	The HTTP response we are creating
	* @public
	* @returns ActionForward
	*/
	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

    $modulo = "Catalog";
		$section = "Products";

		$loaded = 0;

		if (!empty($_FILES["csv"])) {

			$handle = fopen($_FILES["csv"]["tmp_name"], "r");    
			$products = array();
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
						$products[] = $data;
			}
			fclose($handle);

			foreach ($products as $product) {
				//solo cargo si son 4 o mas elementos
				if (count($product) > 3) {
					$category = ProductCategoryPeer::getByName($product[4]);
					if (!empty($category))
						$parentNodeId = $category->getId();
					else
						$parentNodeId = 0;
        	if ( ProductPeer::create($product[0],$product[1],$product[2],$product[3],null,$parentNodeId) > 0 )
        		$loaded++;
				}
			}

		}

    $myRedirectConfig = $mapping->findForwardConfig('success');
    $myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&loaded='.$loaded;
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
    return $fc;
	}

}
?>
