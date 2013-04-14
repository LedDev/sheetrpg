<?php
class DB
{
	private $sHost = 'localhost';
	private $sLogin = 'root';
	private $sPassword = '****';
	private $sDatabase = 'sheetrpg';
	
	public function getObject($sTable)
	{
		switch ($sTable)
		{
			case 'user':
				return new User();
				break;
			case 'sheet':
				return new Sheet();
				break;
			case 'game':
				return new Game();
				break;
		}
	}
	
	public function getValues($sTable, $sWhat = '', $mValue = '', $sColumns)
	{
		$oMysql = new mysqli($this->sHost, $this->sLogin,$this->sPassword,$this->sDatabase);
		$asColumns = explode(',', $sColumns);
		$sSQLQuery = 'SELECT ' . $sColumns . ' FROM '.$sTable;
		if ($sWhat != '')
		{
			$sSQLQuery .= ' where ' . $sWhat . ' = ' . $mValue;
		}
		$oResult = $oMysql->query($sSQLQuery);
		
		$aoResults = array();
		
		while($amRow = $oResult->fetch_assoc()){
			$oClass = $this->getObject($sTable);
			foreach ($asColumns as $sHead){
				$sFuncton = 'set'.$sHead;
				$oClass->$sFuncton($amRow[$sHead]);
			}
			$aoResults[] = $oClass;
		}
		
		return $this->checkEmpty($aoResults);
	}
	
	public function save($sTable, $oWhat)
	{
		$asColumns = explode(',', $oWhat->getColumns());
		if ($oWhat->getId() == 0)
		{
			$sSQL = 'INSERT INTO ' . $sTable . ' ('.$oWhat->getColumns().'
)
VALUES (
NULL ';
			foreach ($asColumns as $key => $sColumn)
			{
				if ($key != 0)
				{
					$function = 'get' . $sColumn;
					$sSQL .= ', \'' . $oWhat->$function() . '\'';
				}
			}
			$sSQL .= ');';
		}
		else 
		{
			$sSQL = 'UPDATE ' . $sTable . 
				' SET ';
			foreach ($asColumns as $sColumn)
			{
				$function = 'get' . $sColumn;
				$sSQL .= ' ' . $sColumn . '=' . $oWhat->$function();
			}
			$sSQL .= 'WHERE `user`.`Id` = ' . $oWhat->getId() . ';';
		}
		
		$oMysql = new mysqli($this->sHost, $this->sLogin,$this->sPassword,$this->sDatabase);
		$asColumns = explode(',', $oWhat->getColumns());
		$oResult = $oMysql->query($sSQL);
		return $oResult;
	}

	public function delete($sTable, $oWhat)
	{
		$oMysql = new mysqli($this->sHost, $this->sLogin,$this->sPassword,$this->sDatabase);
		$sSql = 'DELETE FROM ' . $sTable . ' WHERE Id = '.$oWhat->getId();
		$bReturn = $oMysql->query($sSql);
		return $bReturn;
	}
	
	private function checkEmpty($aoResults)
	{
		if (empty($aoResults))
		{
			return array(null);
		}
		else 
		{
			return $aoResults;
		}	
	}
}
