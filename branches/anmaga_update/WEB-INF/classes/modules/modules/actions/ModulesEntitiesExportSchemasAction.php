<?php

require_once("xml2ary.php");

class ModulesEntitiesExportSchemasAction extends BaseAction {

	function ModulesEntitiesExportSchemasAction() {
		;
	}
	
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

		$module = "Modules";
		$smarty->assign("module",$module);
		$section = "Entities";
		$smarty->assign("section",$section);

		//Path a schemas
		$path = "WEB-INF/propel";
		$schemasFile = scandir($path);
		
		$schemas = Array();
		
		foreach ($schemasFile as $schema) {
			if (substr($schema, -3) == "xml") {
				$schemas[] = $schema; 
			}		
		}

		foreach ($schemas as $schema) {		
			$xml = file_get_contents($path."/".$schema);
			
			$xml2ary = new Xml2ary();
			$array = $xml2ary->getArray($xml);
			
			$tables = $array["database"]["_c"]["table"];
			$package = $array["database"]["_a"]["package"];
			$packageParts = explode(".",$package);
			$moduleName = $packageParts[0];
			
			foreach ($tables as $table) {
			//echo "TABLE:";print_r($table);
				//en estos casos es que hay info de una entity
				if (isset($table["_a"]) || !isset($table["column"])) {
					if (isset($table["_a"]))
						$attributes = $table["_a"];
					else
						$attributes = $table;						

					$entity = new ModuleEntity();
					$entity->setObjectFromSchemaInfo($attributes);
					$entity->setModuleName($moduleName);
					$entity->save();
						
				} 

				//en estos casos es que hay info de un entityField
				if (isset($table["_c"]) || isset($table["column"])) {
				
					if (isset($table["_c"]))
						$columns = $table["_c"]["column"];
					else
						$columns = $table["column"];	
					foreach ($columns as $column) {
						//print_r($column);
						$field = new ModuleEntityField();
						$field->setObjectFromSchemaInfo($column);
						$field->setEntityName($entity->getName());
						$field->setUniqueName($entity->getName()."_".$field->getName());
						$field->save();
					}
				}
			}	
		}

		foreach ($schemas as $schema) {	
			$xml = file_get_contents($path."/".$schema);
			
			$xml2ary = new Xml2ary();
			$array = $xml2ary->getArray($xml);
			
			$tables = $array["database"]["_c"]["table"];
			$package = $array["database"]["_a"]["package"];
			$packageParts = explode(".",$package);
			$moduleName = $packageParts[0];
					
			foreach ($tables as $table) {
	
				$foreigns = $table["_c"]["foreign-key"];
				
				if (!empty($foreigns)) {
					
					$criteria = new Criteria();
					$criteria->add(ModuleEntityPeer::NAME,$table["_a"]["name"]);
					$entities = ModuleEntityPeer::doSelect($criteria);
					$entity = $entities[0];			
					
					if (!empty($entity)) {
					
						if (!empty($foreigns["_a"])) {
							//Solo hay una foreign key
							$entity->addForeignKey($foreigns);
						} else {
							//hay varias
							foreach ($foreigns as $foreign) {
								$entity->addForeignKey($foreign);
							}
						}
					} else {
						
						echo "NO ENCUENTRA:".$table["_a"]["name"];
						
					}
				}
			}
		}

		return $mapping->findForwardConfig('success');
	}

}
