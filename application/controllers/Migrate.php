<?php
/**
 * Created by PhpStorm.
 * User: 6
 * Date: 31/01/2016
 * Time: 20:09
 * author : GROLA Elmahdi
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
    public function index()
    {

        $this->load->library('migration');

        if ($this->migration->latest() === FALSE)
        {
            show_error($this->migration->error_string());
        }

    }
}