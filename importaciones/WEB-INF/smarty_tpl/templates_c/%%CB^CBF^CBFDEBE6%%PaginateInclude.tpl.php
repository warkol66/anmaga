<?php /* Smarty version 2.6.16, created on 2007-11-27 00:25:16
         compiled from PaginateInclude.tpl */ ?>
<div id="div_paginate" style="text-align:right">
	<!-- <p>
	Total Pages: <?php echo $this->_tpl_vars['pager']->getTotalPages(); ?>
  Total Texts: <?php echo $this->_tpl_vars['pager']->getTotalRecordCount(); ?>

	</p>
	-->
	<div id="paginateFirst" class="paginateText"><?php $this->assign('firstpage', $this->_tpl_vars['pager']->getFirstPage());  $this->assign('page', $this->_tpl_vars['pager']->getPage());  if ($this->_tpl_vars['page'] > 1): ?><a href="<?php echo $this->_tpl_vars['url']; ?>
&page=<?php echo $this->_tpl_vars['firstpage']; ?>
" class="detail">Inicio</a><?php else: ?><span class="deactivated">Inicio</span><?php endif; ?>
	</div>
	<div id="paginatePrevious" class="paginateText"><?php $this->assign('prevpage', $this->_tpl_vars['pager']->getPrev());  if ($this->_tpl_vars['prevpage'] > 0): ?><a href="<?php echo $this->_tpl_vars['url']; ?>
&page=<?php echo $this->_tpl_vars['prevpage']; ?>
" class="detail">&lt;&lt; Anterior</a><?php else: ?><span class="deactivated">&lt;&lt; Anterios</span><?php endif; ?>
	</div>
	<div id="paginatePage" class="paginateText"><?php $this->assign('page', $this->_tpl_vars['pager']->getPage());  if ($this->_tpl_vars['page'] != ''): ?> Página: <?php echo $this->_tpl_vars['page']; ?>
  <?php endif; ?>
	</div>
	<div id="paginateNext" class="paginateText"><?php $this->assign('nextpage', $this->_tpl_vars['pager']->getNext());  if ($this->_tpl_vars['nextpage'] != ""): ?><a href="<?php echo $this->_tpl_vars['url']; ?>
&page=<?php echo $this->_tpl_vars['nextpage']; ?>
" class="detail">Siguiente &gt;&gt;</a><?php else: ?><span class="deactivated">Siguiente &gt;&gt;</span> <?php endif; ?>
	</div>
	<div id="paginateLast" class="paginateText"><?php $this->assign('lastpage', $this->_tpl_vars['pager']->getLastPage());  if ($this->_tpl_vars['lastpage'] != $this->_tpl_vars['page']): ?><a href="<?php echo $this->_tpl_vars['url']; ?>
&page=<?php echo $this->_tpl_vars['lastpage']; ?>
" class="detail">Última</a><?php else: ?><span class="deactivated">Última</span><?php endif; ?>
	</div>
</div>