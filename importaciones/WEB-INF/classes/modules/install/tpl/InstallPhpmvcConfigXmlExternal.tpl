<?xml version="1.0" encoding="ISO-8859-1" ?>
<?php
/**
* Define Actions del phpMVC
*
* $author Modulos Empresarios / Egytca
* @package phpMVCconfig
*/
?>

<!DOCTYPE phpmvc-config PUBLIC "-//PHPMVC//DTD PHPMVC Configuration 1.0//EN"
					"./phpmvc-config_1_1.dtd">

<phpmvc-config>

<!-- ========== Default Action Mapping Definitions ============================== -->

  <action-mappings>
    <action    path = "index"
               type = "IndexAction"
               name = "index"
              scope = "request"
           validate = "true">
    	<forward name="success" path="/Main.php?do=usersLogin" redirect="true" />
    </action>
    <action    path = "maintenance"
               type = "MaintenanceAction"
               name = "maintenance"
              scope = "request"
           validate = "true">
    	<forward name="success" path="Maintenance.tpl" />
    </action>
    <action    path = "welcome"
               type = "WelcomeAction"
               name = "welcome"
              scope = "request"
           validate = "true">
    <forward name="success" path="Welcome.tpl" />
    </action>
    <action    path = "installGenerateConfig"
               type = "InstallGenerateConfigAction"
               name = "installGenerateConfig"
              scope = "request"
           validate = "true">
    <forward name="success" path="InstallGenerateConfig.tpl" />
    </action>    
    
	</action-mappings>

<!-- ========== Modules Action Mapping Definitions ====================== -->

|-$centerHTML-|

<!-- ========== PlugIns ================================================= -->

	<!-- Load our PlugIn class here (case sensetive class name)					     -->
	<!-- Note: The attribute names must match the class methods					     -->
	<!-- Eg: 'key' maps to 'setKey(..)'															         -->
	<plug-in className="SmartyMLPlugInDriver"
								 key="SMARTY_PLUGIN">
		<!-- And set some custom propertied on the PlugIn class					       -->
		<!-- Note: The property name must match the class variable name exactly -->
		<set-property property="caching"       value="0"/>
		<set-property property="force_compile" value="|-if $force_compile eq 1-|true|-else-|false|-/if-|"/>
		<set-property property="template_dir"  value="WEB-INF/tpl/"/>
		<set-property property="compile_dir"   value="WEB-INF/smarty_tpl/templates_c/"/>
		<set-property property="config_dir"    value="WEB-INF/smarty_tpl/configs/"/>
		<set-property property="cache_dir"     value="WEB-INF/smarty_tpl/cache/"/>
		<set-property property="left_delimiter"    value="|-literal-||-|-/literal-|"/>
		<set-property property="right_delimiter"     value="|-literal-|-||-/literal-|"/>
	</plug-in>

</phpmvc-config>
