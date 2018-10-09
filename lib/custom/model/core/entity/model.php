<?php

class Core_Entity_Model
{

    protected $Orm  = null;

	protected $aEntityVars = array(
		"name" => "root",
		"value" => "",
		"xslPath" => "",
		"custom_tag" => ""
	); 

	//Массив дочерних сущьностей
	protected $childrenObjects = array();


	public function __construct(){}


	public function entityName($val = null)
	{
		if(is_null($val)) return $this->aEntityVars["name"];
		else $this->aEntityVars["name"] = $val;
		return $this;
	}


	public function entityValue($val = null)
	{
		if(is_null($val)) return $this->aEntityVars["value"];
		else $this->aEntityVars["value"] = strval($val);
		return $this;
	}


	public function xsl($val = null)
	{
		if(is_null($val)) return $this->aEntityVars["xslPath"];
		$this->aEntityVars["xslPath"] = ROOT . "/xsl/" . $val;
		return $this;
	}


	public function custom_tag($val = null)
	{
		if(is_null($val))	return $this->aEntityVars['custom_tag'];
		$this->aEntityVars["custom_tag"] = $val;
		return $this;
	}

}