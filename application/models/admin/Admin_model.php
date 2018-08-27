<?php
class Admin_model extends CI_Model
{
    //////Add Test Schedule//////
    function add_test_schedule($data)
    {
        $sql = $this->db->insert('test_schedule', $data);
        if ($sql) return $this->db->insert_id();
    }

    //////Add Lecture Schedule//////
    function add_lecture_schedule($data)
    {
        $sql = $this->db->insert('lecture_schedule', $data);
        if ($sql) return $this->db->insert_id();
    }
    //////Get Student Details//////
    function get_students_detail($status = 'all')
    {
        $this->db->select('students.*,students_result.student_exam_type,students_result.student_marks');
        $this->db->from('students');
        $this->db->join('students_result','students.student_id=students_result.student_id');
        if($status != 'all') $this->db->where("students.student_active",$status);
        $query=$this->db->get();
        if ($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }

    }
    //////Add Student//////
    function add_student($data)
    {
        $sql = $this->db->insert('students', $data);
        if ($sql) return $this->db->insert_id();
    }

    //////Add Student Result//////
    function add_student_result($data)
    {
        $sql = $this->db->insert('students_result', $data);
        if ($sql) return $this->db->insert_id();
    }
}
?>