<?php
class Sheet
{
	private $iId;
	private $sName;
	private $iTypeId;
	private $iGameId;
	
	public function getColumns()
	{
		return 'Id,Name,TypeId,GameId';
	}

	public function getById($iId)
	{
		$db = new DB();
		$aoResults = $db->getValues('sheet','Id', $iId, $this->getColumns());
		return $aoResults[0];
	}
	
	public function getByUserId($iUserId)
	{
		$oGame = new Game();
		$gamelist = $oGame->getByUserId($iUserId);
		$aoResults = array();
		foreach ($gamelist as $game){
			if ($game != null)
				$aoResults = array_merge($aoResults,$this->getByGameId($game->getId()));
		}
		return $aoResults;
	}
	
	public function getByGameId($iGameId)
	{
		$db = new DB();
		$aoResults = $db->getValues('sheet','GameId', $iGameId, $this->getColumns());
		return $aoResults;
	}
	
	public function getId()
	{
		return $this->iId;
	}
	
	public function setId($iId)
	{
		$this->iId = $iId;
	}
	
	public function getName()
	{
		return $this->sName;
	}
	
	public function setName($sName)
	{
		$this->sName = $sName;
	}
	
	public function getTypeId()
	{
		return $this->iTypeId;
	}
	
	public function setTypeId($iTypeId)
	{
		$this->iTypeId = $iTypeId;
	}
	
	public function getGameId()
	{
		return $this->iGameId;
	}
	
	public function setGameId($iGameId)
	{
		$this->iGameId = $iGameId;
	}
}