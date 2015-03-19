<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_logged_in()
{
	$CI =& get_instance();
	$ss = $CI->session->userdata('logged_in');
	if($ss != '')
	{
	    return TRUE;
	}
	return FALSE;
}
function from_session($key)
{
	$CI =& get_instance();
	$ss = $CI->session->userdata($key);
	return $ss;
}
function warning($input,$goTo)
{
	$url = site_url().'/'.$goTo;
	$output="<script> 
		alert(\"$input\");
		location = '$url';
		</script>";
	return $output;
}
function get_setting_user()
{
	$CI =& get_instance();
	$res = $CI->db->get('user');
	$row = $res->row();
	return array('nama'=>$row->user_name,'web'=>$row->user_web);
}
function get_nick()
{
	$CI =& get_instance();
	$CI->db->select('user_nickname');
	$res = $CI->db->get('user');
	$row = $res->row();
	return $row->user_nickname;
}
function is_valid_date($a)
{
	if(strlen($a)!=10) return false;
	$d=substr($a,8,2); //tanggal
	$m=substr($a,5,2); //bulan
	$y=substr($a,0,4); //tahun
	return checkdate($m,$d,$y);
}
function extract_date($a,$pil='')
{
	$d=substr($a,8,2); //tanggal
	if($pil=='d') return $d;
	$m=substr($a,5,2); //bulan
	if($pil=='m') return $m;
	$y=substr($a,0,4); //tahun
	if($pil=='y') return $y;
	return array($y,$m,$d);
}
function order_array ($array, $key) 
{
	$tmp = array();
	foreach($array as $akey => $array2) {
	    $tmp[$akey] = $array2[$key];
	}
	sort($tmp , SORT_DESC ); //Change this if you have an associative array
	$tmp2 = array();
	$tmp_size = count($tmp);
	foreach($tmp as $key => $value) {
	    $tmp2[$key] = $array[$key];
	}
	return $tmp2;
}
function remove_second($t)
{
	return substr($t,0,5);
}
function next_day($now)
{
	$ex_now = extract_date($now);
	$next = mktime(0,0,0,$ex_now[1],$ex_now[2]+1,$ex_now[0]);
	return date('/Y/m/d',$next);
}
function prev_day($now)
{
	$ex_now = extract_date($now);
	$prev = mktime(0,0,0,$ex_now[1],$ex_now[2]-1,$ex_now[0]);
	return date('/Y/m/d',$prev);
}
function next_month($bulan,$tahun)
{
	if($bulan<12)
	{
		return '/'.$tahun.'/'.complete($bulan+1,2);
	}
	else
	{
		return '/'.($tahun+1).'/01';
	}
}
function prev_month($bulan,$tahun)
{
	if($bulan>1)
	{
		return '/'.$tahun.'/'.complete($bulan-1,2);
	}
	else
	{
		return '/'.($tahun-1).'/12';
	}
}
function complete($in,$max)
{
	$len = $max;
	$len_in = strlen($in);
	$zero_len = $len - $len_in;
	$zero = "";
	for($i=1;$i<=$zero_len;$i++)
	{
	    $zero .= '0';
	}
	return $zero.$in;
}
function remove_zero($in)
{
	return ltrim($in, '0'); 
}
function get_ip()
{
	$CI =& get_instance();
	return $CI->input->ip_address();
}
function split_content($content,$id)
{
	$visible = '<span class="visible_content vc_'.$id.'">'.character_limiter($content,130,'...<a class="link1 blue98" href="javascript:void(0)" onclick="show_hidden_content('.$id.');">Lihat selengkapnya</a>').'</span>';
	$hidden = '<span class="hidden_content hc_'.$id.'">'.$content.'</span>';
	echo $visible.$hidden;
}
function split_comment($content,$id)
{
	$visible = '<span class="visible_content vcom_'.$id.'">'.character_limiter($content,130,'...<a class="link1 blue98" href="javascript:void(0)" onclick="show_hidden_comment('.$id.');">Lihat selengkapnya</a>').'</span>';
	$hidden = '<span class="hidden_content hcom_'.$id.'">'.$content.'</span>';
	echo $visible.$hidden;
}
function array_sort($array, $on, $order=SORT_ASC)
{
	$new_array = array();
	$sortable_array = array();
	
	if (count($array) > 0) {
		foreach ($array as $k => $v) {
			if (is_array($v))
			{
				foreach ($v as $k2 => $v2)
				{
					if ($k2 == $on)
					{
						$sortable_array[$k] = $v2;
					}
				}
			} else {
				$sortable_array[$k] = $v;
			}
		}
	    
		switch ($order) {
			case SORT_ASC:
			    asort($sortable_array);
			break;
			case SORT_DESC:
			    arsort($sortable_array);
			break;
		}
	    
		foreach ($sortable_array as $k => $v) {
			$new_array[$k] = $array[$k];
		}
	}
	
	return $new_array;
}
function remove_empty_values($array, $remove_null_number = true)
{
    $new_array = array();

    $null_exceptions = array();

    foreach ($array as $key => $value)
    {
	    $value = trim($value);

	if($remove_null_number)
	    {
	    $null_exceptions[] = '0';
	    }

	if(!in_array($value, $null_exceptions) && $value != "")
	    {
	    $new_array[] = $value;
	}
    }
    return $new_array;
}
function get_url($text)
{
	$pattern = "![a-zA-Z]{3,}://[a-zA-Z0-9\.]+/*[a-zA-Z0-9/\\%_.]*\?*[a-zA-Z0-9/\\%-_.+=&amp;]*!";
	preg_match_all($pattern, $text, $matches);
	return $matches;
}
function resize_image($url)
{
	list($width, $height) = @getimagesize($url);
	$size = 150;
	$aspect_ratio = $height/$width;	
	if ($width <= $size) {
		$new_w = $width;
		$new_h = $height;
	} else {
		$new_w = $size;
		$new_h = abs($new_w * $aspect_ratio);
	}
	return array($new_w,$new_h);
}
function analyze_media($media)
{
	// sementara hanya deteksi match pertama saja
	foreach($media as $val)
	{
		// img?
		$ext = substr($val,-4,4);
		if(in_array($ext,array('.jpg','.png','.gif')))
		{
			$size = resize_image($val);
			$return = 'image^^^'.$size[0].'^^^'.$size[1].'^^^'.$val;
			return $return;
		}
		elseif(stristr($val,'youtube'))
		{
			$id_youtube = get_id_youtube($val);
			$return = 'youtube^^^'.$id_youtube[1];
			return $return;
		}
		else
		{
			return 'link^^^'.$val;
		}
	}
}
function get_id_youtube($url)
{
	$pattern = '/^[^v]+v.(.{11}).*/';
	preg_match($pattern, $url, $matches);
	return $matches;
}
function youtube($id)
{
	return '<object width="350" height="280"><param name="movie" value="http://www.youtube.com/v/'.$id.'&hl=en_US&feature=player_embedded&version=3"></param><param name="wmode" value="opaque" /><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed src="http://www.youtube.com/v/'.$id.'&hl=en_US&feature=player_embedded&version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="350" height="280"></embed></object>';
}