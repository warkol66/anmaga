<?php

require_once("BaseAction.php");

class ImportBaseAction extends BaseAction {

	/**
	 * Crea el contenido del email para notificar a un supplier quotation
	 *
	 */
	public function renderSupplierQuotationNotifyEmail($supplierQuotation) {
		
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		
		$this->template->template = 'TemplateMail.tpl';
		
		$smarty->assign('supplierQuotation',$supplierQuotation);
		$smarty->assign('supplier',$supplierQuotation->getSupplier());
		
		$content = $smarty->fetch("ImportSupplierQuoteNotifyEmail.tpl");
		
		return $content;
		
	}

	/**
	 * Crea el contenido del email para notificar a un supplier quotation de feedback
	 *
	 */
	public function renderSupplierQuotationFeedbackNotifyEmail($supplierQuotation) {
		
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		
		$this->template->template = 'TemplateMail.tpl';
		
		$smarty->assign('supplierQuotation',$supplierQuotation);
		$smarty->assign('supplier',$supplierQuotation->getSupplier());
		
		$content = $smarty->fetch("ImportSupplierQuoteFeedbackNotifyEmail.tpl");
		
		return $content;
		
	}

}