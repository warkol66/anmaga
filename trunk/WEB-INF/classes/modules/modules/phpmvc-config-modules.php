<!-- Module Modules -->
	<action-mappings module="Modules">


    <action    path = "modulesList"
               type = "ModulesListAction"
               name = "modulesList"
              scope = "request"
           validate = "true">
		<forward name="success"  path="ModulesList.tpl" />
    </action>


    <action    path = "modulesEdit"
               type = "ModulesEditAction"
               name = "modulesEdit"
              scope = "request"
           validate = "true">
		<forward name="success"  path="ModulesEdit.tpl" />
    </action>
	
	<action    path = "modulesDoEdit"
               type = "ModulesDoEditAction"
               name = "modulesDoEdit"
              scope = "request"
           validate = "true">
		<forward name="success" path="/Main.php?do=modulesList" redirect='true'/>
    </action>
    <action    path = "modulesDoActivateX"
               type = "ModulesDoActivateXAction"
               name = "modulesDoActivateX"
              scope = "request"
           validate = "true">
		<forward name="success" path="ModulesDoActivateXModuleSuccess.tpl"/>
		<forward name="errorDependencyOff" path="ModulesDoActivateXModuleOff.tpl"/>
		<forward name="errorDependencyOn" path="ModulesDoActivateXModuleOn.tpl"/>
    </action>

	</action-mappings>

<!-- ========== End Modules ================================================= -->