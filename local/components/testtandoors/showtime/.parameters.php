<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);

if(!CModule::IncludeModule("iblock"))
    return;

try
{
	$arComponentParameters = array(
		'PARAMETERS' => array(
            "DATE_FORMAT" => CIBlockParameters::GetDateFormat(GetMessage("T_DATE_FORMAT"), "BASE"),
		)
	);
}
catch (Main\LoaderException $e)
{
	ShowError($e->getMessage());
}
?>