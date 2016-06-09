<?php namespace KekecMed\Insurance\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use KekecMed\Insurance\Entities\Insurance;

/**
 * Class InsuranceSeeder
 * -----------------------------
 * This Seeder will retrieve all
 * insurance data from https://www.gkv-spitzenverband.de
 * and will write them into insurance table
 * -----------------------------
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class InsuranceDatabaseSeeder extends Seeder {

	/**
	 * @var string
	 */
	private $url = 'https://www.gkv-spitzenverband.de/service/versicherten_service/krankenkassenliste/krankenkassen.jsp?pageNo=%s&filter=0';

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$html = new \Htmldom($this->getUrl(16));
		$total = explode(' ', trim(explode('<br/>', $html->find('span.results', 0)->innertext)[0]))[0];
		$totalPage = round($total / 15);

		for ($page = 1 ; $page <= $totalPage ; $page++) {

			$html = new \Htmldom($this->getUrl($page));

			$rows = $html->find('table.colored > tbody > tr');

			for ($i = 1 ; $i < count($rows) ; $i++) {
				$title = trim($rows[$i]->find('th a', 0)->innertext);
				$webPage = trim($rows[$i]->find('th > a', 0)->href);
				$location = trim($rows[$i]->find('td')[0]->innertext);
				$rate = floatval(str_replace(',', '.', trim($rows[$i]->find('td')[1]->innertext)));

				Insurance::create([
					'title' => $title,
					'homepage' => $webPage,
					'region' => $location,
					'rate' => $rate
				]);
			}
		}
	}

	private function getUrl($page) {
		return sprintf($this->url, $page);
	}

}