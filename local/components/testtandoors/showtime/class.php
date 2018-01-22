<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc as Loc;

class TesttandoorsShowtimeComponent extends CBitrixComponent
{
    /**
     * тегированный кеш
     * @var mixed
     */
    protected $tagCache;
	
	/**
	 * подключает языковые файлы
	 */
	public function onIncludeComponentLang()
	{
		$this->includeComponentLang(basename(__FILE__));
		Loc::loadMessages(__FILE__);
	}
	
    /**
     * подготавливает входные параметры
     * @param array $arParams
     * @return array
     */
    public function onPrepareComponentParams($params)
    {
        $result = array(
            'DATE_FORMAT' => trim($params['DATE_FORMAT']),
        );
        return $result;
    }
	

	
	/**
	 * проверяет подключение необходиимых модулей
	 * @throws LoaderException
	 */
	protected function checkModules()
	{
		if (!Main\Loader::includeModule('iblock'))
			throw new Main\LoaderException(Loc::getMessage('STANDARD_ELEMENTS_LIST_CLASS_IBLOCK_MODULE_NOT_INSTALLED'));
	}
	


	/**
	 * получение результатов
	 */
	protected function getResult()
	{
        $this->arResult["DATE"]=\CIBlockFormatProperties::DateFormat($this->arParams["DATE_FORMAT"],time());
	}
	

	/**
	 * выполняет логику работы компонента
	 */
	public function executeComponent()
	{

		try
		{
            $this->checkModules();
            $this->getResult();
            $this->includeComponentTemplate();
		}
		catch (Exception $e)
		{

			ShowError($e->getMessage());
		}
	}
}
?>