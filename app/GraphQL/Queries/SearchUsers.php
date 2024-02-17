<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\User2;
use App\Models\User3;

final class SearchUsers
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $users=[];
      
        if(isset($args['category'])){
            $users= User3::where('category_id', $args['category'])->get();
        }
        if(isset($args['domain'])){
            $users= User2::where('wilaya_id', $args['wilaya'])->get();
        }
    }
}
