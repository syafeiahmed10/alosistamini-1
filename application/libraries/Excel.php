<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LibraryName
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
}

/* End of file LibraryName.php */
