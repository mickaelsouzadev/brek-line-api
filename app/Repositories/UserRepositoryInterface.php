<?php  

namespace App\Repositories;

use App\Model\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   // public function all(): Collection;

   public function findUserByEmail($email);

   public function findUserBySocialId($socialId);
}