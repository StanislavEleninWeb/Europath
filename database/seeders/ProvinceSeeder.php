<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Province;

class ProvinceSeeder extends Seeder
{

	private $provinces = [
		'Благоевград',
		'Добрич',
		'Плевен',
		'София',
		'Бургас',
		'Кърджали',
		'Пловдив',
		'Варна', 
		'Кюстендил',
		'Разград',
		'Стара Загора',
		'Велико Търново',
		'Ловеч',
		'Русе',
		'Търговище',
		'Видин', 
		'Монтана',
		'Силистра',
		'Хасково',
		'Враца',
		'Пазарджик',
		'Сливен',
		'Шумен',
		'Габрово',
		'Перник',
		'Смолян',
		'Ямбол',
	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [];

        asort($this->provinces);

        foreach ($this->provinces as $province) {
        	$data[] = [
        		'name' => $province,
        		'name_en' => transliterator_transliterate('Russian-Latin/BGN', $province);,
        	];
        }

        Province::insert($data);
    }
}
