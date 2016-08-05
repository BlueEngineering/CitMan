<?PHP
/**
 *
 *
 *
 */
namespace App\View\Helper;

use Cake\View\Helper;

class JsonToHtmlHelper extends Helper {	
	/**
	 * method to create table rows for multidimensional forms with given JSON informations
	 *
	 * @input JSON $jsonData
	 *
	 * @return string $html
	 */
	public function createFormAsTable($jsonData) {
		//
		return '<tr><td>Nothing going on in this table.</td></tr>';
	}
	
	
	/**
	 * method to create a standard form with given JSON informations
	 *
	 * @input JSON $jsonData
	 *
	 * @return string $html
	 */
	public function createFormAsStdForm($jsonData) {
		//
		return '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Nothing going on in this form. But maybe it\'s greate!</div>';
	}
}
?>