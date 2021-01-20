<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Traits\Transliterate;
use App\Models\Province;
use App\Models\Region;
use App\Models\City;

class ProvinceSeeder extends Seeder
{

	use Transliterate;

	private $provinces = [
		'Пловдив' => [
			'Асеновград' => [
				['post_code' => 4001, 'prefix' => 'гр.', 'name' => 'Асеновград'],
				['post_code' => 4002, 'prefix' => 'с.', 'name' => 'Бачково'],
			],
			'Пловдив' => [
				['post_code' => 4000, 'prefix' => 'гр.', 'name' => 'Пловдив'],
			],
			'Хисаря' => [
				['post_code' => 4005, 'prefix' => 'гр.', 'name' => 'Хисар'],
				['post_code' => 4006, 'prefix' => 'с.', 'name' => 'Миромир'],
			],
			'Сопот' => [
				['post_code' => 4009, 'prefix' => 'гр.', 'name' => 'Сопот'],
			],
		],
		// 'Пазарджик' => [
		// 	'Батак',
		// 	'Белово',
		// 	'Брацигово',
		// 	'Велинград',
		// 	'Лесичово',
		// 	'Пазарджик',
		// 	'Панагюрище',
		// 	'Пещера',
		// 	'Ракитово',
		// 	'Септември',
		// 	'Стрелча',
		// 	'Сърница'
		// ],
	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach($this->provinces as $key => $itr){
    		
    		$province = new Province;
			$province->name = $key;
			$province->name_en = $this->transliterate($key);
			$province->save();

    		foreach ($itr as $key_r => $itr_r) {
    			$region = new Region;
    			$region->province_id = $province->id;
    			$region->name = $key_r;
    			$region->name_en = $this->transliterate($key_r);
    			$region->save();

    			foreach($itr_r as $itr_c){
    				$city = new City;
    				$city->region_id = $region->id;
    				$city->post_code = $itr_c['post_code'];
    				$city->prefix = $itr_c['prefix'];
    				$city->name = $itr_c['name'];
    				$city->name_en = $this->transliterate($itr_c['name']);
    				$city->save();
    			}
    		}

    	}

    }
}
