<?php /* Smarty version 2.6.16, created on 2007-11-20 11:27:02
         compiled from OrdersEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'OrdersEdit.tpl', 119, false),array('modifier', 'count', 'OrdersEdit.tpl', 142, false),array('function', 'math', 'OrdersEdit.tpl', 124, false),)), $this); ?>
﻿<script language="JavaScript" type="text/javascript" src="scripts/order-edit-functions.js"></script>


<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		<td class='title'>Pedidos</td> 
	</tr> 
	<tr> 
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
	<tr> 
		<td class='backgroundTitle'>Administraci&oacute;n de Pedidos </td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
	<tr> 
		<td class="tdSize2">Administrar pedido: <strong><?php echo $this->_tpl_vars['order']->getId(); ?>
</strong></td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
</table>
<div id="div_order"> 
	<h2>Order</h2> 
	
	<h3>Edicion de Opciones Generales</h3>
	<form action="Main.php" method="post"> 
		<strong>Numero:</strong> <input type="text" name="number" value="<?php echo $this->_tpl_vars['order']->getNumber(); ?>
" /><br />
		<strong>Creada:</strong> 
			<input name="created" type="text" value="<?php echo $this->_tpl_vars['order']->getDateCreated(); ?>
" size="10">&nbsp;&nbsp;
			<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('created', false, 'ymd', '-');" title="Seleccione la fecha">&nbsp;&nbsp;		
		<br /> 
		<strong>Mayorista:</strong> <?php $this->assign('affiliate', $this->_tpl_vars['order']->getAffiliate());  if ($this->_tpl_vars['affiliate']):  echo $this->_tpl_vars['affiliate']->getName();  endif; ?><br> 
		<?php $this->assign('currentBranch', $this->_tpl_vars['order']->getBranch()); ?>
		<strong>Sucursal:</strong> <select name="branch">
   
		<?php $this->assign('currentBranch', $this->_tpl_vars['order']->getBranch()); ?>
		<?php $_from = $this->_tpl_vars['branches']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aBranch']):
?>
				<option value="<?php echo $this->_tpl_vars['aBranch']->getId(); ?>
" <?php if ($this->_tpl_vars['currentBranch'] && ( $this->_tpl_vars['currentBranch']->getId() == $this->_tpl_vars['aBranch']->getId() )):  $this->assign('selected', '0'); ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['aBranch']->getName(); ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
				<option value="" <?php if (! $this->_tpl_vars['selected'] == '0'): ?>selected="selected"<?php endif; ?>>Sin Asignar</option>
		</select><br>
		<strong>Usuario:</strong> <?php $this->assign('user', $this->_tpl_vars['order']->getAffiliateUser());  if ($this->_tpl_vars['user']):  echo $this->_tpl_vars['user']->getUsername();  endif; ?><br> 
		<input type="submit" value="Modificar" class="button" /> 
		<input type="hidden" "name="do" value="ordersDoEdit" /> 
		<input type="hidden" name="orderId" value="<?php echo $this->_tpl_vars['order']->getId(); ?>
" /> 

	</form>
	<h3>Edicion de Estado</h3>
	<p> <strong>Estado Actual:</strong> <span id="state_actual"><?php echo $this->_tpl_vars['order']->getStateName(); ?>
</span> </p> 
	<table width="100%" border="0" cellpadding="5" cellspacing="0"> 
		<caption>
 		Cambios de Estados y Observaciones 
		</caption> 
		<thead> 
			<tr> 
				<th width="15%" class="thFillTitle">Fecha</th> 
				<th width="20%" class="thFillTitle">Afiliado</th> 
				<th width="15%" class="thFillTitle">Usuario</th> 
				<th width="10%" class="thFillTitle">Estado</th> 
				<th width="40%" class="thFillTitle">Observación</th> 
			</tr> 
		</thead> 
		<tbody id="stateChanges">  <?php $_from = $this->_tpl_vars['order']->getOrderStateChanges(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stateChange']):
?>
		<tr> 
			<td class="tdSize1 center top"><?php echo $this->_tpl_vars['stateChange']->getCreated(); ?>
</td> 
			<td class="tdSize1 top"><?php $this->assign('affiliate', $this->_tpl_vars['stateChange']->getAffiliate());  if ($this->_tpl_vars['affiliate']):  echo $this->_tpl_vars['affiliate']->getName();  endif; ?></td> 
			<td class="tdSize1 top"><?php $this->assign('user', $this->_tpl_vars['stateChange']->getUser());  if ($this->_tpl_vars['user']):  echo $this->_tpl_vars['user']->getUsername();  endif; ?></td> 
			<td class="tdSize1 top"><?php echo $this->_tpl_vars['stateChange']->getStateName(); ?>
</td> 
			<td class="tdSize1 top"><?php echo $this->_tpl_vars['stateChange']->getComment(); ?>
</td> 
		</tr> 
		<?php endforeach; endif; unset($_from); ?>
		</tbody> 
  </table> 
	</p> 
	<form action="Main.php" method="post"> 
		<label for="state">Nuevo Estado:</label> 
		<select name="state" id="state"> 
			<option value="0"<?php if ($this->_tpl_vars['order']->getState() == 0): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['stateTexts']['new']; ?>
</option> 
			<option value="1"<?php if ($this->_tpl_vars['order']->getState() == 1): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['stateTexts']['accepted']; ?>
</option> 
			<option value="2"<?php if ($this->_tpl_vars['order']->getState() == 2): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['stateTexts']['pendingApproval']; ?>
</option> 
			<option value="3"<?php if ($this->_tpl_vars['order']->getState() == 3): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['stateTexts']['inProcess']; ?>
</option> 
			<option value="4"<?php if ($this->_tpl_vars['order']->getState() == 4): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['stateTexts']['completed']; ?>
</option> 
			<option value="5"<?php if ($this->_tpl_vars['order']->getState() == 5): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['stateTexts']['cancelled']; ?>
</option> 
		</select> <br>

		<label for="comment">Observación:</label> 
		<textarea name="comment" cols="60" rows="4" wrap="VIRTUAL" id="comment"></textarea> 
		<input type="button" value="Agregar" onclick="javascript:ordersStateDoChangeX(this.form)" class="button" /> 
		<input type="hidden" name="do" value="ordersStateDoChangeX" /> 
		<input type="hidden" name="orderId" value="<?php echo $this->_tpl_vars['order']->getId(); ?>
" /> 
		<span id="messageState"></span> 
	</form> 
	</p>
	
	<h3>Edicion del Detalle de la Orden</h3>
	
	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders" > 
		<thead> 
			<tr> 
				<th width="10%" class="thFillTitle">C&oacute;digo</th> 
				<th width="40%" class="thFillTitle">Producto</th> 
				<th width="15%" class="thFillTitle">Precio</th> 
				<th width="10%" class="thFillTitle">Cantidad</th> 
				<th width="15%" class="thFillTitle">Total</th>
				<th width="10%" class="thFillTitle">Actions</th>
			</tr> 
		</thead> 
		<tbody id="productsTable">  <?php $_from = $this->_tpl_vars['order']->getOrderItems(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['for_products']['iteration']++;
?>
		<?php $this->assign('product', $this->_tpl_vars['item']->getProduct()); ?>
		<?php $this->assign('productNode', $this->_tpl_vars['product']->getNode()); ?>
		<tr id="row<?php echo $this->_tpl_vars['item']->getId(); ?>
"> 
			<td nowrap class="tdSize1 top center"><?php echo $this->_tpl_vars['product']->getcode(); ?>
</td> 
			<td class="tdSize1 top"><?php echo $this->_tpl_vars['productNode']->getname(); ?>
</td> 
			<td class="tdSize1 bottom right"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->getprice())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</td>
			<td class="tdSize1 bottom right"><span id="quantity<?php echo $this->_tpl_vars['item']->getId(); ?>
"><?php echo $this->_tpl_vars['item']->getQuantity(); ?>
</span></td> 
			<script type="text/javascript">
				var editor<?php echo $this->_tpl_vars['item']->getId(); ?>
 = new Ajax.InPlaceEditor("quantity<?php echo $this->_tpl_vars['item']->getId(); ?>
", 'Main.php?do=ordersItemsDoEditX&itemId=<?php echo $this->_tpl_vars['item']->getId(); ?>
&orderId=<?php echo $this->_tpl_vars['order']->getId(); ?>
', { clickToEditText : 'Editar Cantidad' });
			</script>
			<td class="tdSize1 bottom right"><?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['item']->getPrice(),'y' => $this->_tpl_vars['item']->getQuantity(),'assign' => 'totalItem'), $this);?>
<span id="totalItem<?php echo $this->_tpl_vars['item']->getId(); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['totalItem'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</span></td> 
			<td class="tdSize1 bottom right">
			    <input id="editButton<?php echo $this->_tpl_vars['item']->getId(); ?>
"type="button" onclick="editor<?php echo $this->_tpl_vars['item']->getId(); ?>
.enterEditMode();" value="Editar" class="boton" />
				<form method="post" action="Main.php" id="formRemove<?php echo $this->_tpl_vars['item']->getId(); ?>
">
					<input type="hidden" name="itemId" value="<?php echo $this->_tpl_vars['item']->getId(); ?>
" />
					<input type="hidden" name="orderId" value="<?php echo $this->_tpl_vars['order']->getId(); ?>
" />
					<input type="hidden" name="do" value="ordersItemsDoDeleteX" />
					<input type="button" value="Remove" class="boton" onclick="ordersItemsDoDeleteX('<?php echo $this->_tpl_vars['item']->getId(); ?>
')" />
				</form>
				<span  id="messageRemove<?php echo $this->_tpl_vars['item']->getId(); ?>
"></span>

			</td>
		</tr> 
		<?php endforeach; endif; unset($_from); ?>
		</tbody> 
  </table>
  <table>
  	  <tbody width="100%" border="0" cellpadding="5" cellspacing="0" class="tableTdBorders" >
      <?php if (count($this->_tpl_vars['order']->getOrderItems()) > 0): ?>
		<tr id="product-total"> 
			<td colspan="5" class="tdTitle right">Total:&nbsp;&nbsp;<span id="product_total_value"><?php echo ((is_array($_tmp=$this->_tpl_vars['order']->getTotal())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</span></td> 
		</tr> 
		<?php endif; ?>
		</tbody> 
  </table>
  
  	<div id="test" class="test">
	    <a title="product-add-link" id="product-add-link" onclick="showProductAdd()" >Agregar un Producto</a>
	</div>
	<span id="messageAdd"></span>
  	<div id="product-add-box" style="display: none;">
		<form method="post" action="Main.php">
			<label for="product">Producto: </label>
			<select name="productId">
			<?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
				<?php $this->assign('productNode', $this->_tpl_vars['product']->getNode()); ?> 
					<option value="<?php echo $this->_tpl_vars['product']->getId(); ?>
"><?php echo $this->_tpl_vars['product']->getCode(); ?>
, <?php echo $this->_tpl_vars['productNode']->getName(); ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			</select><br />
			<label>Cantidad: </label><input type="text" id="productQuantity" name="productQuantity" value="1" /><br />
			
			<input type="button" onclick="javascript:ordersItemsDoAddX(this.form)" value="Agregar" class="boton" /> 
			<input type="hidden" name="do" value="ordersItemsDoAddX" /> 
			<input type="hidden" name="orderId" value="<?php echo $this->_tpl_vars['order']->getId(); ?>
" /> 		
			<input type="button" onclick="cancelProductAdd()" value="Cancelar" class="boton" />
		</form>
	</div>

</div>
<?php if ($this->_tpl_vars['all'] == '0' && count($this->_tpl_vars['order']->getOrderItems()) > 0): ?>
<form action="Main.php" method="post"> 
	<input type="hidden" name="do" value="ordersDoAddToCart" /> 
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['order']->getId(); ?>
" /> 
	<input type="submit" value="Add To Cart" class="button" /> 
</form>
<?php endif; ?>  