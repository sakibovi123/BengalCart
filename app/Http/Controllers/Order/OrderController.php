<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Order\Requests\OrderRequest;
use App\Http\Controllers\Order\Services\OrderService;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => $this->orderService->getAllOrders()
        ], 200);
    }

    /**
     * Display order by auth users
     * @params userId
     * @return \Illuminate\Http\JsonResponse
     */

    public function getOrdersByUser()
    {
        return response()->json([
            'success' => true,
            'data' => $this->orderService->orderByUser(Auth::user()->id)
        ], 200);
    }

    /**
     * Store a newly created order.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();

        $order = $this->orderService->createOrder($validatedData);

        return response()->json([
            'success' => true,
            'data' => $order
        ], 201);
    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Order $order)
    {
        return response()->json([
            'success' => true,
            'data' => $order
        ], 200);
    }

    /**
     * Update the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(OrderRequest $request, Order $order)
    {
        $validatedData = $request->validated();

        $updatedOrder = $this->orderService->updateOrder($order, $validatedData);

        return response()->json($updatedOrder);
    }

    /**
     * Remove the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $this->orderService->deleteOrder($order);

        return response()->noContent();
    }
}
