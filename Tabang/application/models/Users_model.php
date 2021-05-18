<?php
class Users_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_count(){
        $query = $this->db->query('SELECT count(*) as total from tbl_emergencyreport where status_seen = 0 AND tbl_emergencyreport.status_id = 0 ');
        $row = $query->row();

           return $row->total;
    }
    public function get_countRes($ID){
        $query = $this->db->query('SELECT count(*) as total from tbl_ForwardReport where status_seen = 0 AND Responder_ID = (SELECT Responder_ID from tbl_Responder where userInfo_ID = ' . $ID . ')');
        $row = $query->row();

           return $row->total;
    }
    public function updateSeen(){
        $updateData = array(
            'status_seen' =>'1'
        );
        $this->db->where('status_seen', '0');
        $this->db->update('tbl_emergencyreport', $updateData);

    }
    public function updateSeenRes($userID){
        $updateData = array(
            'status_seen' =>'1'
        );
        $this->db->where('status_seen', '0');
        $this->db->where('Responder_ID = (SELECT Responder_ID from tbl_Responder where userInfo_ID ='.$userID.')');
        $this->db->update('tbl_ForwardReport', $updateData);

        // echo($userID);
        echo $this->db->affected_rows();
    }
    public function get_requestEmer()
    {
                $query = $this->db->query('SELECT note,tbl_emergencyreport.addressDesc,tbl_emergencyreport.Ereport_ID,tbl_emergencyType.EmegencyType,tbl_Resident.*,tbl_emergencyreport.date,
                tbl_emergencyreport.longitude,tbl_emergencyreport.latitude,tbl_emergencyreport.EtypeID,tbl_emergencyreport.status_id,tbl_userinfo.LastName,
                tbl_userinfo.FirstName From tbl_Resident LEFT JOIN tbl_userinfo ON tbl_userinfo.userInfo_ID = tbl_Resident.userInfo_ID INNER JOIN tbl_emergencyreport 
                ON tbl_emergencyreport.resident_ID = tbl_Resident.resident_ID INNER JOIN tbl_emergencyType ON tbl_emergencyType.EtypeID = tbl_emergencyreport.EtypeID 
                 WHERE tbl_emergencyreport.status_id = 0 ORDER BY tbl_emergencyreport.Ereport_ID DESC');
                return $query->result();
           
    }
    public function get_requestEmerForwarded()
    {
        $query = $this->db->query('SELECT tbl_emergencyType.EmegencyType,tbl_ForwardReport.Status_incident,tbl_ForwardReport.Freport_ID,
        tbl_ForwardReport.Admin_ID,tbl_emergencyreport.*, tbl_Responder.ContactNumber,tbl_Responder.Department,tbl_Responder.Responder_ID FROM 
        `tbl_ForwardReport` Left JOIN tbl_emergencyreport ON tbl_emergencyreport.Ereport_ID = tbl_ForwardReport.Ereport_ID RIGHT JOIN tbl_Responder 
        ON tbl_Responder.Responder_ID = tbl_ForwardReport.Responder_ID left join tbl_emergencyType on tbl_emergencyType.EtypeID = tbl_emergencyreport.EtypeID 
        WHERE tbl_emergencyreport.status_id = 1 ORDER BY tbl_emergencyreport.Ereport_ID DESC');
        return $query->result();
    }



    public function get_userinfo()
    {

        $query = $this->db->query('SELECT tbl_userinfo.*,tbl_Responder.Address,tbl_Responder.ContactNumber,tbl_Responder.Department FROM tbl_userinfo LEFT JOIN 
        tbl_Responder ON tbl_Responder.userInfo_ID = tbl_userinfo.userInfo_ID WHERE tbl_userinfo.userLevel = "Responder" UNION SELECT 
        tbl_userinfo.*,tbl_Resident.Address,tbl_Resident.ContactNumber, tbl_userinfo.userLevel FROM tbl_userinfo LEFT JOIN tbl_Resident ON 
        tbl_Resident.userInfo_ID = tbl_userinfo.userInfo_ID WHERE tbl_userinfo.userLevel = "Resident"');
        return $query->result();
    }


    public function CreateRes($responderDatauserinfo, $responderData)
    {
        if ($this->db->insert('tbl_userinfo', $responderDatauserinfo)) {
            $query1 = $this->db
                ->select('userInfo_ID')
                ->where('emailAddress', $responderDatauserinfo['emailAddress'])
                ->get('tbl_userinfo');
            $res = $query1->row_array();

            $data = [
                'userInfo_ID' => $res['userInfo_ID'],
                'Address' => $responderData['Address'],
                'Department' => $responderData['Department'],
                'ContactNumber' => $responderData['ContactNumber'],
            ];
            return $this->db->insert('tbl_Responder', $data);
        } 
    }
    public function CreateResident($residentDatauserinfo, $residentData)
    {
        if ($this->db->insert('tbl_userinfo', $residentDatauserinfo)) {
            $query1 = $this->db
                ->select('userInfo_ID')
                ->where('emailAddress', $residentDatauserinfo['emailAddress'])
                ->get('tbl_userinfo');
            $res = $query1->row_array();

            $data = [
                'userInfo_ID' => $res['userInfo_ID'],
                'Address' => $residentData['Address'],
                'ContactNumber' => $residentData['ContactNumber'],
            ];
            return $this->db->insert('tbl_Resident', $data);
        }
    }
    public function ForwardTo_Mod($Forwardtores)
    {
        return $this->db->insert('tbl_ForwardReport', $Forwardtores);
    }
    public function get_responder()
    {
        $query = $this->db->query('SELECT * FROM tbl_Responder');

        return $query->result();
    }
    public function get_userinfoIDonly()
    {
        $query = $this->db->query('SELECT * FROM tbl_userinfo');

        return $query->result();
    }
    public function get_Freport_id()
    {
        $query = $this->db->query('SELECT * FROM tbl_ForwardReport');

        return $query->result();
    }
    public function FUpdatestat($Freport_ID, $Status_incident)
    {
        $updateData = array(
            'Status_incident' => $Status_incident
        );
        $this->db->where('Freport_ID', $Freport_ID);
        $this->db->update('tbl_ForwardReport', $updateData);
    }
    public function Updatestat($Ereport_I)
    {
        $updateData = array(
            'status_id' => '1'
        );
        $this->db->where('Ereport_ID', $Ereport_I);
        $this->db->update('tbl_emergencyreport', $updateData);
    }
    public function delete($ID)
    {
        return $this->db->delete('tbl_userinfo', array('userInfo_ID' => $ID));
    }

    public function getresponderId($userID)
    {

        $query = $this->db
            ->Select('*')
            ->where('userInfo_ID', $userID)
            ->get('tbl_Responder');
        return $query->result();
    }
    public function getresponderfromForward($Responder_ID)
    {
        $query = $this->db->query('SELECT tbl_emergencyreport.note, tbl_emergencyreport.addressDesc,tbl_emergencyType.EmegencyType,tbl_Resident.ContactNumber,tbl_ForwardReport.Status_incident,tbl_ForwardReport.Freport_ID,
        tbl_ForwardReport.Admin_ID,tbl_emergencyreport.*,tbl_Responder.Department,tbl_Responder.Responder_ID FROM `tbl_ForwardReport` 
        Left JOIN tbl_emergencyreport ON tbl_emergencyreport.Ereport_ID = tbl_ForwardReport.Ereport_ID RIGHT JOIN tbl_Responder ON 
        tbl_Responder.Responder_ID = tbl_ForwardReport.Responder_ID LEFT JOIN tbl_Resident ON tbl_Resident.resident_ID = tbl_emergencyreport.resident_ID left join tbl_emergencyType on 
        tbl_emergencyType.EtypeID = tbl_emergencyreport.EtypeID
         WHERE tbl_emergencyreport.status_id = 1 AND tbl_Responder.Responder_ID = ' . $Responder_ID . ' AND 
         tbl_ForwardReport.Status_incident = "Pending" OR tbl_ForwardReport.Status_incident = "OnGoing" ORDER BY Freport_ID DESC');
        return $query->result();
    }
    public function getresponderfromForwardDONE($Responder_ID)
    {
        $query = $this->db->query('SELECT tbl_Resident.ContactNumber,tbl_ForwardReport.Status_incident,tbl_ForwardReport.Freport_ID,
        tbl_ForwardReport.Admin_ID,tbl_emergencyreport.*,tbl_Responder.Department,tbl_Responder.Responder_ID FROM `tbl_ForwardReport` 
        Left JOIN tbl_emergencyreport ON tbl_emergencyreport.Ereport_ID = tbl_ForwardReport.Ereport_ID RIGHT JOIN tbl_Responder ON 
        tbl_Responder.Responder_ID = tbl_ForwardReport.Responder_ID LEFT JOIN tbl_Resident ON tbl_Resident.resident_ID = tbl_emergencyreport.resident_ID
         WHERE tbl_emergencyreport.status_id = 1 AND tbl_ForwardReport.Status_incident = "Done" AND tbl_Responder.Responder_ID =' . $Responder_ID.' ORDER BY tbl_emergencyreport.Ereport_ID DESC');
        return $query->result();
    }
}