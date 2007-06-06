<?php

require_once("BaseAction.php");
require_once("OrderPeer.php");
require_once("OrderItemPeer.php");
require_once("AffiliatePeer.php");

class OrdersDoImportAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function OrdersDoImportAction() {
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

		$module = "Orders";
    	$smarty->assign("module",$module);
		
		if (!empty($_SESSION["loginUser"])) {
			$affiliateId = $_POST["affiliateId"];
			$affiliate = AffiliatePeer::get($affiliateId);
			$user = $affiliate->getOwner();
		}	
		else {
			$affiliateId = $_SESSION["loginUserByAffiliate"]->getAffiliateId();
			$affiliate = AffiliatePeer::get($affiliateId);
			$user = $_SESSION["loginUserByAffiliate"];			
		}		
				
		
		$affiliateName = $affiliate->getName();
		
		switch ($affiliateName) {
			case "EPA":			
				$affiliateType = 1;
				break;		
			case "Makro":
				$affiliateType = 2;
				break;
		}
		
		$affiliateType = 1;
		
		switch ($affiliateType) {
			case 1:
				$separator = ";";
				break;
			case 2:
				$separator = ",";
				break;
			default:
				$separator = ",";
		} 		

		$loaded = 0;

		if (!empty($_FILES["csv"])) {

			$handle = fopen($_FILES["csv"]["tmp_name"], "r");    
			$rows = array();
			while (($data = fgetcsv($handle, 1000, $separator)) !== FALSE) {
						$rows[] = $data;
			}
			fclose($handle);  
			
			$orders = array();
			$items = array();			
			
			//print_r($rows);
			
			switch ($affiliateType) {
				case 1: 
				/*
					formato download.csv
					01 Encabezado
					detalle o encabezado; Nro de pedido; Fecha del pedido; Fecha ; Fecha; Razón social; Responsable; email responsable; Empresa provedora; Nro Proveedor; Sucursal; Código Sucursal; Dirección Sucursal;  Tipo de PEdido;
					02 Detalle
					detalle o encabezado; Nro de pedido; código de producto; descripcion; código anmaga; Cantidad; Unidad; Total; Unidades por empaque; no se;Precio por unidad; total					
				*/
					foreach ($rows as $row) {
						if ($row[0] == "1") { //Es un encabezado
							if ( !empty($row[1]) && !empty($row[2]) && !empty($row[11]) ) {
								$order = array();
								$order["number"] = $row[1];
								$order["created"] = $row[2];
								$order["branchNumber"] = $row[11];
								$order["modifiedProductCodes"] = false;
								$orders[$order["number"]] = $order;
							}							
						}
						if ($row[0] == "2") { //Es un detalle
							if ( !empty($row[1]) && !empty($row[4]) && !empty($row[7]) && !empty($row[10]) ) {
								$item = array();
								$item["orderNumber"] = $row[1];
								$item["productCode"] = str_pad($row[4], strlen($row[4])+1, "0", STR_PAD_LEFT);
								$item["quantity"] = $row[7];
								$item["price"] = $row[10];
								$orders[$item["orderNumber"]]["items"][] = $item;
							}							
						}						
					}
					break;
				case 2: 
				/*
					formato orders_V....csv
					Nro,Tipo,Nro Prov,Nro Suc Prov,Tienda,Estado,Emision,Entrega,Planific Entrega,PlanificaciÃ³n,Import,Total Import,Cant Total,Cant Pallet,Cant Camadas,Cod Art Prov,Cod Art Makro,Cant Recebida,Cant Pedida,1era Compra,Costo,Costo Neto,Folder
				*/					
					$first = true;
					foreach ($rows as $row) {
						if ( $first && !empty($row[0]) && is_numeric($row[0]) && !empty($row[6]) && !empty($row[4]) ) {
							$order = array();
							$order["number"] = $row[0];
							$order["created"] = $row[6];
							$order["branchNumber"] = $row[4];
							$order["modifiedProductCodes"] = true;
							$orders[$order["number"]] = $order;
							$first = false;
						}							
						if ( !$first && !empty($row[0]) && !empty($row[15]) && !empty($row[18]) && !empty($row[21]) ) {
							$item = array();
							$item["orderNumber"] = $row[0];
							$item["productCode"] = str_pad($row[15], strlen($row[15])+1, "0", STR_PAD_LEFT);
							$item["quantity"] = $row[18];
							$item["price"] = $row[21];
							$orders[$item["orderNumber"]]["items"][] = $item;
						}												
					}				
					break;
				default: 
			}
     	}
		
		//print_r($orders);die;
		$results = OrderPeer::createFromArray($orders,$user);

    	$myRedirectConfig = $mapping->findForwardConfig('success');
    	$myRedirectPath = $myRedirectConfig->getpath();
		$queryData = '&results[ordersCreated]='.$results["ordersCreated"].'&results[ordersNotCreated]='.$results["ordersNotCreated"].'&results[productsFound]='.$results["productsFound"].'&results[productsNotFound]='.$results["productsNotFound"];
		$myRedirectPath .= $queryData;
		$fc = new ForwardConfig($myRedirectPath, True);
    	return $fc;
	}

}
?>
