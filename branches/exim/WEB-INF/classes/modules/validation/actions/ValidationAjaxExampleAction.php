<?php

require_once("BaseAction.php");

class ValidationAjaxExampleAction extends BaseAction {

	function ValidationAjaxExampleAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

		    BaseAction::execute($mapping, $form, $request, $response);

			//////////
			// Access the Smarty PlugIn instance
			// Note the reference "=&"
			$plugInKey = 'SMARTY_PLUGIN';
			$smarty =& $this->actionServer->getPlugIn($plugInKey);
			if($smarty == NULL) {
				echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
			}
			
			$this->template->template = 'TemplateAjax.tpl';

			$module = "Validation";
			$smarty->assign('module',$module);

			$name = 'input_text_validation';
			if ($_POST[$name] == 'valid') {
				$value = 0;
				$message = 'valid';
			}
			else {
				$value = 1;
				$message = 'invalid';				
			}
			
			$smarty->assign('name',$name);			
			$smarty->assign('value',$value);
			$smarty->assign('message',$message);
		
			return $mapping->findForwardConfig('success');
		
	}

}
