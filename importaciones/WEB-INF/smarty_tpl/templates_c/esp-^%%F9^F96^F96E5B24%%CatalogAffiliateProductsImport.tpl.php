<?php /* Smarty version 2.6.16, created on 2007-11-30 14:33:26
         compiled from CatalogAffiliateProductsImport.tpl */ ?>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>Configuración del Sistema</td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class='backgroundTitle'>Lista de precios por afiliado </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>A continuación podrá cargar una lista de precios por afiliado </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<?php if (isset ( $this->_tpl_vars['rowsCreated'] )): ?>

<div id="resultado-importacion" >
	<p>Resultado de la importación</p>
	<p>Registros Creados: <?php echo $this->_tpl_vars['rowsCreated']; ?>
</p>
	<p>Registros Leidos: <?php echo $this->_tpl_vars['rowsReaded']; ?>
</p>
</div>	

<?php else: ?>
<div id="menu-de-importacion" >
	<form id="consulta-form" method="post" class="cmxform" action="Main.php?do=catalogAffiliateProductsDoImport" enctype="multipart/form-data">
		<legend></legend>
		<fieldset style="width:550px;">
		Seleccione el archivo con los Precios a importar y el afiliado correspondiente, luego haga click en &quot;Importar&quot;.<br>
El archivo a importar debe tener los siguientes campos: <em><?php echo $this->_tpl_vars['importKey']; ?>
</em>
<ol>
				<li>
					<label>Afiliado al que se le cargaran los precios:</label>
					<select id="affiliate" name="affiliate" >
						<?php $_from = $this->_tpl_vars['affiliates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['affiliate']):
?> 
						<option value="<?php echo $this->_tpl_vars['affiliate']->getId(); ?>
" ><?php echo $this->_tpl_vars['affiliate']->getName(); ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</li>
				<li>
					<label>Archivo de importación:</label>	
					<input name="fileImport" type="file" id="fileImport" size="50">
					</input>
				</li>
		</ol>
			<input type="submit" value="Importar" id="import-button" />
		</fieldset>

	</form>

</div>

<?php endif; ?>
