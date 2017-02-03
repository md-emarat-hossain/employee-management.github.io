<?php
include "database.php";
class user
{
  
  public $name="";
  public $email="";
  public $mobile="";
  public$uname="";
  public $pass="";
  public $skill="";
  public $add="";
  public $error="";
  public $success="";
  public $db;
  public $file;
  public $file_loc;
  public $file_size;
  public $file_type;
  public $folder;
  public function __construct()
  {

   $this->db=new database();
   //echo"hi";
  }
  public function validation($data)
  {
  	/*$this->name=$data['name'];
  	$this->email=$data['email'];
  	$this->mobile=$data['m_number'];
  	$this->uname=$data['u_name'];
  	$this->skill=$data['skill'];
  	$this->add=$data['add'];*/
    
  	if($data['name']!='' || $data['email']!=''|| $data['m_number']!=''|| $data['u_name']!=''|| $data['skill']!=''|| $data['add']!=''|| $data['pass']!=''||$data['rpass']!='')
  	{
  		if($data['pass']==$data['rpass'])
  		{
  			$cheak=$this->cheak_email($data['email']);
  			if($cheak==true)
  			{
  			$this->name=$data['name'];
		  	$this->email=$data['email'];
		  	$this->mobile=$data['m_number'];
		  	$this->uname=$data['u_name'];
		  	$this->skill=$data['skill'];
		  	$this->add=$data['add'];
		  	$this->pass=md5( $data['pass']);
        $this->file = rand(1000,100000)."-".$_FILES['file']['name'];
        $this->file_loc = $_FILES['file']['tmp_name'];
        $this->file_size = $_FILES['file']['size'];
        $this->file_type = $_FILES['file']['type'];
        $this->folder="uploads/";
        move_uploaded_file($this->file_loc,$this->folder.$this->file);

		  	return true;
		   	}
		   	else
		   	{
		   		echo "*This email id has allready been used";
		   	}
  		}
  		else
	  	{
	  		$this->error="*Password did not match";
	  		return $this->error;
	  	}

     
  	}
  	    
  }

  public function pass_db()
  {
    $sql="INSERT INTO employee_info(name,email,mobile_number,uname,pass,skill,address,file,type,size)VALUES('$this->name','$this->email','$this->mobile','$this->uname','$this->pass','$this->skill','$this->add','$this->file','$this->file_type',$this->file_size)";
    $result=$this->db->insert($sql);
    if($result==false)
    {
    	echo "problem";
    }

  }

  public function cheak_email($email_id)
  {
  	$sql="SELECT email FROM employee_info";
  	$result=$this->db->select($sql);
  	if($result->num_rows>0)
	{
  	while($row=$result->fetch_assoc())
  	{
  		if($row["email"]==$email_id)
  		{
  			return false;
  		}
  		else
  		{
  			return true;
  		}
  	}
  }
      else
    {
      return true;
    }
  }
}
?>