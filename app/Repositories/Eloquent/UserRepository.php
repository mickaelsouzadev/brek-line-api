<?php  

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
	public function __construct(User $model)
	{
	   parent::__construct($model);
	}

	public function findUserByEmail($email)
	{
		return $this->model::where(['email'=>$email])->first();
	}

	public function findUserBySocialId($socialId)
	{
		return $this->model::where(['social_id'=>$socialId])->first();
	}
}