<?php
class Home_model extends CI_Model
{
    //////Get Test Schedule//////
    function get_test_schedule_by_std_id($branch_id,$std_id,$status = 'all')
    {
        $this->db->select('test_schedule.*,chapters.chap_title,subjects.subject_name,standards.std_name');
        $this->db->from('test_schedule');
        $this->db->join('chapters','test_schedule.chap_id=chapters.chap_id');
        $this->db->join('subjects','subjects.sub_id=test_schedule.sub_id');
        $this->db->join('standards','standards.std_id=test_schedule.std_id');
        $this->db->join('branch','branch.branch_id=test_schedule.branch_id');
        $this->db->where('test_schedule.branch_id',$branch_id);
        $this->db->where('test_schedule.std_id',$std_id);
        if($status != 'all') $this->db->where("test_schedule.test_active",$status);
        //$this->db->order_by('test_schedule.test_datetime');
        $query=$this->db->get();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }

    //////Get Lecture Schedule//////
    function get_lecture_schedule_by_std_id($branch_id,$std_id,$status = 'all')
    {
        $this->db->select('lecture_schedule.*,subjects.subject_name,standards.std_name,teachers.teacher_name');
        $this->db->from('lecture_schedule');
        $this->db->join('teachers','lecture_schedule.teacher_id=teachers.teacher_id');
        $this->db->join('subjects','subjects.sub_id=lecture_schedule.sub_id');
        $this->db->join('standards','standards.std_id=lecture_schedule.std_id');
        $this->db->join('branch','branch.branch_id=lecture_schedule.branch_id');
        $this->db->where('lecture_schedule.branch_id',$branch_id);
        $this->db->where('lecture_schedule.std_id',$std_id);
        if($status != 'all') $this->db->where("lecture_schedule.lecture_active",$status);
        $this->db->order_by('lecture_schedule.lecture_datetime');
        $query=$this->db->get();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
    }

    //////Get Distinct Date time from lecture table//////
    function get_lecture_datetime($branch_id,$std_id,$status = 'all')
    {
        $this->db->select('FROM_UNIXTIME(`lecture_datetime`,"%Y-%d-%m") AS distinct_date,lecture_datetime');
        $this->db->from('lecture_schedule');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('std_id',$std_id);
        if($status != 'all') $this->db->where("lecture_active",$status);
        $this->db->group_by('distinct_date');
        $query=$this->db->get();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }

    }

    //////Add Visitors Data//////
    function add_visitor_data($data)
    {
        $sql = $this->db->insert('visitors', $data);
        if ($sql) return $this->db->insert_id();
    }

}
?>