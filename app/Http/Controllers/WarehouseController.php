<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse; // حتماً این خط را اضافه کن

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        // جستجو و فیلتر نمونه
        $query = Warehouse::query();

        if ($request->filled('q')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->q}%")
                  ->orWhere('code', 'like', "%{$request->q}%");
            });
        }
        if ($request->filled('status')) {
            $query->where('is_active', $request->status == 'active' ? 1 : 0);
        }

        // رابطه‌ها و شمارش کالاها
        $warehouses = $query->with(['branch', 'manager'])
            ->withCount('items')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('warehouse.index', compact('warehouses'));
    }
}
