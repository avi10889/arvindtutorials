<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Qforms extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        chk_logged_admin();
        $this->load->model(ADMINCP . '/qforms_model');
    }

    /////Faisal Controllers//////
    public function add_question()
    {
        $data['standards'] = $this->qforms_model->get_standard_list('Y');
        $data['std_fields'] = $this->qforms_model->get_std_fields_list('Y');
        $this->load->view(ADMINCP.'/add_question',$data);
    }

    function get_subjects()
    {
        $std_fld = $this->input->post('standard_fld');
        $sub_list_val = '';
        if(isset($std_fld) && $std_fld != "")
        {
            $sub_list = $this->qforms_model->get_subject_list_by_id($std_fld,'Y');
            $sub_list_val .= '<option value="">Select</option>';
            if(is_array($sub_list))
            {
                foreach($sub_list as $sub)
                {
                    $sub_list_val .= '<option value="'.$sub['sub_id'].'">'.$sub['subject_name'].'</option>';
                }
                echo "success|@|".$sub_list_val;
            }
            else echo "success|@|".$sub_list_val;
        }
        else echo "error|@|Please select standard field!";
    }

    function get_chapters()
    {
        $std = $this->input->post('standard');
        $subject = $this->input->post('subject');
        $chap_list_val = '';
        if(isset($std) && isset($subject) && $std != "" && $subject != "")
        {
            $chap_list = $this->qforms_model->get_chapter_list_by_id($std,$subject,'Y');
            $chap_list_val .= '<option value="">Select</option>';
            if(is_array($chap_list))
            {
                foreach($chap_list as $chap)
                {
                    $chap_list_val .= '<option value="'.$chap['chap_id'].'">'.$chap['chap_title'].'</option>';
                }
                echo "success|@|".$chap_list_val;
            }
            else echo "success|@|".$chap_list_val;
        }
        else echo "error|@|Please select subject and standard!";
    }

    function submit_question()
    {
        $standard = $this->input->post('standard');
        $standard_fld = $this->input->post('standard_fld');
        $subject = $this->input->post('subject');
        $chapter = $this->input->post('chapter');
        $question_type = $this->input->post('question_type');
        $question = $this->input->post('question');
        $th_answer = $this->input->post('th_answer');
        $mcq_opt_1 = $this->input->post('mcq_opt_1');
        $mcq_opt_2 = $this->input->post('mcq_opt_2');
        $mcq_opt_3 = $this->input->post('mcq_opt_3');
        $mcq_opt_4 = $this->input->post('mcq_opt_4');
        $mcq_ans = $this->input->post('mcq_ans');
        $marks = $this->input->post('marks');

        $required_mcq_options = ($question_type == 'mcq') ? "|required" : '';

        $this->form_validation->set_rules('standard', 'Standard', 'trim|required|xss_clean');
        $this->form_validation->set_rules('standard_fld', 'Standard Fields', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('chapter', 'Chapter', 'trim|required|xss_clean');
        $this->form_validation->set_rules('question_type', 'Question Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('question', 'Question', 'trim|required|xss_clean');
        $this->form_validation->set_rules('marks', 'Marks', 'trim|required|xss_clean');
        $this->form_validation->set_rules('th_answer', 'Theory Answer', 'trim|xss_clean');
        $this->form_validation->set_rules('mcq_opt_1', 'MCQ Option 1', 'trim|xss_clean'.$required_mcq_options);
        $this->form_validation->set_rules('mcq_opt_2', 'MCQ Option 2', 'trim|xss_clean'.$required_mcq_options);
        $this->form_validation->set_rules('mcq_opt_3', 'MCQ Option 3', 'trim|xss_clean'.$required_mcq_options);
        $this->form_validation->set_rules('mcq_opt_4', 'MCQ Option 4', 'trim|xss_clean'.$required_mcq_options);

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status"=>"error","desc"=>validation_errors()));
        }
        else
        {


            $time = time();
            if($question_type == 'theory')
            {
                $ques_data_array = array(
                    'ques_type' => $question_type,
                    'question' => $question,
                    'chap_id' => $chapter,
                    'marks' => $marks,
                    'created_on' => $time,
                    'modified_by_admin_uid' => $_SESSION['gn_admin_uname']
                );

                $ques_id = $this->qforms_model->add_question($ques_data_array);
                if(!is_bool($ques_id) && $ques_id > 0)
                {
                    $ans_data_array = array(
                        'ques_id' => $ques_id,
                        'answer' => $th_answer,
                        'created_on' => $time,
                        'modified_by_admin_uid' => $_SESSION['gn_admin_uname']
                    );

                    $this->qforms_model->add_answer($ans_data_array);
                    echo json_encode(array("status"=>"success","desc"=>"Added successfully"));
                }
            }
            elseif($question_type == 'mcq')
            {
                $mcq_options_data = json_encode(array($mcq_opt_1,$mcq_opt_2,$mcq_opt_3,$mcq_opt_4));
                $ques_data_array = array(
                    'ques_type' => $question_type,
                    'question' => $question,
                    'chap_id' => $chapter,
                    'mcq_options' => $mcq_options_data,
                    'marks' => $marks,
                    'created_on' => $time,
                    'modified_by_admin_uid' => $_SESSION['gn_admin_uid']
                );

                $ques_id = $this->qforms_model->add_question($ques_data_array);
                if(!is_bool($ques_id) && $ques_id > 0)
                {
                    $mcq_correct_ans = "";
                    switch($mcq_ans)
                    {
                        case 1: $mcq_correct_ans = $mcq_opt_1;
                            break;

                        case 2: $mcq_correct_ans = $mcq_opt_2;
                            break;

                        case 3: $mcq_correct_ans = $mcq_opt_3;
                            break;

                        case 4: $mcq_correct_ans = $mcq_opt_4;
                            break;
                    }

                    $ans_data_array = array(
                        'ques_id' => $ques_id,
                        'answer' => $mcq_correct_ans,
                        'created_on' => $time,
                        'modified_by_admin_uid' => $_SESSION['gn_admin_uid']
                    );

                    $this->qforms_model->add_answer($ans_data_array);
                    echo json_encode(array("status"=>"success","desc"=>"Added successfully"));
                }

            }




        }
    }



    //////Avinash Controllers//////
    function boards()
    {
        $data['boards'] = $this->qforms_model->get_board_list('all');
        $this->load->view(ADMINCP . '/boards', $data);
    }

    function add_board()
    {
        $this->form_validation->set_rules('board_name', 'Board Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('board_state', 'Board State', 'trim|required|xss_clean');

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status" => "error", "desc" => validation_errors()));
        }
        else
        {
            $data=array(
                "board_name"=>$this->input->post('board_name'),
                "board_state"=>$this->input->post('board_state'),
                "board_created_on"=>time()
            );
            $add_board = $this->qforms_model->add_board($data);
            if ($add_board) echo json_encode(array("status" => "success", "desc" => "Data Saved Successfully!"));

        }
    }

    function update_board()
    {
        if (!empty($this->input->post('board_id')) && !empty($this->input->post('edit_board_name')) && !empty($this->input->post('edit_board_state')))
        {
            $data=array(
                "board_name"=>$this->input->post('edit_board_name'),
                "board_state"=>$this->input->post('edit_board_state'),
                "board_modified_on"=>time()
            );
            $board_id = $this->input->post('board_id');
            $update_board = $this->qforms_model->update_board($board_id,$data);
            if ($update_board) echo json_encode(array("status" => "success", "desc" => "Data Updated Successfully!"));

        }
        else
        {
            echo json_encode(array("status" => "error", "desc" => "Fields Cannot be a blank!"));
        }
    }

    function delete_board()
    {
        if (!empty($this->input->post('board_id')))
        {
            $data=array("board_id"=>$this->input->post('board_id'));
            $delete_board = $this->qforms_model->delete_board($data);
            if ($delete_board) echo json_encode(array("status" => "success", "desc" => "Data Deleted Successfully!"));
        }

    }

    function update_board_status()
    {
        if (!empty($this->input->post('board_id')))
        {
            $data=array("board_active"=>$this->input->post('status'));
            $board_id = $this->input->post('board_id');
            $update_board_status = $this->qforms_model->update_board_status($board_id,$data);
            if ($update_board_status) echo json_encode(array("status" => "success", "desc" => "Status Changed Successfully!"));
        }

    }

    function branch()
    {
        $data['branches'] = $this->qforms_model->get_branch_list('all');
        $this->load->view(ADMINCP . '/branches', $data);
    }

    function add_branch()
    {
        $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('branch_state', 'Branch State', 'trim|required|xss_clean');
        $this->form_validation->set_rules('classes_name', 'Classes Name', 'trim|required|xss_clean');

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status" => "error", "desc" => validation_errors()));
        }
        else
        {
            $data=array(
                "branch_name"=>$this->input->post('branch_name'),
                "branch_state"=>$this->input->post('branch_state'),
                "classes_name"=>$this->input->post('classes_name'),
                "branch_created_on"=>time()
            );
            $add_branch = $this->qforms_model->add_branch($data);
            if ($add_branch) echo json_encode(array("status" => "success", "desc" => "Data Saved Successfully!"));

        }
    }

    function update_branch()
    {
        $branch_id =$this->input->post('branch_id');
        $branch_name =$this->input->post('edit_branch_name');
        $branch_state = $this->input->post('edit_branch_state');
        $classes_name = $this->input->post('edit_classes_name');
        if (!empty($branch_id) && !empty($branch_name) && !empty($branch_state) && !empty($classes_name))
        {
            $data=array(
                "branch_name"=>$branch_name,
                "branch_state"=>$branch_state,
                "classes_name"=>$classes_name,
                "branch_modified_on"=>time()
            );
            $update_branch = $this->qforms_model->update_branch($branch_id,$data);
            if ($update_branch) echo json_encode(array("status" => "success", "desc" => "Data Updated Successfully!"));

        }
        else
        {
            echo json_encode(array("status" => "error", "desc" => "Fields Cannot be a blank!"));
        }
    }

    function delete_branch()
    {
        $branch_id =$this->input->post('branch_id');
        if (!empty($branch_id))
        {
            $data=array("branch_id"=>$branch_id);
            $delete_branch = $this->qforms_model->delete_branch($data);
            if ($delete_branch) echo json_encode(array("status" => "success", "desc" => "Data Deleted Successfully!"));
        }
    }

    function update_branch_status()
    {
        $branch_id =$this->input->post('branch_id');
        if (!empty($branch_id))
        {
            $data=array("branch_active"=>$this->input->post('status'));
            $update_branch_status = $this->qforms_model->update_branch_status($branch_id,$data);
            if ($update_branch_status) echo json_encode(array("status" => "success", "desc" => "Status Changed Successfully!"));
        }

    }

    function standards()
    {
        $data['standards'] = $this->qforms_model->get_standard_list('all');
        $this->load->view(ADMINCP . '/standards', $data);
    }

    function add_standard()
    {
        $this->form_validation->set_rules('std_name','Standard Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('std_desc','Standard Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('std_type','Standard Type','trim|required|xss_clean');

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status"=>"error","desc"=>validation_errors()));
        }
        else
        {
            $data=array(
                "std_name"=>$this->input->post('std_name'),
                "std_desc"=>$this->input->post('std_desc'),
                "std_type"=>$this->input->post('std_type'),
                "created_on"=>time()
            );
            $add_std = $this->qforms_model->add_standard($data);
            if($add_std) echo json_encode(array("status"=>"success","desc"=>"Data Saved Successfully!"));

        }
    }

    function update_standard()
    {
        if(!empty($this->input->post('std_id')) && !empty($this->input->post('edit_std_name')) && !empty($this->input->post('edit_std_desc')) && !empty($this->input->post('edit_std_type')))
        {
            $data=array(
                "std_name"=>$this->input->post('edit_std_name'),
                "std_desc"=>$this->input->post('edit_std_desc'),
                "std_type"=>$this->input->post('edit_std_type')
            );
            $std_id = $this->input->post('std_id');
            $update_std = $this->qforms_model->update_standard($std_id,$data);
            if($update_std) echo json_encode(array("status"=>"success","desc"=>"Data Updated Successfully!"));

        }
        else
        {
            echo json_encode(array("status"=>"error","desc"=>"Fields Cannot be a blank!"));
        }
    }

    function delete_standard()
    {
        if(!empty($this->input->post('std_id')))
        {
            $data=array("std_id"=>$this->input->post('std_id'));
            $delete_standard = $this->qforms_model->delete_standard($data);
            if($delete_standard) echo json_encode(array("status"=>"success","desc"=>"Data Deleted Successfully!"));
        }
    }

    function update_standard_status()
    {
        if(!empty($this->input->post('std_id')))
        {
            $data=array("std_active"=>$this->input->post('status'));
            $std_id = $this->input->post('std_id');
            $update_standard_status = $this->qforms_model->update_standard_status($std_id,$data);
            if($update_standard_status) echo json_encode(array("status"=>"success","desc"=>"Status Changed Successfully!"));
        }
    }

    function subjects()
    {
        $data['subjects'] = $this->qforms_model->get_subject_list('all');
        $this->load->view(ADMINCP . '/subjects', $data);
    }

    function get_standard_fields()
    {
        $std_fields= $this->qforms_model->get_std_fields_list('all');
        if(is_array($std_fields)) echo json_encode(array("status"=>"success","data"=>$std_fields));
    }
    function add_subject()
    {
        $this->form_validation->set_rules('std_field','Standard Fields', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sub_name','Subject Name', 'trim|required|xss_clean');

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status"=>"error","desc"=>validation_errors()));
        }
        else
        {
            $data=array(
                "std_field_id"=>$this->input->post('std_field'),
                "subject_name"=>$this->input->post('sub_name'),
                "created_on"=>time(),
                "modified_by_admin_uid"=>$_SESSION['gn_admin_uid']
            );
            $add_sub = $this->qforms_model->add_subject($data);
            if($add_sub) echo json_encode(array("status"=>"success","desc"=>"Data Saved Successfully!"));

        }
    }

    function update_subject()
    {
        if(!empty($this->input->post('sub_id')) && !empty($this->input->post('edit_std_field')) && !empty($this->input->post('edit_sub_name')))
        {
            $data=array(
                "std_field_id"=>$this->input->post('edit_std_field'),
                "subject_name"=>$this->input->post('edit_sub_name'),
                "modified_on"=>time(),
                "modified_by_admin_uid"=>$_SESSION['gn_admin_uid']
            );
            $sub_id =  $this->input->post('sub_id');
            $update_sub = $this->qforms_model->update_subject($sub_id,$data);
            if($update_sub) echo json_encode(array("status"=>"success","desc"=>"Data Updated Successfully!"));

        }
        else
        {
            echo json_encode(array("status"=>"error","desc"=>"Fields Cannot be a blank!"));
        }
    }

    function delete_subject()
    {
        if(!empty($this->input->post('sub_id')))
        {
            $data=array("sub_id"=>$this->input->post('sub_id'));
            $delete_subject = $this->qforms_model->delete_subject($data);
            if($delete_subject) echo json_encode(array("status"=>"success","desc"=>"Data Deleted Successfully!"));
        }
    }

    function update_subject_status()
    {
        if(!empty($this->input->post('sub_id')))
        {
            $data=array("sub_active"=>$this->input->post('status'),"modified_by_admin_uid"=>$_SESSION['gn_admin_uid']);
            $sub_id =  $this->input->post('sub_id');
            $update_subject_status = $this->qforms_model->update_subject_status($sub_id,$data);
            if($update_subject_status) echo json_encode(array("status"=>"success","desc"=>"Status Changed Successfully!"));
        }
    }

    function chapters()
    {
        $data['chapters'] = $this->qforms_model->get_chapter_details();
        $this->load->view(ADMINCP . '/chapters', $data);
    }

    function get_standard_subject_list()
    {
        $standards = $this->qforms_model->get_standard_list('all');
        $subjects = $this->qforms_model->get_subject_list('all');
        if(is_array($standards) && is_array($subjects))
        {
            echo json_encode(array("status"=>"success","standards"=>$standards,"subjects"=>$subjects));
        }

    }

    function add_chapter()
    {
        $this->form_validation->set_rules('std_name','Standard Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sub_name','Subject Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('chap_name','Chapter Name', 'trim|required|xss_clean');

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status"=>"error","desc"=>validation_errors()));
        }
        else
        {
            $data=array(
                "chap_title"=>$this->input->post('chap_name'),
                "sub_id"=>$this->input->post('sub_name'),
                "std_id"=>$this->input->post('std_name'),
                "created_on"=>time(),
                "modified_by_admin_uid"=>$_SESSION['gn_admin_uid']
            );
            $add_chap = $this->qforms_model->add_chapter($data);
            if($add_chap) echo json_encode(array("status"=>"success","desc"=>"Data Saved Successfully!"));

        }
    }

    function update_chapter()
    {
        if(!empty($this->input->post('chap_id')) && !empty($this->input->post('edit_std_name')) && !empty($this->input->post('edit_sub_name')) && !empty($this->input->post('edit_chap_name')))
        {
            $data=array(
                "chap_title"=>$this->input->post('edit_chap_name'),
                "sub_id"=>$this->input->post('edit_sub_name'),
                "std_id"=>$this->input->post('edit_std_name'),
                "modified_on"=>time(),
                "modified_by_admin_uid"=>$_SESSION['gn_admin_uid']
            );
            $chap_id = $this->input->post('chap_id');
            $update_chap = $this->qforms_model->update_chapter($chap_id,$data);
            if($update_chap) echo json_encode(array("status"=>"success","desc"=>"Data Updated Successfully!"));

        }
        else
        {
            echo json_encode(array("status"=>"error","desc"=>"Fields Cannot be a blank!"));
        }
    }

    function delete_chapter()
    {
        if(!empty($this->input->post('chap_id')))
        {
            $data=array("chap_id"=>$this->input->post('chap_id'));
            $delete_chapter = $this->qforms_model->delete_chapter($data);
            if($delete_chapter) echo json_encode(array("status"=>"success","desc"=>"Data Deleted Successfully!"));
        }
    }

    function update_chapter_status()
    {
        if(!empty($this->input->post('chap_id')))
        {
            $data=array("chap_active"=>$this->input->post('status'),"modified_by_admin_uid"=>$_SESSION['gn_admin_uid']);
            $chap_id = $this->input->post('chap_id');
            $update_chapter_status = $this->qforms_model->update_chapter_status($chap_id,$data);
            if($update_chapter_status) echo json_encode(array("status"=>"success","desc"=>"Status Changed Successfully!"));
        }
    }

    function teachers()
    {
        $data['teachers'] = $this->qforms_model->get_teacher_details();
        $this->load->view(ADMINCP . '/teachers', $data);
    }

    function add_teacher()
    {
        $this->form_validation->set_rules('teacher_name','Teacher Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('teacher_desc','Teacher Description', 'trim|required|xss_clean');

        if (!$this->form_validation->run())
        {
            echo json_encode(array("status"=>"error","desc"=>validation_errors()));
        }
        else
        {
            $data=array(
                "teacher_name"=>$this->input->post('teacher_name'),
                "teacher_desc"=>$this->input->post('teacher_desc'),
                "created_on"=>time(),
                "modified_by_admin_uid"=>$_SESSION['gn_admin_uid']
            );
            $add_teacher = $this->qforms_model->add_teacher($data);
            if($add_teacher) echo json_encode(array("status"=>"success","desc"=>"Data Saved Successfully!"));

        }
    }

    function update_teacher()
    {
        $teacher_id = $this->input->post('teacher_id');
        $teacher_name =$this->input->post('edit_teacher_name');
        $teacher_desc =$this->input->post('edit_teacher_desc');
        if(!empty($teacher_id) && !empty($teacher_name) && !empty($teacher_desc))
        {
            $data=array(
                "teacher_name"=>$this->input->post('edit_teacher_name'),
                "teacher_desc"=>$this->input->post('edit_teacher_desc'),
                "modified_on"=>time(),
                "modified_by_admin_uid"=>$_SESSION['gn_admin_uid']
            );
            $teacher_id = $this->input->post('teacher_id');
            $update_teacher = $this->qforms_model->update_teacher($teacher_id,$data);
            if($update_teacher) echo json_encode(array("status"=>"success","desc"=>"Data Updated Successfully!"));

        }
        else
        {
            echo json_encode(array("status"=>"error","desc"=>"Fields Cannot be a blank!"));
        }
    }

    function delete_teacher()
    {
        $teacher_id = $this->input->post('teacher_id');
        if(!empty($teacher_id))
        {
            $data=array("teacher_id"=>$this->input->post('teacher_id'));
            $delete_teacher = $this->qforms_model->delete_teacher($data);
            if($delete_teacher) echo json_encode(array("status"=>"success","desc"=>"Data Deleted Successfully!"));
        }
    }

    function update_teacher_status()
    {
        $teacher_id = $this->input->post('teacher_id');
        if(!empty($teacher_id))
        {
            $data=array("teacher_active"=>$this->input->post('status'),"modified_by_admin_uid"=>$_SESSION['gn_admin_uid']);
            $update_teacher_status = $this->qforms_model->update_teacher_status($teacher_id,$data);
            if($update_teacher_status) echo json_encode(array("status"=>"success","desc"=>"Status Changed Successfully!"));
        }
    }


}
?>