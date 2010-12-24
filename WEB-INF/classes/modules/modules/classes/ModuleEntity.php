<?php


/**
 * Skeleton subclass for representing a row from the 'modules_entity' table.
 *
 * Entidades de modulos
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.modules.classes
 */
class ModuleEntity extends BaseModuleEntity {

	public function getId() {
		return $this->getName();
	}

	/**
	* Obtiene el nombre de la entidad a la que pertenece
	*
	*	@return string Nombre de la entidad a la que pertenece
	*/
	public function getAllEntityFields(){
		return $this->getModuleEntityFieldsRelatedByEntityName();
	}

	public function getEntityFieldsNoPrimaryKey(){
		$criteria = new Criteria();
		$criteria->add(ModuleEntityFieldPeer::ISPRIMARYKEY,false,Criteria::EQUAL);
		return $this->getModuleEntityFieldsRelatedByEntityName($criteria);
	}

	public function getEntityFieldsWithForeignKey(){
		$criteria = new Criteria();
		$criterion = $criteria->getNewCriterion(ModuleEntityFieldPeer::FOREIGNKEYREMOTE,null,Criteria::NOT_EQUAL);
		$criterion->addAnd($criteria->getNewCriterion(ModuleEntityFieldPeer::FOREIGNKEYREMOTE,0,Criteria::NOT_EQUAL));
		$criteria->addAnd($criterion);
		return $this->getModuleEntityFieldsRelatedByEntityName($criteria);
	}

	public function getEntityFieldsWithUnique(){
		$criteria = new Criteria();
		$criteria->add(ModuleEntityFieldPeer::UNIQUE,true,Criteria::EQUAL);
		return $this->getModuleEntityFieldsRelatedByEntityName($criteria);
	}

	public function getTableName() {
		return $this->getModuleName().'_'.$this->getName();
	}

	public function getSchema() {
		$schema = "<tables>\n";
		$schema .= $this->getTableSchema();
		if ($this->getSaveLog()) {
			$schema .= $this->getTableSchema(true);
		}
		$schema .= "</tables>\n";
		return $schema;
	}

	public function getSql() {
		$sql = "#".$this->getName()."\n";
		$sql .= "delete from modules_entity where name = '".$this->getName()."';\n";
		$sql .= "insert into modules_entity (moduleName, name, phpName, description, softDelete, relation, saveLog, nestedset, scopeFieldUniqueName) ";
		$sql .= "values ('".$this->getModuleName()."','".$this->getName()."','".$this->getPhpName()."','".$this->getDescription."','".$this->getSoftDelete();
		$sql .= "','".$this->getRelation()."','".$this->getSaveLog()."','".$this->getNestedset()."','".$this->getScopeFieldUniqueName()."');\n";
		foreach ($this->getAllEntityFields() as $field) {
			$sql .= $field->getSql();
		}
		return $sql;
	}	
	
	public function setObjectFromSchemaInfo($attributes) {

		$this->setName($attributes["name"]);
		$this->setPhpName($attributes["phpName"]);
		$this->setDescription($attributes["description"]);
		if (!empty($attributes["isCrossRef"]) && $attributes["isCrossRef"] == "true")
			$this->setRelation(true);
	}

	public function addForeignKey($foreign) {
		$fieldName = $foreign["_c"]["reference"]["_a"]["local"];
		$foreignFieldName = $foreign["_c"]["reference"]["_a"]["foreign"];
		$foreignTable = $foreign["_a"]["foreignTable"];
		$criteria = new Criteria();
		$criteria->add(ModuleEntityFieldPeer::NAME,$fieldName);
		$criteria->add(ModuleEntityFieldPeer::ENTITYNAME,$this->getName());
		$field = ModuleEntityFieldPeer::doSelectOne($criteria);
		$criteria = new Criteria();
		$criteria->add(ModuleEntityPeer::NAME,$foreignTable);
		$entityRelated = ModuleEntityPeer::doSelectOne($criteria);
		if (!empty($entityRelated)) {
			$field->setForeignKeyTable($entityRelated->getName());
			$criteria = new Criteria();
			$criteria->add(ModuleEntityFieldPeer::NAME,$foreignFieldName);
			$criteria->add(ModuleEntityFieldPeer::ENTITYNAME,$entityRelated->getName());
			$fieldRelated = ModuleEntityFieldPeer::doSelectOne($criteria);
			if (!empty($fieldRelated)) {
				$field->setForeignKeyRemote($fieldRelated->getUniqueName());
				$field->save();
			} else {
				echo "FIELD RELATED NOT FOUND: ".$foreignTable."-".$foreignFieldName;
			}
		} else {
			echo "ENTITY RELATED NOT FOUND: ".$foreignTable;
		}
	}

	public function getTableSchema($log=false) {

		if (!$log) {
			$schema = "\n".'	<table name="'.$this->getTableName().'" phpName="'.$this->getPhpName().'" description="'.$this->getDescription().'"';

			if ($this->getRelation()) {
				$schema .= ' isCrossRef="true"';
			}

			$schema .= ">\n";
		} else {
			$schema = "\n".'	<table name="'.$this->getTableName().'Log" phpName="'.$this->getPhpName().'Log" description="Log '.$this->getDescription().'">'."\n";
		}



		if (!$log) {
			foreach ($this->getAllEntityFields() as $field) {
				$schema .= '		'.$field->getSchema()."\n";
			}
		} else {
			$schema .= '<column name="id" required="true" primaryKey="true" type="INTEGER" description="Log Id" autoIncrement="true" />'."\n";
			$schema .= '<column name="'.$this->getName().'Id" required="true" type="INTEGER" description="'.$this->getPhpName().' Id" />'."\n";
			foreach ($this->getEntityFieldsNoPrimaryKey() as $field) {
				$schema .= '		'.$field->getSchema()."\n";
			}
		}

		if (!$log) {
			foreach ($this->getEntityFieldsWithUnique() as $field) {
				$schema .= "		<unique>\n";
				$schema .= '			<unique-column name="'.$field->getName().'" />'."\n";
				$schema .= "		</unique>\n";
			}
		}

		if (!$log && $this->getNestedSet()) {
			$scopeField = $this->getModuleEntityFieldRelatedByScopefieldid();

			$schema .= '		<behavior name="nested_set">'."\n";
			if (!empty($scopeField)) {
				$schema .= '			<parameter name="use_scope" value="true" />'."\n";
				$schema .= '			<parameter name="scope_column" value="'.$scopeField->getName().'" />'."\n";
			}
			$schema .= '		</behavior>';
		}

		if (!$log && $this->getSoftDelete()) {
			$schema .= '		<behavior name="soft_delete" />'."\n";
		}

		if ($log) {
			$schema .= '		<foreign-key foreignTable="'.$this->getTableName().'">'."\n";
			$schema .= '			<reference local="'.$this->getName().'Id" foreign="id" />'."\n";
			$schema .= "		</foreign-key>\n";
		}

		foreach ($this->getEntityFieldsWithForeignKey() as $field) {
			$entityRelated = $field->getModuleEntityRelatedByForeignkeytable();
			$fieldRelated = $field->getModuleEntityFieldRelatedByForeignkeyremote();
			$schema .= '		<foreign-key foreignTable="'.$entityRelated->getTableName().'">'."\n";
			$schema .= '			<reference local="'.$field->getName().'" foreign="'.$fieldRelated->getName().'" />'."\n";
			$schema .= "		</foreign-key>\n\n";
		}

		$schema .= '		<vendor type="mysql">'."\n";
		$schema .= '			<parameter name="Charset" value="utf8" />'."\n";
		$schema .= '			<parameter name="Collate" value="utf8_general_ci" />'."\n";
		$schema .= "		</vendor>\n";

		$schema .= "	</table>\n\n";
		return $schema;
	}

	public function createFieldsFromParams($paramsFields) {
		for ($i=0;$i<count($paramsFields["name"]);$i++) {
			$params = array();
			foreach ($paramsFields as $key => $values) {
				if (!empty($values[$i])) {
					$params[$key] = $values[$i];	
				}
				
			}
			$params["entityName"] = $this->getName();
			$field = new ModuleEntityField();
			$field = Common::setObjectFromParams($field,$params);
			$field->save(); 
		}
	}

} // ModuleEntity
