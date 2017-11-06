<?php
/**
 * https://neofr.ag
 * @author: Michaël BILCOT <michael.bilcot@neofr.ag>
 */

namespace NF\NeoFrag\Displayables;

use NF\NeoFrag\Displayable;

class Row extends Displayable
{
	protected $_style;

	public function style($style)
	{
		$this->_style = $style;
		return $this;
	}

	public function __toString()
	{
		$output = '';

		$live_editor = FAlSE;

		if ($this->_id !== NULL)
		{
			foreach ($this->_children as $i => $child)
			{
				$child->id($i);
			}

			if ($live_editor = NEOFRAG_LIVE_EDITOR & NEOFRAG_ROWS)
			{
				$output .= '<div class="live-editor-row-header">
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-info live-editor-style" data-toggle="tooltip" data-container="body" title="'.NeoFrag()->lang('Apparence').'">'.icon('fa-paint-brush').'</button>
									<button type="button" class="btn btn-sm btn-danger live-editor-delete" data-toggle="tooltip" data-container="body" title="'.NeoFrag()->lang('Supprimer').'">'.icon('fa-close').'</button>
								</div>
								<h3>'.NeoFrag()->lang('Row').' <div class="btn-group"><button type="button" class="btn btn-xs btn-success live-editor-add-col" data-toggle="tooltip" data-container="body" title="'.NeoFrag()->lang('Nouveau Col').'">'.icon('fa-plus').'</button></div></h3>
							</div>';
			}
		}

		$output .= '<div class="row'.(!empty($this->_style) ? ' '.$this->_style.($live_editor ? '" data-original-style="'.$this->_style : '') : '').'"'.($this->_id !== NULL ? ' data-row-id="'.$this->_id.'"' : '').'>
						'.implode($this->_children->__toArray()).'
					</div>';

		return $live_editor ? '<div class="live-editor-row">'.$output.'</div>' : $output;
	}
}
