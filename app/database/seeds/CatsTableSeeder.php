<?php

class CatsTableSeeder extends Seeder {
	public function run(){
		DB::table('cats')->insert(array(
			array('name'=>"Snood", 'date_of_birth'=>07/11/1980, 'breed_id'=>1),
			array('name'=>"Guber", 'date_of_birth'=>07/01/1980, 'breed_id'=>2)
		));
	}
}