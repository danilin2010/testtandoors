<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	"NAME" => Loc::getMessage('TESTTANDOORS_SHOWTIME_NAME'),
	"DESCRIPTION" => Loc::getMessage('TESTTANDOORS_SHOWTIME_DESCRIPTION'),
	"SORT" => 20,
	"PATH" => array(
		"ID" => 'testtandoors',
		"NAME" => Loc::getMessage('TESTTANDOORS_NAME'),
        "DESCRIPTION" => Loc::getMessage('TESTTANDOORS_DESCRIPTION'),
		"SORT" => 10,
	),
);

?>