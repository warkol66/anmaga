<?php /* Smarty version 2.6.16, created on 2007-11-20 13:20:48
         compiled from OrdersList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'OrdersList.tpl', 71, false),)), $this); ?>
﻿				<h2>Orders</h2>
				<div id="div_orders">
					<?php if ($this->_tpl_vars['message'] == 'ok'): ?><span class="message_ok">Orden guardada correctamente</span><?php endif; ?>
					<?php if ($this->_tpl_vars['message'] == 'deleted_ok'): ?><span class="message_ok">Orden eliminada correctamente</span><?php endif; ?>
					<?php if ($this->_tpl_vars['message'] == 'orders_deleted_ok'): ?><span class="message_ok">Ordenes eliminadas correctamente</span><?php endif; ?>
					
					<div class="filter">
						<form action="Main.php" method="get">
							<p>
								<label>Desde:</label>&nbsp;<span class="size4">(mm-dd-aaaa)</span>
								<input name="dateFrom" type="text" value="<?php echo $this->_tpl_vars['dateFrom']; ?>
" size="10">&nbsp;&nbsp;
								<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateFrom', false, 'dmy', '-');" title="Seleccione la fecha">&nbsp;&nbsp;
								<label>Hasta:</label>&nbsp;<span class="size4">(mm-dd-aaaa)</span>
								<input name="dateTo" type="text" value="<?php echo $this->_tpl_vars['dateTo']; ?>
" size="10">&nbsp;&nbsp;
								<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateTo', false, 'dmy', '-');" title="Seleccione la fecha">
							</p>
							<p>
								<label for="state">Estado</label>
								<select name="state">
									<option value="" selected="selected">Todos</option>
									<option value="0">Emitida</option>
									<option value="1">Aceptada</option>
									<option value="2">Pendiente Aprobación</option>
									<option value="3">En Proceso</option>
									<option value="4">Completa</option>
									<option value="5">Cancelada</option>
									<option value="6">A Verificar</option>
								</select>
							</p>							
							<?php if ($this->_tpl_vars['all'] == '1'): ?>
							<p>
								<label for="affiliateId">Affiliate</label>
								<select name="affiliateId">
									<option value="" selected="selected">Todos</option>
									<?php $_from = $this->_tpl_vars['affiliates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['affiliate']):
?>
									<option value="<?php echo $this->_tpl_vars['affiliate']->getId(); ?>
"><?php echo $this->_tpl_vars['affiliate']->getName(); ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
								</select>
							</p>
							<?php endif; ?>
							<p>
								<input type="hidden" name="do" value="ordersList" />
								<input type="submit" value="Buscar" class="boton" />
							</p>
						</form>
					</div>

					<form action="Main.php" method="get">
					
						<table id="tabla-orders" width="100%" class="tableTdBorders">
							<thead>
								<tr>
													<th class="thFillTitle">id</th>
																	<th class="thFillTitle">created</th>
																	<th class="thFillTitle">user</th>
																	<?php if ($this->_tpl_vars['all'] == '1'): ?><th class="thFillTitle">affiliate</th><?php endif; ?>
																	<th class="thFillTitle">branch</th>
																	<th class="thFillTitle">total</th>
																	<th class="thFillTitle">state</th>
																	<th class="thFillTitle">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							<?php $_from = $this->_tpl_vars['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['for_orders'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['for_orders']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['order']):
        $this->_foreach['for_orders']['iteration']++;
?>
								<tr>
																	<td class="tdSize1"><?php echo $this->_tpl_vars['order']->getid(); ?>
</td>
																	<td class="tdSize1"><?php echo $this->_tpl_vars['order']->getcreated(); ?>
</td>
																	<td class="tdSize1"><?php $this->assign('user', $this->_tpl_vars['order']->getAffiliateUser());  if ($this->_tpl_vars['user']):  echo $this->_tpl_vars['user']->getUsername();  endif; ?></td>
																	<?php if ($this->_tpl_vars['all'] == '1'): ?><td class="tdSize1"><?php $this->assign('affiliate', $this->_tpl_vars['order']->getAffiliate());  if ($this->_tpl_vars['affiliate']):  echo $this->_tpl_vars['affiliate']->getName();  endif; ?></td><?php endif; ?>
																	<td class="tdSize1"><?php $this->assign('branch', $this->_tpl_vars['order']->getBranch());  if ($this->_tpl_vars['branch']):  echo $this->_tpl_vars['branch']->getName();  endif; ?></td>
																	<td class="tdSize1"><?php echo ((is_array($_tmp=$this->_tpl_vars['order']->gettotal())) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ",", ".") : number_format($_tmp, 2, ",", ".")); ?>
</td>
																	<td class="tdSize1"><?php echo $this->_tpl_vars['order']->getStateName(); ?>
</td>
																	<td>
										<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersView&id=<?php echo $this->_tpl_vars['order']->getid(); ?>
'" value="Ver" class="boton" />
										<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersEdit&id=<?php echo $this->_tpl_vars['order']->getid(); ?>
'" value="Editar" class="boton" />
										<?php if ($this->_tpl_vars['all'] == '0'): ?>
										<input type="button" onclick="javascript:window.location.href='Main.php?do=ordersDoAddToCart&id=<?php echo $this->_tpl_vars['order']->getid(); ?>
'" value="Add To Cart" class="boton" />
										<?php endif; ?>
										<input type="checkbox" name="orders[]" value="<?php echo $this->_tpl_vars['order']->getid(); ?>
" />
									</td>
								</tr>
							<?php endforeach; endif; unset($_from); ?>
							
								<tr> 
									<td colspan="9"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "PaginateInclude.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td> 
								</tr>
	
							</tbody>
						</table>
						
						<input type="hidden" name="do" id="do" value="" />
						
						<input type="button" onclick="ordersSendOrdersExport(this.form)"value="Exportar ordenes seleccionadas" class="boton" /><br />
						<input type="button" onclick="ordersSendOrdersDelete(this.form)" value="Eliminar ordenes Seleccionadas" class="boton" />

						
					</form>
						
				</div>