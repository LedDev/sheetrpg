<?php

class User extends AbstractClass
{
	private $iId;
	private $sName;
	private $sLogin;
	private $sPassword;

	public function getColumns()
	{
		return 'Id,Name,Login,Password';
	}

	public function getById($iId)
	{
		$db = new DB();
		$aoResults = $db->getValues('user','Id', $iId, $this->getColumns());
		return $aoResults[0];
	}

	public function getByLogin($sLogin)
	{
		$db = new DB();
		$aoResults = $db->getValues('user','Login', '\''.$sLogin.'\'', $this->getColumns());
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

	public function getLogin()
	{
		return $this->sLogin;
	}

	public function setLogin($sLogin)
	{
		$this->sLogin = $sLogin;
	}

	public function getPassword()
	{
		return $this->sPassword;
	}

	public function setPassword($sPassword)
	{
		$this->sPassword = $sPassword;
	}
}