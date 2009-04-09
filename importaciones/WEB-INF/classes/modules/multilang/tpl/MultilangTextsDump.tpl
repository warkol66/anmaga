DELETE FROM `multilang_text` WHERE `moduleName` = "|-$moduleName-|";

|-foreach from=$texts item=text name=for_texts-|
INSERT INTO `multilang_text` ( `id` , `moduleName` , `languageId` , `text` ) VALUES ('|-$text->getId()-|', '|-$text->getModuleName()-|', '|-$text->getLanguageId()-|', '|-$text->getText()-|');
|-/foreach-|


