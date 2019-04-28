<?PHP
class Notification
{
	private $id;
	private $user;

function __construct($user){
		
		$this->user=$user;
	}

	function getId(){
		return $this->id;
	}

	function getUser(){
		return $this->user;
	}

	/*function setId($id){
		$this->id=$id;
	}

	function setUser($user){
		$this->user=$user;
	}*/


}
?>