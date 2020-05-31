<?php
class Assistant_model extends CI_Model{
	public function _construct(){
		parent::_construct();
	}

	public function validate_course($id_cours)
	{
		$data = array('acceptedCours' => 1);
		$this->db->where('idCours',$id_cours);
		$result = $this->db->update('Cours',$data);
		return $result;
	}
	public function cancel_notval_course($id_cours)
	{
		$data = array('acceptedCours' => 'FALSE');
		$this->db->where('id_cours');
		$result = $this->db->update('Cours',$data);
		return $result;
	}
	public function get_salle($id_salle)
	{
		$this->db->select("*");
		$this->db->from("Salle");
		$this->db->join('TypeSalle', 'FIND_IN_SET(Salle.idTypeSalle, TypeSalle.idTypeSalle) > 0', 'left ');
		$this->db->where('idSalle',$id_salle);
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}
	public function get_all_salle()
	{
		$this->db->select("*");
		$this->db->from("Salle");
		$this->db->join('TypeSalle', 'FIND_IN_SET(Salle.idTypeSalle, TypeSalle.idTypeSalle) > 0', 'left ');
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}
	public function get_courses()
	{
		$this->db->select("*");
		$this->db->from("Cours");
		$this->db->where("Cours.dateCours >=", date('Y-m-d'));
		$this->db->join('Ecue', 'FIND_IN_SET(Cours.idEcue, Ecue.idEcue) > 0', 'left ');
		$this->db->where('idSalle IS NULL OR idSalle =""');
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}

	function update_appoinment_status($data , $data1){
		         $this->db->where('id',$data);
				 $result = $this->db->update('appointment',$data1);
				 return $result; 
	}

}
?>