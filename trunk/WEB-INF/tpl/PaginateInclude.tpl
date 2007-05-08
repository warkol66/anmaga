<div id="div_paginate" style="text-align:right">
	<!-- <p>
	Total Pages: |-$pager->getTotalPages()-|  Total Texts: |-$pager->getTotalRecordCount()-|
	</p>
	-->
	<div id="paginateFirst" class="paginateText">|-assign var="firstpage" value=$pager->getFirstPage()-||-assign var="page" value=$pager->getPage()-||-if $page gt 1-|<a href="|-$url-|&page=|-$firstpage-|" class="detail">First</a>|-else-|<span class="deactivated">First</span>|-/if-|
	</div>
	<div id="paginatePrevious" class="paginateText">|-assign var="prevpage" value=$pager->getPrev()-||-if $prevpage gt 0-|<a href="|-$url-|&page=|-$prevpage-|" class="detail">&lt;&lt; Previous</a>|-else-|<span class="deactivated">&lt;&lt; Previous</span>|-/if-|
	</div>
	<div id="paginatePage" class="paginateText">|-assign var="page" value=$pager->getPage()-||-if $page ne ''-| Page: |-$page-|  |-/if-|
	</div>
	<div id="paginateNext" class="paginateText">|-assign var="nextpage" value=$pager->getNext()-||-if $nextpage ne ""-|<a href="|-$url-|&page=|-$nextpage-|" class="detail">Next &gt;&gt;</a>|-else-|<span class="deactivated">Next &gt;&gt;</span> |-/if-|
	</div>
	<div id="paginateLast" class="paginateText">|-assign var="lastpage" value=$pager->getLastPage()-||-if $lastpage neq $page-|<a href="|-$url-|&page=|-$lastpage-|" class="detail">Last</a>|-else-|<span class="deactivated">Last</span>|-/if-|
	</div>
</div>
