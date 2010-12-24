  <label for="fieldParams[foreignKeyRemote]">foreignKeyRemote</label>
  <select id="fieldParams[foreignKeyRemote]" name="fieldParams[foreignKeyRemote]" title="foreignKeyRemote"> 
    <option value="0" selected="selected">Seleccione Campo</option> 
	|-foreach from=$fields item=field name=for_fields-|
    <option value="|-$field->getId()-|">|-$field->getName()-|</option> 
	|-/foreach-|
  </select>
