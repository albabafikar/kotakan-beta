<?php

if( ! function_exists('trimLower')) 
{
	function trimLower($string) {
		$string = trim($string);
		$string = strtolower($string);

		return $string;
	}
}

if( ! function_exists('toRupiah'))
{
	function toRupiah($number) {
		return "Rp".number_format($number, 0, '.', '.');
	}
}

if( ! function_exists('imageEncrypt'))
{
	function imageEncrypt($fileName) {
		$x = explode('.', $fileName);
		$random1 = rand(11111111,99999999);
		$random2 = rand(111111,999999);
		$random3 = substr(sha1($fileName), 0, rand(4,9));
		$random4 = rand(5000,15000);

		return $random1.'_'.$random2.'_'.$random3.'_'.$random4.'.'.end($x);
	}
}

if ( ! function_exists('timeAgo'))
{
	// time_passed(strtotime('2018-03-06 19:15'))
	function timeAgo($timestamp){
	    //type cast, current time, difference in timestamps
	    $timestamp      = (int) $timestamp;
	    $current_time   = time();
	    $diff           = $current_time - $timestamp;
	   
	    //intervals in seconds
	    $intervals      = array (
	        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
	    );
	   
	    //now we just find the difference
	    if ($diff == 0)
	    {
	        return 'Baru saja';
	    }   

	    if ($diff < 60)
	    {
	        return $diff == 1 ? $diff . ' detik yang lalu' : $diff . ' detik yang lalu';
	    }       

	    if ($diff >= 60 && $diff < $intervals['hour'])
	    {
	        $diff = floor($diff/$intervals['minute']);
	        return $diff == 1 ? $diff . ' menit yang lalu' : $diff . ' menit yang lalu';
	    }       

	    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
	    {
	        $diff = floor($diff/$intervals['hour']);
	        return $diff == 1 ? $diff . ' jam yang lalu' : $diff . ' jam yang lalu';
	    }   

	    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
	    {
	        $diff = floor($diff/$intervals['day']);
	        return $diff == 1 ? $diff . ' hari yang lalu' : $diff . ' hari yang lalu';
	    }   

	    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
	    {
	        $diff = floor($diff/$intervals['week']);
	        return $diff == 1 ? $diff . ' minggu yang lalu' : $diff . ' minggu yang lalu';
	    }   

	    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
	    {
	        $diff = floor($diff/$intervals['month']);
	        return $diff == 1 ? $diff . ' minggu yang lalu' : $diff . ' minggu yang lalu';
	    }   

	    if ($diff >= $intervals['year'])
	    {
	        $diff = floor($diff/$intervals['year']);
	        return $diff == 1 ? $diff . ' tahun yang lalu' : $diff . ' tahun yang lalu';
	    }
	}
}

if( ! function_exists('createSlug'))
{
	// Refrence: https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
	function createSlug($text) {
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  // trim
	  $text = trim($text, '-');

	  // remove duplicate -
	  $text = preg_replace('~-+~', '-', $text);

	  // lowercase
	  $text = strtolower($text);

	  if (empty($text)) {
	    return 'n-a';
	  }

	  $text .= '-'.substr(sha1(rand(10000,99999)), 0, rand(6,8));

	  return $text;
	}
}

if ( ! function_exists('urlEncoder'))
{
	function urlEncoder($input) {
	 return strtr(base64_encode($input), '+/=', '._-');
	}
}

if ( ! function_exists('urlDecoder'))
{
	function urlDecoder($input) {
	 return base64_decode(strtr($input, '._-', '+/='));
	}
}

if ( ! function_exists('validSlug'))
{
	function validSlug($str) {
    return (bool) preg_match('/^[a-z][-a-z0-9]*$/', $str);
  }
}

if ( ! function_exists('generateNoOrder'))
{
	function generateNoOrder() {
		$string = "#";
		$string .= rand(100,499);
		$string .= rand(100,999);
		$string .= rand(1000,9999);

		return $string;
	}
}

if ( ! function_exists('customDate'))
{
	function customDate($date) {
		$x = explode("/", $date);

		$string = $x[2].'-';
		$string.= $x[1].'-';
		$string.= $x[0];

		return $string;
	}
}

if ( ! function_exists('createPaginatio'))
{
	// Parameters = baseUrl , totalRows, perPage, numLinks
	function createPagination($data)
	{
		// LIMIT rowSelected, count
		// LIMIT 0 , 15 (tampil 15 data, data awal tabel - data ke 15)
		// LIMIT 5 , 3 (tampil 3 data, dari hasil tabel yg diambil baris ke 5 sampe baris ke 8)
		$CI =& get_instance();
		$CI->load->library('pagination');

		$config['base_url'] = $data['baseUrl'];
		$config['total_rows'] = $data['totalRows'];
		$config['per_page'] = $data['perPage'];

		// custom paging configuration
    $config['num_links'] = $data['numLinks'];
    $config['page_query_string'] = TRUE;
    $config['query_string_segment'] = 'next';
     
    // Start and End HTML element of Paging
    $config['full_tag_open'] = '<nav class="pagination-wrapper"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    
    // Move to First Link Paging
    $config['first_link'] = '<span class="fa fa-angle-double-left"></span>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
     
    // Move to Last Link Paging
    $config['last_link'] = '<span class="fa fa-angle-double-right"></span>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = "</li>";

    // Next Link
    $config['next_link'] = '<span class="fa fa-chevron-right"></span>';
    $config['next_tag_open'] = "<li>";
    $config['next_tag_close'] = '</li>';

    // Previous Link
    $config['prev_link'] = '<span class="fa fa-chevron-left"></span>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    // Active Page
    $config['cur_tag_open'] = '<li><a href="#" style="background: '.htmlentities('#a85ba4').'; color: '.htmlentities('#ffffff').'">';
    $config['cur_tag_close'] = '</a></li>';

    // Unactive Page
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
     
    $CI->pagination->initialize($config);
		
		return $CI->pagination->create_links();
	}
}