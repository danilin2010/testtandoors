<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вывод времени");
?><?$APPLICATION->IncludeComponent(
	"testtandoors:showtime", 
	".default", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COUNT" => "0",
		"IBLOCK_CODE" => "",
		"IBLOCK_ID" => "0",
		"IBLOCK_TYPE" => "-",
		"SHOW_NAV" => "N",
		"SORT_DIRECTION1" => "ASC",
		"SORT_DIRECTION2" => "ASC",
		"SORT_FIELD1" => "ID",
		"SORT_FIELD2" => "ID",
		"COMPONENT_TEMPLATE" => ".default",
		"DATE_FORMAT" => "d.m.Y H:i"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>