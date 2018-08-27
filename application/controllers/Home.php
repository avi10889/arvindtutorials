<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }

    public function index()
    {
        $ip_address = get_client_ip_server();
        $user_agent = get_user_agent();
        $time = time();
        if(isset($_COOKIE['visitor']))
        {
            $cookie_value = $_COOKIE['visitor'] + 1;
            setcookie('visitor',$cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
            $data =array(
                'ip_address'=>$ip_address,
                'browser'=>$user_agent['browser'],
                'platform'=>$user_agent['platform'],
                'visit_count'=>$_COOKIE['visitor'],
                'updated_at'=>$time,
            );
            $add_visitors = $this->home_model->add_visitor_data($data);
        }
        else
        {
            $cookie_value =1;
            setcookie('visitor',$cookie_value, time() + (86400 * 365), "/"); // 86400 = 1 day
            $data =array(
                'ip_address'=>$ip_address,
                'browser'=>$user_agent['browser'],
                'platform'=>$user_agent['platform'],
                'visit_count'=>$cookie_value,
                'created_at'=>$time
            );
            $add_visitors = $this->home_model->add_visitor_data($data);

        }
        $this->load->view('home');
    }

    public function result()
    {
        $this->load->view('result');
    }

    public function all_results()
    {
        $this->load->view('all_results');
    }

    public function lecture_schedule()
    {
        $this->load->model(ADMINCP.'/qforms_model');
        $data['standards'] = $this->qforms_model->get_standard_list('Y');
        $data['branches'] = $this->qforms_model->get_branch_list('Y');
        $this->load->view('lecture_schedule',$data);
    }
    public function test_schedule()
    {
        $this->load->model(ADMINCP.'/qforms_model');
        $data['standards'] = $this->qforms_model->get_standard_list('Y');
        $data['branches'] = $this->qforms_model->get_branch_list('Y');
        $this->load->view('test_schedule',$data);
    }
    public function get_test_schedule_by_std_id()
    {
        $branch = $this->input->post('branch');
        $standard = $this->input->post('standard');
        $test_list_val = '';
        if(isset($branch) && $branch !='')
        {
            if (isset($standard) && $standard != '') {
                $test_schedule = $this->home_model->get_test_schedule_by_std_id($branch,$standard, 'Y');
                if (is_array($test_schedule)) {
                    $test_list_val .= '<table class="table table-bordered">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>STD.</th>
                                                    <th>SUBJECT</th>
                                                    <th>Chapter</th>
                                                    <th>Marks</th>
                                                </tr>';
                    foreach ($test_schedule as $test) {
                        $test_list_val .= '<tr>
                                                    <td>' . $formatted_datetime = date("d-m-Y, h:i a", $test['test_datetime']) . '</td>
                                                    <td>' . $test['std_name'] . '</td>
                                                    <td>' . $test['subject_name'] . '</td>
                                                    <td>' . $test['chap_title'] . '</td>
                                                    <td>' . $test['marks'] . '</td>
                                                </tr>';
                    }
                    $test_list_val .= '</table>';
                    echo "success|@|" . $test_list_val;
                } else echo "success|@|" . $lecture_list_val;
            } else echo "error|@|Please select standard field!";
        } else echo "error|@|Please select branch field!";

    }

    public function get_lecture_schedule_by_std_id()
    {
        $branch = $this->input->post('branch');
        $standard = $this->input->post('standard');
        $lecture_list_val = '';
        if(isset($branch) && $branch !='')
        {
            if (isset($standard) && $standard != '') {
                $lecture_schedule = $this->home_model->get_lecture_schedule_by_std_id($branch,$standard, 'Y');
                if (is_array($lecture_schedule)) {
                    $lecture_list_val .= '<table class="table table-bordered">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Day</th>
                                                    <th>Time</th>
                                                    <th>STD.</th>
                                                    <th>Topic</th>
                                                    <th>Lecturer</th>
                                                </tr>';
                    foreach ($lecture_schedule as $lecture) {
                        $lecture_list_val .= '<tr>
                                                    <td>' . $formatted_date = date("d-m-Y", $lecture['lecture_datetime']) . '</td>
                                                    <td>' . $formatted_date = date("l", $lecture['lecture_datetime']) . '</td>
                                                    <td>' . $formatted_time = date("h:i a", $lecture['lecture_datetime'])  .'-'.$formatted_endtime = date("h:i a", $lecture['lecture_enddatetime'])  . '</td>
                                                    <td>' . $lecture['std_name'] . '</td>
                                                    <td>' . $lecture['subject_name'] . '</td>
                                                    <td>' . $lecture['teacher_name'] . '</td>
                                                </tr>';
                    }
                    $lecture_list_val .= '</table>';
                    echo "success|@|" . $lecture_list_val;
                } else echo "success|@|No Lecture has been schedule!!";
            } else echo "error|@|Please select standard field!";
        } else echo "error|@|Please select branch field!";

    }
}
