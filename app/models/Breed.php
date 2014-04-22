class Breed extends Eloquent {
	public function cats(){
		return $this->hasMany('Cats');
	}
	public $timestamps = false;
	<!-- By default, Laravel expects a 'created_at' and updated_at' timestamp field in the table -->
}