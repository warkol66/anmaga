<?php

class AffiliatesDoEditAction extends BaseAction {

	function AffiliatesDoEditAction() {
		;
	}

	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);

		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Affiliates";
		$smarty->assign("module",$module);

		$affiliatePeer = new AffiliatePeer();

		if ($_POST["action"] == "edit" && !empty($_POST["id"])) {
			$params["id"] = $_POST["id"];
			$affiliate = AffiliatePeer::get($_POST["id"]);
			if (!empty($affiliate)) {
				$affiliate = Common::setObjectFromParams($affiliate,$_POST["params"]);

				if ($affiliate->isModified() && !$affiliate->save()) 
					return $this->addParamsAndFiltersToForwards($params,$filters,$mapping,'failure');
	
				$smarty->assign("message","ok");
				return $this->addParamsAndFiltersToForwards($params,$filters,$mapping,'success');
			}
		}
		else {
			$affiliate = new Affiliate();
			$affiliate = Common::setObjectFromParams($affiliate,$_POST["params"]);

			if(!$affiliate->save()) {
				$smarty->assign("affiliate",$affiliate);
				$smarty->assign("message","error");
				return $this->addParamsAndFiltersToForwards($params,$filters,$mapping,'failure');
			}
			else{
				$params["id"] = $affiliate->getId();
				$logSufix = ', ' . Common::getTranslation("action: create","common");
				Common::doLog('success-add',$_POST["userParams"]["name"]. $logSufix);
				return $this->addParamsAndFiltersToForwards($params,$filters,$mapping,'success');
			}
		}
	}

}
