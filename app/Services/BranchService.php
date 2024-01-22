<?php

namespace App\Services;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cookie;

class BranchService
{
    private static string $_cookieName = 'current_branch';

    private static Branch|null $_cached = null;

    public static function current(): Branch
    {
        if (self::$_cached)
            return self::$_cached;

        $items = self::getList();
        $currentBranchId = Cookie::get(self::$_cookieName);
        $currentBranch = null;

        if ($currentBranchId) {
            foreach ($items as $item) {
                if ($item->id == $currentBranchId)
                    $currentBranch = $item;
            }
        }

        if (!$currentBranch && count($items)) {
            $currentBranch = $items[0];
            self::setCurrent($currentBranch->id);
        }

        self::$_cached = $currentBranch;

        return self::$_cached;
    }

    public static function setCurrent(int $id): \Symfony\Component\HttpFoundation\Cookie
    {
        return Cookie::make(self::$_cookieName, $id, 60 * 24 * 365);
    }

    public static function getList(): Collection|array
    {
        return Branch::query()->where(['is_active' => true])->get();
    }
}
