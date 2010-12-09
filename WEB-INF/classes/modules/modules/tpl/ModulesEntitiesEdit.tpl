<h2>Configuración del Sistema</h2>
<h1>Administración de Entidades|-if $entity->getName() ne ""-| - |-$entity->getName()|capitalize-||-else-|Crear entidad|-/if-|</h1>
<p>A continuación podrá modificar la información de las entidades presentes en el sistema.</p> 
<form name="entityEdit" action="Main.php?do=entitysDoEdit" method="POST">
<input type=hidden name="entityName" value="|-$entity->getName()-|" />
|-php-|$entityPeer = new ModuleEntityPeer();
$fields = $entityPeer->getFieldNames(BasePeer::TYPE_FIELDNAME);
$this->assign("fields",$fields);
$hiddens = array ( "id" => "getId", "do" => "moduleEntititesDoEdit", "action" => "$action" );
$this->assign("hiddens",$hiddens);
|-/php-|
|-*include file="CreateAutoForm.tpl" object="entity" paramsArray="entityParams"*-|
<form name="entityEdit" action="Main.php?do=moduleEntitiesDoEdit" method="POST">
<fieldset title="Formulario de información del módulo"> 
	<legend>Información del módulo</legend>
    <p> 
      <label for="entityParams[moduleName]">moduleName</label> 
	      <input name="entityParams[moduleName]" title="moduleName" value="|-$entity->getModuleName()|escape-|" size="50" maxlength="50" type="text"> 
  </p> 
		    <p> 
      <label for="entityParams[name]">name</label> 
	      <input name="entityParams[name]" title="name" value="|-$entity->getName()|escape-|" size="50" maxlength="50" type="text"> 
	   </p> 
		    <p> 
      <label for="entityParams[phpName]">phpName</label> 
	      <input name="entityParams[phpName]" title="phpName" value="|-$entity->getPhpName()|escape-|" size="50" maxlength="50" type="text"> 
	   </p> 
		    <p> 
      <label for="entityParams[description]">description</label> 
	      <input name="entityParams[description]" title="description" value="|-$entity->getDescription()|escape-|" size="80" maxlength="255" type="text"> 
	   </p> 
		    <p> 
      <label for="entityParams[softDelete]">softDelete</label> 
			<input name="entityParams[softDelete]" type="hidden" value="0" />	  
			<input name="entityParams[softDelete]" type="checkbox" title="softDelete" value="1" |-if $entity->getSoftDelete() eq 1-|checked="checked"|-/if-| />
	   </p> 
		    <p> 
      <label for="entityParams[relation]">relation</label> 
	  		<input name="entityParams[relation]" type="hidden" value="0" />
			<input name="entityParams[relation]" type="checkbox" title="relation" value="1" |-if $entity->getRelation() eq 1-|checked="checked"|-/if-| />
	   </p> 
		    <p> 
      <label for="entityParams[saveLog]">saveLog</label> 
	  		<input name="entityParams[saveLog]" type="hidden" value="0" />
			<input name="entityParams[saveLog]" type="checkbox" title="saveLog" value="1" |-if $entity->getSaveLog() eq 1-|checked="checked"|-/if-| />
	   </p> 
		    <p> 
      <label for="entityParams[nestedset]">nestedset</label>
	  		<input name="entityParams[nestedset]" type="hidden" value="0" />
			<input name="entityParams[nestedset]" type="checkbox" title="nestedset" value="1" |-if $entity->getNestedset() eq 1-|checked="checked"|-/if-| onChange='switch_vis("nestedSetOptions");' />
	   </p> 
	<div id="nestedSetOptions" style="display:|-if $entity->getNestedset() eq 1-|block|-else-|none|-/if-|;">	    
		    <p> 
      <label for="entityParams[scopeFieldId]">scopeField</label> 
	  <select name="entityParams[scopeFieldId]" title="scopeFieldId"> 
	    <option value="0">Seleccione Campo</option> 
		|-foreach from=$entity->getAllEntityFields() item=eachField name=for_fields-|
	    <option value="|-$eachField->getId()-|"|-if $eachField->getId() eq $entity->getScopeFieldUniqueName()-|selected="selected"|-/if-|>|-$eachField->getName()-|</option> 
		|-/foreach-|
	  </select>	      
				</p></div>|-if $entity->getId() ne ""-|
			<input name="id" type="hidden" value="|-$entity->getId()-|" />
			|-/if-|
				|-include file="FiltersRedirectInclude.tpl" filters=$filters-|
			<input name="action" type="hidden" value="|-$action-|" />
			<input name="do" type="hidden" value="modulesEntitiesDoEdit" />
<p>		  <input type="submit" name="Submit" value="Guardar cambios"  title="Guardar cambios"/>
<input name="return" type="button"  value="Regresar" title="Regresar" onClick="location.href='Main.php?do=modulesEntitiesList|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($page) -|&page=|-$page-||-/if-|'" /></p>
</fieldset> 
</form>