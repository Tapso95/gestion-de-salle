<?php
class Welcome_Model extends CI_Model
{
	public function _construct(){
		parent::_construct();
	}

	public function get_teacher_prop($id)
	{
		// $this->db->select("*");
		// $this->db->from('Cours');		
		// $this->db->join('TypeCours', 'FIND_IN_SET(TypeCours.idTypeCours, Cours.idTypeCours) > 0', 'left ');
		// $this->db->join('TypeCours', 'FIND_IN_SET(TypeCours.idTypeCours, Cours.idTypeCours) > 0', 'left ');
		$sql = "select * from Cours left join TypeCours on TypeCours.idTypeCours = Cours.idTypeCours left join Ecue on Ecue.idEcue = Cours.idEcue left join DetailEcueEnseignant on DetailEcueEnseignant.idEcue = Ecue.idEcue where Cours.acceptedCours = 'TRUE' and Cours.dateCours >=".date("Y-m-d")." and  DetailEcueEnseignant.idEnseignant = ".$id;
		$result = $this->db->query($sql);
		return $result->result();  
	}
	public function get_type_cours()
	{
		$this->db->select("*");
		$this->db->from("TypeCours");
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}
	public function get_ecue()
	{
		$this->db->select("*");
		$this->db->from("Ecue");
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}
	public function get_teacher_ecue($id)
	{
		$this->db->select("*");
		$this->db->from("Ecue");
		$this->db->join('DetailEcueEnseignant', 'FIND_IN_SET(DetailEcueEnseignant.idEcue, Ecue.idEcue) > 0', 'left ');
		   $this->db->where("DetailEcueEnseignant.idEnseignant", $id);
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}
	public function get_all_ecue()
	{
		$this->db->select("*");
		$this->db->from("Ecue");
		$this->db->join('UniteEnseignement', 'FIND_IN_SET(UniteEnseignement.idUe, Ecue.idUe) > 0', 'left ');
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}
	public function get_salle()
	{
		$this->db->select("*");
		$this->db->from("Salle");
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}

	public function get_all_teacher()
	{
		$this->db->select("*");
		$this->db->from("Enseignant");
		$this->db->join('Poste', 'FIND_IN_SET(Poste.idPoste, Enseignant.idPoste) > 0', 'left ');
		$this->db->join('Departement', 'FIND_IN_SET(Departement.idDepartement, Enseignant.idDepartement) > 0', 'left ');
		$this->db->join('Grade', 'FIND_IN_SET(Grade.idGrade, Enseignant.idGrade) > 0', 'left ');
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}
	public function get_teacher($id_theacher)
	{
		$this->db->select("*");
		$this->db->from("Enseignant");
		$this->db->join('Poste', 'FIND_IN_SET(Poste.idPoste, Enseignant.idPoste) > 0', 'left ');
		$this->db->join('Departement', 'FIND_IN_SET(Departement.idDepartement, Enseignant.idDepartement) > 0', 'left ');
		$this->db->join('Grade', 'FIND_IN_SET(Grade.idGrade, Enseignant.idGrade) > 0', 'left ');
	   	$this->db->where("Enseignant.idEnseignant", $id_theacher);
		$query = $this->db->get();
		$result = $query->result();			
		return $result;
	}

	public function get_all_course()
	{
		$this->db->select("*");
		$this->db->from('Cours');		
		$this->db->join('TypeCours', 'FIND_IN_SET(TypeCours.idTypeCours, Cours.idTypeCours) > 0', 'left ');
		$this->db->join('Ecue', 'FIND_IN_SET(Ecue.idEcue, Cours.idEcue) > 0', 'left ');
		$this->db->join('DetailEcueEnseignant', 'FIND_IN_SET(DetailEcueEnseignant.idEcue, Ecue.idEcue) > 0', 'left ');
		$this->db->join('Enseignant', 'FIND_IN_SET(DetailEcueEnseignant.idEnseignant, Enseignant.idEnseignant) > 0', 'left ');
		$this->db->where("Cours.dateCours >=", date('Y-m-d'));
		$this->db->limit(10);
		$query = $this->db->get();
		$result = $query->result();			
		return $result; 
	} 
	public function get_notvalide_course()
	{
		$this->db->select("*");
		$this->db->from('Cours');		
		$this->db->join('TypeCours', 'FIND_IN_SET(TypeCours.idTypeCours, Cours.idTypeCours) > 0', 'left ');
		$this->db->join('Ecue', 'FIND_IN_SET(Ecue.idEcue, Cours.idEcue) > 0', 'left ');
		$this->db->join('DetailEcueEnseignant', 'FIND_IN_SET(DetailEcueEnseignant.idEcue, Ecue.idEcue) > 0', 'left ');
		$this->db->join('Enseignant', 'FIND_IN_SET(DetailEcueEnseignant.idEnseignant, Enseignant.idEnseignant) > 0', 'left ');
		$this->db->where("Cours.acceptedCours", "FALSE");
		$this->db->where("Cours.enabledCours", "TRUE");
		$query = $this->db->get();
		$result = $query->result();			
		return $result; 
	}

	    // insert data
    function insert($table,$data)
    {
        $this->db->insert($table, $data);
    }
}
?>