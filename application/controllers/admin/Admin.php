<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        chk_logged_admin();
        $this->load->model(ADMINCP . '/admin_model');
    }

    public function add_test_schedule()
    {
        $this->load->model(ADMINCP .'/qforms_model');
        $data['branches'] = $this->qforms_model->get_branch_list('Y');
        $data['standards'] = $this->qforms_model->get_standard_list('Y');
        $data['std_fields'] = $this->qforms_model->get_std_fields_list('Y');
        $this->load->view(ADMINCP.'/add_test_schedule',$data);
    }
    public function submit_test_schedule()
    {
        $branch = $this->input->post('branch');
        $standard = $this->input->post('standard');
        $standard_fld = $this->input->post('standard_fld');
        $subject = $this->input->post('subject');
        $chapter = $this->input->post('chapter');
        $marks = $this->input->post('marks');
        $test_datetime = strtotime($this->input->post('test_datetime'));

        $this->form_validation->set_rules('branch', 'Branch', 'trim|required|xss_clean');
        $this->form_validation->set_rules('standard', 'Standard', 'trim|required|xss_clean');
        $this->form_validation->set_rules('standard_fld', 'Standard Fields', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('chapter', 'Chapter', 'trim|required|xss_clean');
        $this->form_validation->set_rules('marks', 'Marks', 'trim|required|xss_clean');
        $this->form_validation->set_rules('test_datetime', 'Date', 'trim|required|xss_clean');

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status"=>"error","desc"=>validation_errors()));
        }
        else
        {
            $time = time();
            $test_data_array = array(
                'branch_id' => $branch,
                'std_id' => $standard,
                'sub_id' => $subject,
                'chap_id' => $chapter,
                'marks' => $marks,
                'test_datetime' => $test_datetime,
                'created_on' => $time,
                'modified_by_admin_uid' => $_SESSION['gn_admin_uid']
            );

            $test_id = $this->admin_model->add_test_schedule($test_data_array);
            if(!is_bool($test_id) && $test_id > 0) echo json_encode(array("status"=>"success","desc"=>"Test Added successfully"));

        }
    }

    public function add_lecture_schedule()
    {
        $this->load->model(ADMINCP .'/qforms_model');
        $data['branches'] = $this->qforms_model->get_branch_list('Y');
        $data['standards'] = $this->qforms_model->get_standard_list('Y');
        $data['std_fields'] = $this->qforms_model->get_std_fields_list('Y');
        $data['teachers'] = $this->qforms_model->get_teacher_details('Y');
        $this->load->view(ADMINCP.'/add_lecture_schedule',$data);
    }

    public function submit_lecture_schedule()
    {
        $branch = $this->input->post('branch');
        $standard = $this->input->post('standard');
        $standard_fld = $this->input->post('standard_fld');
        $subject = $this->input->post('subject');
        $teacher = $this->input->post('teacher');
        $lecture_datetime = strtotime($this->input->post('lecture_datetime'));
        $lecture_endtime = strtotime($this->input->post('lecture_endtime'));

        $this->form_validation->set_rules('branch', 'Branch', 'trim|required|xss_clean');
        $this->form_validation->set_rules('standard', 'Standard', 'trim|required|xss_clean');
        $this->form_validation->set_rules('standard_fld', 'Standard Fields', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('teacher', 'Teacher', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lecture_datetime', 'Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lecture_endtime', 'End Time', 'trim|required|xss_clean');

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status"=>"error","desc"=>validation_errors()));
        }
        else
        {
            $time = time();
            $lecture_data_array = array(
                'branch_id' => $branch,
                'std_id' => $standard,
                'sub_id' => $subject,
                'teacher_id' => $teacher,
                'lecture_datetime' => $lecture_datetime,
                'lecture_enddatetime'=>$lecture_endtime,
                'created_on' => $time,
                'modified_by_admin_uid' => $_SESSION['gn_admin_uid']
            );

            $test_id = $this->admin_model->add_lecture_schedule($lecture_data_array);
            if(!is_bool($test_id) && $test_id > 0) echo json_encode(array("status"=>"success","desc"=>"Test Added successfully"));

        }
    }

    public function get_students_result()
    {
        $data['students'] = $this->admin_model->get_students_detail('Y');
        $this->load->view(ADMINCP . '/students_result', $data);
    }

    public function add_student_result()
    {
        $student_name = $this->input->post('student_name');
        //$student_photo = $this->input->files('student_photo');
        $exam_type = $this->input->post('exam_type');
        $physics = $this->input->post('P');
        $chemistry = $this->input->post('C');
        $maths = $this->input->post('M');
        $biology = $this->input->post('B');

        $this->form_validation->set_rules('student_name', 'Student Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('exam_type', 'Student Exam Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('P', 'Physics', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('C', 'Chemistry', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('M', 'Maths', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('B', 'Biology', 'trim|required|xss_clean|numeric');
        if (!$this->form_validation->run())
        {
            echo json_encode(array("status"=>"error","desc"=>validation_errors()));
        }
        else
        {
            $time = time();
            $upload_img = $this->upload_image();
            $student_data_array = array(
                'student_name' => $student_name,
                'student_photo'=>$upload_img['file_name'],
                'created_on' => $time,
                'modified_by_admin_uid' => $_SESSION['gn_admin_uid']
            );

            $student_id = $this->admin_model->add_student($student_data_array);
            if(!is_bool($student_id) && $student_id > 0)
            {
                /*$student_dir = STUDENT_PIC.'/'.$student_id;
                if (!is_dir($student_dir))
                {
                    mkdir($student_dir, 0777, true);
                }
                $dir =$student_dir.'/'.$upload_img['file_name'];
                $upload_student_dir = move_uploaded_file($_FILES["student_photo"]["tmp_name"],$dir);*/
                $student_marks = json_encode(array('P'=>$physics,'C'=>$chemistry,'M'=>$maths,'B'=>$biology));
                $student_result_array = array(
                    'student_exam_type' => $exam_type,
                    'student_id'=>$student_id,
                    'student_marks' => $student_marks,
                    'created_on' => $time,
                    'modified_by_admin_uid' => $_SESSION['gn_admin_uid']
                );

                $this->admin_model->add_student_result($student_result_array);
                echo json_encode(array("status"=>"success","desc"=>"Added successfully"));
            }else echo json_encode(array("status"=>"error","desc"=>"Student Not Added!"));
        }
    }

    function rename_win($oldfile,$newfile) {
        if (!rename($oldfile,$newfile)) {
            if (copy ($oldfile,$newfile)) {
                unlink($oldfile);
                return TRUE;
            }
            return FALSE;
        }
        return TRUE;
    }

    public function upload_image()
    {
        $config['upload_path']          = STUDENT_PIC;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['overwrite']            = TRUE;
        $config['max_size']             = 1024 * 8;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['encrypt_name']           = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('student_photo'))
        {
            $error = array('error' => $this->upload->display_errors());
            $Error = strip_tags($error['error']);
            echo json_encode(array("status"=>"error","desc"=>$Error));
        }
        else
        {
            //$data = array('upload_data' => $this->upload->data());
            return $this->upload->data();
            //$this->load->view('upload_success', $data);
        }
    }

}