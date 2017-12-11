<?

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {
    
    public function transform(User $user)
    {
        return [
            'username' => $user->username,
            'avatar' => $user->avatar(),
        ];
    }
}
