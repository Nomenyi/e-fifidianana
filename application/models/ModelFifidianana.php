<?php

class ModelFifidianana extends CI_Model
{

    public function saveCandidat($candidatNumero,$candidatName,$candidatFirstName,$candidatPhoto){
		
		$data = array(
			'candidatNumero' => $candidatNumero, 
			'candidatName' => $candidatName,
			'candidatFirstName' => $candidatFirstName,
			'candidatPhoto' => $candidatPhoto,
		);
		
		$this->db->insert('CANDIDAT',$data);
		return true;
    }
    
    public function getAllCandidat()
    {

        $sql = "SELECT * FROM CANDIDAT ORDER BY candidatNombreVote DESC";
        $query = $this->db->query($sql);
        $row = $query->result();
        return $row;

    }

    public function insertToVote($voteTotal, $voteBlanc, $voteMort) 
    {

        $data = [
            'voteTotal' => $voteTotal,
            'voteBlanc' => $voteBlanc,
            'voteMort' => $voteMort
        ];

        $this->db->insert('VOTE', $data);
        return true;

    }

    public function countCandidat() {

        $sql = "SELECT * FROM CANDIDAT";
        $query = $this->db->query($sql);
        return $query->num_rows();

    }

    public function updateCandidat($candidatId, $candidatNombreVote) {

        $sql = "UPDATE CANDIDAT SET candidatNombreVote = ? WHERE candidatId = ?";
        $query = $this->db->query($sql, array($candidatNombreVote, $candidatId));
        return $query;

    }

    public function selectToVote()
    {

        $sql1 = "SELECT * FROM VOTE WHERE voteId = 1";
        $res = $this->db->query($sql1);
        $result = $res->result();
        return $result;

    }

    public function selectWinner()
    {

        $sql1 = "SELECT * FROM VOTE WHERE voteId = 1";
        $res = $this->db->query($sql1);
        $result = $res->result_array();
        foreach ($result as $row) {
            $voteTotal = $row['voteTotal'];
            $voteBlanc = $row['voteBlanc'];
            $voteMort = $row['voteMort'];
        }

        $voteNonValide = $voteBlanc + $voteMort;

        $voteValide = $voteTotal - $voteNonValide;

        $moyenneVote = $voteValide / 2;

        $sql4 = "SELECT * FROM CANDIDAT";
        $query = $this->db->query($sql4);
        $nbrCandidat = $query->num_rows();

        for ($i=1; $i <= $nbrCandidat ; $i++) 
        { 
            
            $sql5 = "SELECT * FROM CANDIDAT WHERE candidatId = ?";
            $sql55 = $this->db->query($sql5, $i);
            $sql555 = $sql55->result();
            foreach ($sql555 as $sql5555) {
                $nbrVote = $sql5555->candidatNombreVote;
            }
            
            if ($nbrVote >= $moyenneVote) 
            {
                
                $idGagnant = $i;

                $sql6 = "SELECT * FROM CANDIDAT WHERE candidatId = ?";
                $queryWin = $this->db->query($sql6, array($idGagnant));
                $rowWin = $queryWin->num_rows();
                return $rowWin;

                break;

            } else
            {

                return "Aucun candidat n'a gagné l'election !";

            }
            
        }

    }

    public function deleteAllCandidat()
    {

        $sql = "TRUNCATE CANDIDAT";
        return $this->db->query($sql);

    }

    public function deleteAllVote()
    {

        $sql = "TRUNCATE VOTE";
        return $this->db->query($sql);

    }


}

?>