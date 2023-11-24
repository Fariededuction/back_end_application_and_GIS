<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('encodeurl_helper'))
	{
		function encodeurl($url)
		{
            $this->load->model('m_config_cpanel','config_cpanel');
			$hasil = $this->config_cpanel->encode_url($url);
            return $hasil;
		}
	}

	?>