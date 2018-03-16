<?php

if ( ! function_exists('list_sosmed'))
{
	function list_sosmed() {
		$list = array(
				'whatsapp' => 'https://api.whatsapp.com/send?phone=6282337576338&text=Halo%20Admin%20Saya%20Mau%20Order%20Kotakan',
				'instagram' => 'http://instagram.com/inikotakan',
				'facebook' => 'http://fb.com/inikotakan'
			);

		return $list;
	}
}