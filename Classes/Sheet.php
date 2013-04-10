<?php
class Sheet
{
	private $iId;
	private $sName;
	private $iTypeId;
	private $iGameId;
	
	private function getColumns()
	{
		return 'Id,Name,TypeId,GameId';
	}

	public function getById($iId)
	{
		$aoResults = DB::getValues('sheet','Id', $iId, $this->getColumns());
		return $aoResults[0];
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