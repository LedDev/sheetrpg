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
	
	public function getById()
	{
		mysqli_connect('localhost','root','J0SE_G','sheetrpg');
		return $oSheet;
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