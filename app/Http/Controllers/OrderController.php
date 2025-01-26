<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Table;
use App\Models\User;
use App\Services\OrderService;
use App\Services\TableService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function selectUser(Table $table, TableService $tableService): View
    {
        if ($table->isOccupied()) {
            $order = $tableService->getLastOrder($table);
            $categoryCollection = $tableService->getCategoriesWithProducts();
            return view("orders.edit.selectProducts", compact("order", "categoryCollection"));
        }
        $userCollection = $tableService->getAllUsers();
        return view("orders.create.selectUser", compact("table", "userCollection"));
    }

    public function selectProducts(Table $table, TableService $tableService, User $user): View|RedirectResponse
    {
        if ($table->isOccupied()) return redirect()->route("tables.index");
        $categoryCollection = $tableService->getCategoriesWithProducts();
        return view("orders.create.selectProducts", compact("table", "user", "categoryCollection"));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderCollection = Order::with("user", "table")->paginate(10);
        return view("orders.index", compact("orderCollection"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $data = $request->validated();
        $order = $orderService->createOrder($data, $orderService->validateProducts($request));
        if ($data["finalize"] ?? false == null) {
            $order->updateProductsStock();
            Table::find($data["table_id"])->markAsAvailable();
            return redirect()->route("tables.index")->with("message", "Order finalized successly");
        }
        Table::find($data["table_id"])->markAsOccupied();
        return redirect()->route("tables.index")->with("message", "Order added successly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view("orders.show", compact("order"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, OrderService $orderService, Order $order)
    {
        $data = $request->validated();
        $orderService->updateOrder($orderService->validateProducts($request), $order);
        if ($data["finalize"] ?? false == null) {
            $order->updateProductsStock();
            Table::find($data["table_id"])->markAsAvailable();
            return redirect()->route("tables.index")->with("message", "Order finalized successly");
        }
        return redirect()->route("tables.index")->with("message", "Order updated successly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("orders.index")->with("message", "Order deleted successly");
    }
}
