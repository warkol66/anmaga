|-foreach from=$elements item=element key=element_name-|
|-if $element|is_array-|
<li id="config|-$name-|[|-$element_name-|]">|-$element_name-| <a class="configLinkImage" href="#" onclick="javascript:addConfigAttribute(this.parentNode)"><img src="images/add-comment-blue.gif" alt="Agregar Atributo" border="0" title="Agregar Atributo" /></a>
	<a class="configLinkImage" href="#" onclick="javascript:addConfigSection(this.parentNode)"><img src="images/add-folder-green.gif" alt="Agregar Sección" border="0" title="Agregar Sección" /></a>
	<a class="configLinkImage" href="#" onclick="javascript:deleteConfigAttribute(this.parentNode)"><img src="images/delete-folder-green.gif" alt="Eliminar" border="0" title="Eliminar" /></a>
	<ul id="config|-$name-|[|-$element_name-|]_ul">|-include file=ConfigEditInclude.tpl elements=$element name="$name[$element_name]"-|</ul>
</li>
|-else-|
<li>|-$element_name-|: <input |-if $element_name|substr:-8|lower eq 'password'-|type="password"|-else-|type="text"|-/if-| name="config|-$name-|[|-$element_name-|]" value="|-$element-|" size="35" /> 
<a class="configLinkImage" href="#" onclick="javascript:deleteConfigAttribute(this.parentNode)"><img src="images/delete-comment-blue.gif" alt="Eliminar" border="0" title="Eliminar" /></a></li>
|-/if-|
|-/foreach-|
