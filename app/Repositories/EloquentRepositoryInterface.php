<?php  

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model; 

interface EloquentRepositoryInterface {

	public function create(array $attributes): Model;

	public function find($id): ?Model;

	public function update($id, array $attributes): Model;

	public function delete($id);

}