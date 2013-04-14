<?php

class Game extends AbstractClass
{
	private $iId;
	private $sName;
	private $iTypeId;
	private $iUserId;
	
	public function getColumns()
	{
		return 'Id,Name,TypeId,UserId';
	}
	
	public function __construct($iId = '')
	{
		if ($iId != ''){
			return $this->getById($iId);
		}
	}
	
	public function getById($iId)
	{
		$db = new DB();
		$aoResults = $db->getValues('game','Id', $iId, $this->getColumns());
		return $aoResults[0];
	}
	
	/**
	 * Return an array of the objects
	 * @param integer $iId
	 */
	public function getByUserId($iId)
	{
		$db = new DB();
		return $db->getValues('game','UserId', $iId, $this->getColumns());
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
	
	public function getUserId()
	{
		return $this->iUserId;
	}
	
	public function setUserId($iUserId)
	{
		$this->iUserId = $iUserId;
	}
}