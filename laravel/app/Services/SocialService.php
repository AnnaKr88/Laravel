<?php declare(strict_types=1);


namespace App\Services;


use App\Models\User;

class SocialService
{
    public function updateUser($user): ?User
    {
        $email = $user->getEmail();
        $authUser = User::where('email', $email)->first();
        if($authUser){
            $authUser->name = $user->getName();
            $authUser->avatar = $user->getAvatar();
            $authUser->save();
            return $authUser;
        }

        return null;
    }
}
