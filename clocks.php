<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вывод времени");
?><?$APPLICATION->IncludeComponent(
	"testtandoors:showtime", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"DATE_FORMAT" => "d.m.Y H:i"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>