<?php
namespace Concrete\Core\File\Search\ColumnSet;
use Loader;
use User;
use \Concrete\Core\Foundation\Collection\Database\Column\Set as DatabaseItemListColumnSet;

class ColumnSet extends \Concrete\Core\Foundation\Collection\Database\Column\Set {
	protected $attributeClass = 'FileAttributeKey';
	public function getCurrent() {
		$u = new User();
		$fldc = $u->config('FILE_LIST_DEFAULT_COLUMNS');
		if ($fldc != '') {
			$fldc = @unserialize($fldc);
		}
		if (!($fldc instanceof DatabaseItemListColumnSet)) {
			$fldc = new DefaultSet();
		}
		return $fldc;
	}
}