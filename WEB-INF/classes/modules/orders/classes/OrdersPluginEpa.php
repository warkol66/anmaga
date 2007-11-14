<?php


class OrdersImportPlugin {

	/*
	* Obtiene el separador de campos.
	*
	* @return string Separador de campo utilizado
	*/
	function getSeparator() {
		return ";";
	}

	/*
	* Obtiene las ordenes en un formato comun.
	*
	* @param array $rows Ordenes leidas del archivo de importacion
	* @return array Ordenes en formato comun
	*/	
	function getOrders($rows) {

						
		/*
			formato download.csv
			01 Encabezado
			detalle o encabezado; Nro de pedido; Fecha del pedido; Fecha ; Fecha; Razón social; Responsable; email responsable; Empresa provedora; Nro Proveedor; Sucursal; Código Sucursal; Dirección Sucursal;  Tipo de PEdido;
			02 Detalle
			detalle o encabezado; Nro de pedido; código de producto; descripcion; código anmaga; Cantidad; Unidad; Total; Unidades por empaque; no se;Precio por unidad; total					
		*/
		$orders = array();
		foreach ($rows as $row) {
			if ($row[0] == "1") { //Es un encabezado
				if ( !empty($row[1]) && !empty($row[2]) && !empty($row[11]) ) {
					$order = array();
					$order["number"] = $row[1];
					$order["total"] = $row[19];
					$order["tax"] = $row[18];
					$order["subtotal"] = $row[17];
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
		
		return $orders;
	}
	
	/*
	* Obtiene las ordenes en un formato comun a partir de un archivo de ordenes.
	*
	* @param string $file Nombre del archivo de ordenes
	* @return array Ordenes en formato comun
	*/		
	function getOrdersFromFile($file) {
		
		$handle = fopen($file, "r");    
		$rows = array();
		$separator = OrdersImportPlugin::getSeparator();
		while (($data = fgetcsv($handle, 1000, $separator)) !== FALSE) {
					$rows[] = $data;
		}
		fclose($handle);  	

		$orders = OrdersImportPlugin::getOrders($rows); 				
		return $orders;
	}	
	
}