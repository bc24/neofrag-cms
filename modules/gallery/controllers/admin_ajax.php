<?php if (!defined('NEOFRAG_CMS')) exit;
/**************************************************************************
Copyright © 2015 Michaël BILCOT & Jérémy VALENTIN

This file is part of NeoFrag.

NeoFrag is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

NeoFrag is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License
along with NeoFrag. If not, see <http://www.gnu.org/licenses/>.
**************************************************************************/

class m_gallery_c_admin_ajax extends Controller_Module
{
	public function _image_add($gallery_id)
	{
		if (!empty($_FILES['file']) && in_array(extension($_FILES['file']['name']), ['gif', 'jpeg', 'jpg', 'png']) && $file = $this->model2('file')->static_uploaded_file($_FILES['file'], 'gallery'))
		{
			$this->model()->add_image($file->id, $gallery_id, basename($_FILES['file']['name']));
		}
		
		exit;
	}
}

/*
NeoFrag Alpha 0.1.5
./modules/gallery/controllers/admin_ajax.php
*/