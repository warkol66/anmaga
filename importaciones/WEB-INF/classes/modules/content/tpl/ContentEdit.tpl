|-if $loadAreaedit neq 1-|
	|-include file='ContentEditTinyMceInclude.tpl' elements="content" plugins="safari,style,table,advlink,inlinepopups,media,contextmenu,paste,nonbreaking"-|
|-/if-|
	<h2>Módulo de Contenido</h2>
	<h1>Administrar Contenido</h1>

|-include file='ContentNavigationChainInclude.tpl' navigationChain=$navigationChain-|

	<p>Ingrese la información solicitada y haga click en "Guardar"</p>
<fieldset>
<legend>|-if $type eq 'contenido'-|Contenido|-/if-||-if $type eq 'section'-|Seccion|-/if-||-if $type eq 'link'-|Link|-/if-|</legend>
|-if $type eq "content" or $type eq "link"-|
<form id="editors_here" action="Main.php?do=contentDoEdit" method="post">
	|- if isset($create)-|
	<p>
	<label for="content_type">Tipo de Contenido</label>
	<select name="content_type" onchange="javascript:showContentFields(this.value)">
		<option value="content">Contenido</option>
		<option value="link">Link</option>
	</select>
	</p>
	|-/if-|
 	|- if isset($content) -|
	<input name="id" type="hidden" id="id" value="|- $content.id -|" />
	<p>
	<label for="title">Seccion Padre</label>
	<select name="parent">
		<option value="0">Base</option>
		|-foreach from=$sections item=section-|
		<option value="|-$section.id-|" |-if $section.id eq $content.parent-|selected="selected"|-/if-|>|-$section.title-|</option>
		|-/foreach-|
	</select>
	</p>
	|- else -|
	<input name="parent" type="hidden" id="parent" value="|- $id_parent -|" /> 
	|- /if -|
	<input name="type" type="hidden" id="type" value="content" /> 
	<p>  
	<label for="title">Título</label>
	<input name="title" type="text" id="title" size="55" maxlength="255" value="|-$content.title-|" /> 
	</p> 
	<p>  
	<label for="titleInMenu">Título en el menú</label>
	<input name="titleInMenu" type="text" id="titleInMenu" size="55" maxlength="120" value="|-$content.titleInMenu-|" />
	</p>
	<div id="pLink"|-if $type eq "content"-| style="display:none;"|-/if-|>
	<p><label for="link">Dirección URL</label>
		<input name="link" type="text" id="link" size="60" maxlength="120" value="|-$content.link-|" />
	</p>
	<p><label for="target">Abrir en</label>
	<select name="target">
		<option value="">Seleccione donde abrirá el link</option>
		<option value="0"|-if $content.target eq 0-| selected="selected"|-/if-|>Misma ventana</option>
		<option value="1"|-if $content.target eq 1-| selected="selected"|-/if-|>Ventana nueva</option>
	</select>
	</p>
	</div>
	<div id="pContent"|-if $type eq "link"-| style="display:none;"|-/if-|>
	<p><label for="content">Texto</label>
		<textarea id="content" name="content" rows="10" cols="80" >|-$content.content-|</textarea>
	</p></div>
	<p> 
		<input type="hidden" name="type" value="|-$type-|" />
		<input type="submit" value="Guardar" /> 
		<!--input type="button" value="Guardar" onclick="javascript:submitHandler('editors_here');" /--> 
	</p> 
</form>
</fieldset>
|-/if-|

 |-if $type eq "section"-|
<form id="editors_here" action="Main.php?do=contentDoEdit" method="post">
 	|- if isset($section) -|
	<input name="id" type="hidden" id="id" value="|- $section.id -|" /> 
	<input name="parent" type="hidden" id="parent" value="|- $section.parent -|" /> 
	|- else -|
	<input name="parent" type="hidden" id="parent" value="|- $id_parent -|" /> 
	|- /if -|
	<input name="type" type="hidden" id="type" value="section" /> 
	<p>  
	<label for="title">Título</label>
	<input name="title" type="text" id="title" size="55" maxlength="255" value="|-$section.title-|" />
	</p>
	<p>
	<label for="titleInMenu">Título en menú</label>
	<input name="titleInMenu" type="text" id="titleInMenu" size="55" maxlength="255" value="|-$section.titleInMenu-|" />
	</p>
	<p>
	<label for="content">Texto</label>
	<textarea name="content" cols="70" rows="14" wrap="virtual" id="content" >|-$section.content-|</textarea> 
	</p> 
	<p> 
		<input type="submit" value="Guardar"/> 
	</p> 
</form>
|-/if-|