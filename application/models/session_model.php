<?php
class Session_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->model('Person');
    }
    
    function validate($id, $password)
    {  
   		$person = $this->Person->find_row('person_ID', $id);

    	// If user doesn't exist or if user's status <3, exit
		if(!$person || $person->person_Access <= 2):
		
			return false;
		
		endif;
					
		// If input password and user password match, give cookie
		if($password == $person->person_Password):
			
			return $person;
			
		else:
			
			return false;
		
		endif;
    }
    	
	function destroy()
	{
		setcookie("bish", '', time()-3600,  "/");
		setcookie("bash", '', time()-3600,  "/");
	}
	
	function full_validate()
	{
		if($person = $this->validate($this->input->cookie('bash'), $this->input->cookie('bish'))):
		
			return $person;

		else:
		
			header('Location: /sonar/sessions');
		
		endif;
	}
	
}