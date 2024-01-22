<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Services\BranchService;
use Illuminate\Http\Request;

class SerivcesAndPriceController extends Controller
{
    //
    public function getCategory($id)
    {
        // получаем категорию и ее услуги по идентификатору
        $category = Category::find($id);
        $services = Service::query()->where(['categories_id' => $category->id, 'branch_id' => BranchService::current()->id])->get();
        $category->image = $category->getImage();
        // возвращаем результат в формате JSON
        return response()->json([
            'category' => $category,
            'services' => $services
        ]);
    }
}
