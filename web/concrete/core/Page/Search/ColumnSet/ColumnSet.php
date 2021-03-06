<?php
namespace Concrete\Core\Page\Search\ColumnSet;
use Loader;
use \Concrete\Core\Foundation\Collection\Database\Column\Set as DatabaseItemListColumnSet;
use User;
class ColumnSet extends \Concrete\Core\Foundation\Collection\Database\Column\Set {
	protected $attributeClass = 'CollectionAttributeKey';
	public function getCurrent() {
		$u = new User();
		$fldc = $u->config('PAGE_LIST_DEFAULT_COLUMNS');
		if ($fldc != '') {
			$fldc = @unserialize($fldc);
		}
		if (!($fldc instanceof DatabaseItemListColumnSet)) {
			$fldc = new DefaultSet();
		}
		return $fldc;
	}
}