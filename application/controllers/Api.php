<?php

    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
    header('Content-Type: application/json');

// Default
// $users = [
//     ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
//     ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
// ];

// $id = $this->get( 'id' );

// if ( $id === null )
// {
//     if ( $users )
//     {
//         $this->response( $users, 200 );
//     }
//     else
//     {
//         $this->response( [
//             'status' => false,
//             'message' => 'No users were found'
//         ], 404 );
//     }
// }
// else
// {
//     if ( array_key_exists( $id, $users ) )
//     {
//         $this->response( $users[$id], 200 );
//     }
//     else
//     {
//         $this->response( [
//             'status' => false,
//             'message' => 'No such user found'
//         ], 404 );
//     }
// }
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController  {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
    }

    public function login_get()
    {
        //get data dari FORM
        $username = $this->input->get("username");
        $password = $this->input->get('password');

        //checking data via model
        $checking = $this->admin->check_login('V_SecAccessGroup', array('PersonalMail' => $username), array('IsPassword' => $password));

        if ($checking != FALSE) {
            foreach ($checking as $apps) {
                $session_data = array(
                    'user_id'   => $apps->RecnumEmployee,
                    'user_nik'  => $apps->EmployeeId,
                    'user_name' => $apps->EmployeeName,
                    'user_mail' => $apps->PersonalMail,
                    'PositionStructural' => $apps->PositionStructural,
                );

                $this->response($session_data, 200 );

            }
        }else{

            $this->response( [
                'status' => false,
                'message' => 'No users were found'
            ], 404 );
        }
        
    }
    public function shift_get()
    {
        $id = $this->input->get("id");
        $shift = $this->admin->api_get_function('fn_schshift',$id );

        if ($shift != FALSE) {
            $this->response($shift, 200 );
        }else{

            $this->response( [
                'status' => false,
                'message' => 'No users were found'
            ], 404 );
        }
        
    }

    public function list_attendance_get()
    {
        $id = $this->input->get("id");
        $periode = $this->input->get("periode");
        $shift = $this->admin->api_get_function('Fn_appattendancelist',$id."," .$periode );

        if ($shift != FALSE) {
            $this->response($shift, 200 );
        }else{

            $this->response( [
                'status' => false,
                'message' => 'No users were found'
            ], 404 );
        }
        
    }

    public function periode_get()
    {
        $shift = $this->admin->api_getmaster('vf_periodpayroll');

        if ($shift != FALSE) {
            $this->response($shift, 200 );
        }else{

            $this->response( [
                'status' => false,
                'message' => 'No users were found'
            ], 404 );
        }
        
    }


    public function wa_get()
    {
        // print("<pre>".print_r($this->post(),true)."</pre>");exit();
        $response= [];
        $response['false']=true;
        // if(empty($this->post('pesan', true))){
        //     $response['error']=true;
        //     $response['msg'][]= "Tidak ada pesan dikirim";
        // }
        // if(empty($this->post('hp', true))){
        //     $response['error']=true;
        //     $response['msg'][]= "Tidak ada nomor hp dikirim";
        // }
        $this->db->from("job_pesan");
        $this->db->where("sent",0);
        $this->db->order_by("created ASC");
        $this->db->limit(5);
        $job = $this->db->get()->result_array();

        foreach ($job as $key => $value) {
            $sent = $this->admin->kirim_wa($value['no_hp'],$value['pesan']);
            $response['sent'][]= $value['no_hp'] . " - ". $value['pesan'];
            $data['sent'] = 1;
            $this->db->set($data);
            $this->db->where('id', $value['id']);
            $result  =  $this->db->update('job_pesan'); 
        }
        $this->response($response,200);
    }

    public function cancel_get()
    {
        // print("<pre>".print_r($this->post(),true)."</pre>");exit();
        $response= [];
        $response['false']=true;
        $this->db->from("invoice");
        $this->db->where("MOD(TIMESTAMPDIFF(MINUTE,NOW() ,TIMESTAMP(exp_date)), 60) < 0");
        $job = $this->db->get()->result_array();

        foreach ($job as $key => $value) {
            
            $data['status'] = "Cancel";
            $this->db->set($data);
            $this->db->where('id', $value['id']);
            $result  =  $this->db->update('invoice'); 
        }
        $this->response($response,200);
    }
}