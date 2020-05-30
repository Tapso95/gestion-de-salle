<?php
class Login_model extends CI_Model{
	public function _construct(){
		parent::_construct();
	}
	public function Role_login($email, $password){	   
		$this->db->select('idEtudiant as id, prenomEtudiant as prenom, emailEtudiant as email, passwordEtudiant, nomEtudiant as nom');
		$this->db->from('Etudiant');
		$this->db->where('emailEtudiant', $email);
		//$this->db->where('statutEtudiant', 1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1){
			$result = $query->row();
			$result->super_person = 1;
			$result->sub_person = 0;
			return $result;
		}else{
			$this->db->select('Enseignant.idEnseignant as id, Enseignant.prenomEnseignant as prenom, Enseignant.emailEnseignant as email, Enseignant.passwordEnseignant, Enseignant.nomEnseignant as nom, Enseignant.idPoste as poste');
			$this->db->from('Enseignant');
			//$this->db->join('Poste', 'FIND_IN_SET(Poste.idPoste, Enseignant.idPoste) > 0', 'left ');
			$this->db->where('emailEnseignant', $email);
			//$this->db->where('statutEnseignant', 1);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1){
				$result = $query->row();
				$result->super_person = 2;
				$result->sub_person = $result->poste;
				return $result;
			}
			else{
				$this->db->select('idSurveillant as id, nomSurveillant as nom, prenomSurveillant as prenom, passwordSurveillant as password');
				$this->db->from('Surveillant');
				$this->db->where('emailSurveillant', $email);
				// $this->db->where('statutSurveillant', 1);
				$this->db->limit(1);
				$query = $this->db->get();
				if ($query->num_rows() == 1){
					$result = $query->row();
					$result->super_person = 3;
					$result->sub_person = 0;
					return $result;
				}
				else{
					return false;
				}
			}
		}
	}

}
?>