<?php

namespace App\Traits;

use App\Services\BranchService;
use Illuminate\Database\Eloquent\Builder;

trait BranchTrait
{
    public static function getEloquentQuery(): Builder
    {
        $branch = BranchService::current();

        if ($branch)
            return parent::getEloquentQuery()->where('branch_id', $branch->id);

        return parent::getEloquentQuery();
    }
}
