<div id="content-actions">
	<h2>Módulo de Contenido</h2>
	<h1>Administrar Contenido</h1>
	<p>A continuación podrá agregar un nuevo contenido o una nueva sección. Para editar contenidos existentes, haga click en "Editar". 
	Para eliminar haga click en "Eliminar". Para cambiar el orden de la información, coloque el cursor sobre el titulo y arrastrelo a la posición deseada.
	<br>
	Si desea editar los contenidos de una sección, haga click en "ir a Sección".</p>
	|-include file='ContentNavigationChainInclude.tpl' navigationChain=$navigationChain-|
		<p><strong>Agregar</strong>&nbsp;&nbsp;
		[&nbsp;<a href="Main.php?do=contentEdit&type=section&id_parent=|-$parent_id-|" class="add">Nueva Sección</a>&nbsp;]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;<a href="Main.php?do=contentEdit&type=content&id_parent=|-$parent_id-|" class="add">Nuevo Contenido</a>&nbsp;]</p>
	</div>
	
	<div id="mensajes">
	|-if $message eq "edited"-|
		<div class='successMessage'>Cambios guardados con éxito</div>
	|-elseif $message eq "notedited"-|
		<div class='failureMessage'>Error al guardar los cambios</div>
	|-elseif $message eq "deleted"-|
		<div class='successMessage'>Eliminado con éxito</div>
	|-elseif $message eq "notdeleted"-|
		<div class='failureMessage'>No se ha podido eliminar</div>
	|-/if-|	
		<h4 id="orderChanged"></h4>
	</div>

	<div id="content-links">
		|-if empty($elements)-|
			<h3>No se han definido items en la sección</h3>
		|-else-|
<fieldset>
			<legend>Contenidos</legend>
		<ul id="contentList">
		    
		|-foreach from=$elements item=value-|
			<li id="contentList_|-$value.id-|"> 
				<span class="textOptionMove" style="float:left;width:65%;">
					|-$value.title-|
					|-if $value.type eq 2-|
						&nbsp;[&nbsp;<span class="desac"><strong>Link</strong></span>&nbsp;]
					|-/if-|
					|-if $value.type eq 0-|
						&nbsp;[&nbsp;<span class="desac"><strong>Contenido</strong></span>&nbsp;]
					|-/if-|
					|-if $value.type eq 1-|
						&nbsp;[&nbsp;<span class="desac"><strong>Sección</strong></span>&nbsp;]
					|-/if-|
				</span>
				<span style="float:left;width:35%;text-align:right;">
					|-if $value.type eq 1-|<a href="Main.php?do=contentShow&id=|-$value.id-|" alt="Ver" title="Ver" target="_blank"><img src="images/clear.png" class="linkImageView"></a>|-/if-|
					|-if $value.type eq 2-|<a href="|-$value.link-|" alt="Ver" title="Ver" target="_blank"><img src="images/clear.png" class="linkImageView"></a>|-/if-|
					|-if $value.type eq 0-|<a href="Main.php?do=contentShow&id=|-$value.id-|" alt="Ver" title="Ver" target="_blank"><img src="images/clear.png" class="linkImageView"></a>|-/if-|
					|-if $value.type eq 1-|<a href="Main.php?do=contentList&id_section=|-$value.id-|" alt="ir a Sección" title="ir a Sección"><img src="images/clear.png" class="linkImageGoTo"></a>|-/if-|
					<a href="Main.php?do=contentEdit&id=|-$value.id-|&type=|-$value.typeName-|&operation=edit" alt="Editar" title="Editar"><img src="images/clear.png" class="linkImageEdit"></a>
					<form action="Main.php?do=contentDoDelete" method="post" name="content|-$value.id-|" style="display: inline;"><input
					 type="hidden" name="id" value="|-$value.id-|"/><a href="#" 
					 onclick="if (confirm('¿Esta seguro que quiere eliminar este elemento?')) this.parentNode.submit();" alt="Eliminar" title="Eliminar"><img src="images/clear.png" class="linkImageDelete"></a></form>
				</span>
				<br style="clear: left" />
			</li>
		|-/foreach-|
		</ul>
		|-/if-|
		</fieldset>
	</div>
 	<script type="text/javascript">
   Sortable.create("contentList", {
 
			onUpdate: function() {  
						$('orderChanged').innerHTML = "Cambiando orden...";
						new Ajax.Updater("orderChanged", "Main.php?do=contentDoEditOrderX",
							{
			 					method: "post",  
			 					parameters: { data: Sortable.serialize("contentList") }
							});
					} 
				});
 </script>
														
	<div id="contentCloser"></div>
	<!-- End contentCloser -->
