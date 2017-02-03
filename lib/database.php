<?php
include "config.php";
class database
{
	private $host=DB_HOST;
	private $username=DB_UNAME;
	private $pass=DB_PASS;
	private $db=DB_NAME;
	private $conn;
	public $error="";
	public function __construct()
	{
       $this->connectDb();
       // $this->connectDb();
	}
	private function connectDb()
	{
      $this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db);
      //echo "problem";
      //.$this->conn->connect_error;
      if(!$this->conn)
      {
      	//echo $this->conn->connect_error;
      	return $this->error;
      }
      else
      {
      	//echo "hi";
       return true;	
      }
	}
	public function insert($sql)
	{
		$this->conn->query($sql);
		$this->error=$this->conn->error;
		//echo $this->error;
		if($this->error!="")
		{
			echo $this->error;
			return false;
		}
		else
		{
			return true;
		}

	}

	public function select($sql)
	{
		$result=$this->conn->query($sql);
		$this->error=$this->conn->error;
		if($this->error!="")
		{
			echo $this->error;
			return false;
		}
		else
		{
			if($result->num_rows>0)
			{
			return $result;
		    }
		}
	}


	public function update($sql)
	{
      $result=$this->conn->query($sql);
	  $this->error=$this->conn->error;
	  if($this->error!="")
		{
			echo $this->error;
			return false;
		}
		else
		{
			return true;
		}
	}
}
?>