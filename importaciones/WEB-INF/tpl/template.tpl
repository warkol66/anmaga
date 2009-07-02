<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>|-$parameters.siteName-|</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--clases para validacion del lado del client por js -->
<link rel="stylesheet" href="css/validation.css" type="text/css">

<link rel="stylesheet" href="css/style.css" type="text/css">
<!--[if !IE]>--> <link href="css/style_ns6+.css" rel="stylesheet" type="text/css"> <!--<![endif]-->

<link rel="stylesheet" href="css/main.css" type="text/css">
<!--[if lte IE 6]> <link href="css/styles-ie6.css" rel="stylesheet" type="text/css"> <![endif]-->
<!--[if gte IE 7]> <link href="css/styles-ie7.css" rel="stylesheet" type="text/css"> <![endif]-->
<link rel="shortcut icon" href="images/favicon.ico">
<script language="JavaScript" type="text/javascript" src="scripts/prototype.js"></script>
<!-- libreria de validacion client-side externa -->
<script language="JavaScript" type="text/javascript" src="scripts/validation/js_validation_library.js"></script>
<!-- libreria de validacion del framework-->
<script language="JavaScript" type="text/javascript" src="scripts/validation.js"></script>
<script type="text/javascript" src="Main.php?do=js&name=js&module=common&code=|-$currentLanguageCode-|"></script>
<script language="JavaScript" type="text/javascript" src="scripts/datePicker.js"></script>
<script language="JavaScript" src="scripts/scriptaculous.js" type="text/javascript"></script>
<script type="text/javascript" src="Main.php?do=js&name=js&module=import&code=|-$currentLanguageCode-|"></script>
|-if $module eq 'content'-|<script language="JavaScript" src="scripts/scriptaculous.js?load=effects,dragdrop" type="text/javascript"></script>|-/if-|
<script language="JavaScript" type="text/JavaScript">
	var url="|-$systemUrl-|";
</script>

<!-- inclusion de mensajes para javascript -->
|-include file='ValidationJavascriptMessagesInclude.tpl'-|

|-if $loadAreaedit eq 1-||-include file='ContentEditAreaeditInclude.tpl' editors="content"-||-/if-|

|-if $actualAction eq "newsArticlesEdit" or $actualAction eq "calendarEventsEdit"-|
|-if $actualAction eq "newsArticlesEdit"-|
<script type="text/javascript" src="scripts/news-medias.js"></script>
|-/if-|
<script type="text/javascript" src="scripts/swfupload/swfupload.js"></script>
<script type="text/javascript" src="scripts/swfupload/js/fileprogress.js"></script>
|-if $actualAction eq "newsArticlesEdit"-|
<script type="text/javascript" src="scripts/swfupload/js/handlers.js"></script>
|-/if-|
|-if $actualAction eq "calendarEventsEdit"-|
<script type="text/javascript" src="scripts/swfupload/js/calendarHandlers.js"></script>
|-/if-|
<script type="text/javascript">
		var swfu;
		
		window.onload = function () {
			swfu = new SWFUpload({
				// Backend settings
				upload_url: "../../Main.php",	// Relative to the SWF file, you can use an absolute URL as well.
				file_post_name: "media",

				// Flash file settings
				file_size_limit : "15360",	// 15 MB
				file_types : "*.jpg;*.png;*.gif;",	// or you could use something like: "*.doc;*.wpd;*.pdf",
				file_types_description : "Imagenes",
				file_upload_limit : "1000", // Even though I only want one file I want the user to be able to try again if an upload fails
				file_queue_limit : "1", // this isn't needed because the upload_limit will automatically place a queue limit

				// Event handler settings
				swfupload_loaded_handler : swfUploadLoaded,
			
				file_dialog_start_handler : fileDialogStart,		// I don't need to override this handler
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
			
				//upload_start_handler : uploadStart,	// I could do some client/JavaScript validation here, but I don't need to.
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : "/images/XPButtonUploadText_61x22.png",	// Relative to the SWF file
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 61,
				button_height: 22,

				// Flash Settings
				flash_url : "scripts/swfupload/swfupload.swf",	// Relative to this file

				custom_settings : {
					progress_target : "fsUploadProgress",
					upload_successful : false
				},
			
				// Debug settings
				debug: false
			});
		
		};

	</script>
|-/if-|

</head>
<body |-if $loadAreaedit eq 1-| onLoad="areaedit_init();"|-/if-|>
<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Header -->
	<div id="header">
		<a href="Main.php"><strong>|-$parameters.siteName-|</strong></a>
	</div>
	<!-- End Header -->
	<!-- Begin contentWrapper -->
		<div id="contentWrapper">
			<!-- Begin Left Column -->
				<div id="leftColumn">
					|-include file="MenuLeft.tpl"-|
				</div>
			<!-- End Left Column -->
			<!-- Begin Right Column -->
				<div id="rightColumn">
					<!--centerHTML start-->
					|-$centerHTML-|
					<!--centerHTML end -->
				</div>
			<!-- End Right Column -->
	<!-- Begin contentCloser -->
	<div id="contentCloser"></div>
	<!-- End contentCloser -->
	</div>
	<!-- End contentWrapper -->
	<!-- Begin Footer -->
	<div id="footer">		       
		<p>Desarrollado por Módulos Empresarios.</p>
	</div>
	<!-- End Footer -->
</div>
<!-- End Wrapper -->
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>