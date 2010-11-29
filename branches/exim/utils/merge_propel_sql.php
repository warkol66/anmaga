<?php
	
	$propelSqlPath = '../WEB-INF/classes/propel/sql/';
	$propelMergeFileName = 'propel_database.sql';
	
	if (is_file($propelSqlPath . $propelMergeFileName)) {
		unlink($propelSqlPath . $propelMergeFileName);
	}
	
	$dirHandler = @opendir($propelSqlPath);
	$buffer = '';
	
	while (false !== ($file = readdir($dirHandler))) {
		
        if(preg_match('/\.sql/',$file)) {
			$buffer .= file_get_contents($propelSqlPath . $file);
		}
    }
	
	closedir($dirHandler);
	
	file_put_contents($propelSqlPath . $propelMergeFileName,$buffer);
	
	echo "generacion de sql a partir de propel finalizada. \n";
	
	return 0;