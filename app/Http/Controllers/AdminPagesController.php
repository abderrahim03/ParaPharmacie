<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPagesController extends Controller
{
    function admin()  {
        return view('admin.app');
    }

    function dashboard()  {

        $orders = Order::with('user', 'orderItems')->get();
        
        return view('admin.dashboard', compact('orders'));
    }

    public function SalesFilter($filter)
    {   
        if ($filter == '') {
            $filter == 'This Year';
        }
        $orders = Order::with('orderItems')->get();

        $Cnow = Carbon::now()->toDateString();
        $now = now();
        $yesterday = $now->subDay()->toDateString();
        $Old = $now->subMonth();
        
        $Nsale = 0;
        $Osale = 0;
        $percentage = 0;

        foreach ($orders as $order) {
            
            $Cdate = Carbon::parse($order->created_at)->toDateString();
            $date = Carbon::parse($order->created_at);   


            if ($filter == 'This Month' && now()->month == $date->month && $now->year == $date->year) {
                
                $Nsale += 1;
                
                if ($date->month == $Old->month) {
                    $Osale += 1;
                }    

                $percentage = ($Nsale - $Osale) / $Nsale * 100;     
            }

            if ($filter == 'This Year' && $now->year == $date->year) {
                
                $Nsale += 1;

                if ($date->year == $Old->year) {
                    $Osale += 1;
                }
                $percentage = ($Nsale - $Osale) / $Nsale * 100;
            }

            if ($filter == 'Today' && $Cnow == $Cdate) {

                $Nsale += 1;
                
                if ($Cdate == $yesterday) {
                    $Osale += 1;
                }

                $percentage = ($Nsale - $Osale) / $Nsale * 100;
            }
            
        }
        

        $Or = [
            'Sfilter' => $filter,
            'Spercentage' => $percentage,
            'sales' => $Nsale,
        ];
        session($Or);

        return redirect()->back();
    }

    public function RevenueFilter($filter)
    {   
        if ($filter == '') {
            $filter == 'This Year';
        }
        $orders = Order::with('orderItems')->get();

        $Cnow = Carbon::now()->toDateString();
        $now = now();
        $yesterday = $now->subDay()->toDateString();
        $Old = $now->subMonth();
        
        $Ntotal = 0;
        $Ototal = 0;
        $percentage = 0;

        foreach ($orders as $order) {

            $Cdate = Carbon::parse($order->date)->toDateString();
            $date = Carbon::parse($order->date);
            

            if ($filter == 'Today' && $order->status == 1 && $Cnow == $Cdate) {
                
                foreach ($order->orderItems as $item) {
                    $Ntotal += $item->subtotal;
                }
                
                if ($Cdate == $yesterday) {
                    foreach ($order->orderItems as $item) {
                        $Ototal += $item->subtotal;
                    }
                }
                $percentage = ($Ntotal - $Ototal) / $Ntotal * 100;
                
            }

            if ($filter == 'This Month' && $order->status == 1 && now()->month == $date->month && $now->year == $date->year) {
                
                foreach ($order->orderItems as $item) {
                    $Ntotal += $item->subtotal;
                }
                
                if ($date->month == $Old->month) {
                    foreach ($order->orderItems as $item) {
                        $Ototal += $item->subtotal;
                    }
                }      
                $percentage = ($Ntotal - $Ototal) / $Ntotal * 100;    
            }

            if ($filter == 'This Year' && $order->status == 1 && $now->year == $date->year) {
                
                foreach ($order->orderItems as $item) {
                    $Ntotal += $item->subtotal;
                }

                if ($date->year == $Old->year) {
                    foreach ($order->orderItems as $item) {
                        $Ototal += $item->subtotal;
                    }
                }
                $percentage = ($Ntotal - $Ototal) / $Ntotal * 100;
            }
        }

        $Or = [
            'Rfilter' => $filter,
            'Rpercentage' => $percentage,
            'revenue' => $Ntotal,
        ];
        session($Or);

        return redirect()->back();
    }

    public function UserFilter($filter)
    {   
        if ($filter == '') {
            $filter == 'This Year';
        }
        $users = User::with('orders', 'reviews', 'carts')
        ->where('email', '!=', 'superAdmin@gmail.com')
        ->get();

        $Cnow = Carbon::now()->toDateString();
        $now = now();
        $yesterday = $now->subDay()->toDateString();
        $Old = $now->subMonth();
        
        $Nuser = 0;
        $Ouser = 0;
        $percentage = 0;

        foreach ($users as $user) {

            $Cdate = Carbon::parse($user->created_at)->toDateString();
            $date = Carbon::parse($user->created_at);

            
            
            if ($filter == 'Today' && $Cnow == $Cdate) {

                $Nuser += 1;
                
                if ($Cdate == $yesterday) {
                    $Ouser = $users->count();
                }
                $percentage = ($Nuser - $Ouser) / ($Nuser * 100);
            }

            if ($filter == 'This Month' && now()->month == $date->month && $now->year == $date->year) {
                
                $Nuser += 1;
                
                if ($date->month == $Old->month) {
                    $Ouser = $users->count();
                }   
                $percentage = ($Nuser - $Ouser) / ($Nuser * 100);       
            }

            if ($filter == 'This Year' && $now->year == $date->year) {
                
                $Nuser += 1;

                if ($date->year == $Old->year) {
                    $Ouser = $users->count();
                }
                $percentage = ($Nuser - $Ouser) / ($Nuser * 100);
            }
        }

        

        $Or = [
            'Ufilter' => $filter,
            'Upercentage' => $percentage,
            'users' => $Nuser,
        ];
        session($Or);

        return redirect()->back();
    }

    public function RecentFilter($filter)
    {   
        
        $items = OrderItem::with('user', 'product', 'order')
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();
        
        $Cnow = Carbon::now()->toDateString();
        $now = now();
        
        $data = [];

        foreach ($items as $item) {
            
            $Cdate = Carbon::parse($item->order->created_at)->toDateString();
            $date = Carbon::parse($item->order->created_at);

            $d = [
                'id' => '',
                'user' => '',
                'product' => '',
                'price' => '',
                'status' => '',
            ];
            // the condition have to be && not ||
            if ($filter == 'Today' && $Cnow == $Cdate) {
                
                $d = [
                    'id' => $item->id,
                    'user' => $item->user->name,
                    'product' => $item->product->name,
                    'price' => $item->product->prix,
                    'status' => $item->order->status,
                ];
                
            }

            if ($filter == 'This Month' && now()->month == $date->month && $now->year == $date->year) {
                
                $d = [
                    'id' => $item->id,
                    'user' => $item->user->name,
                    'product' => $item->product->name,
                    'price' => $item->product->prix,
                    'status' => $item->order->status,
                ];
                       
            }

            if ($filter == 'This Year' && $now->year == $date->year) {
                
                $d = [
                    'id' => $item->id,
                    'user' => $item->user->name,
                    'product' => $item->product->name,
                    'price' => $item->product->prix,
                    'status' => $item->order->status,
                ];
            }

            array_push($data, $d);
        }

        
        
        $Or = [
            'Recentfilter' => $filter,
            'data' => $data,
        ];

        session($Or);

        return redirect()->back();
    }

    public function TopFilter($filter)
    {   
        if ($filter == '') {
            $filter == 'This Year';
        }

        $topSeling = OrderItem::select('product_id', DB::raw('SUM(qty) as totalQuantity'))
        ->groupBy('product_id')
        ->orderByDesc('totalQuantity')
        ->take(10)
        ->get();

        $topOne = OrderItem::select('product_id', DB::raw('SUM(qty) as totalQuantity'))
        ->groupBy('product_id')
        ->orderByDesc('totalQuantity')
        ->first();
        
        // for know the top product : $topOne->product

        

        

        $Cnow = Carbon::now()->toDateString();
        $now = now();
        
        $data = [];
        
        foreach ($topSeling as $top) {
            // top 10 products
            $productIds = $topSeling->pluck('product_id');
            // Retrieve the product details for the top-selling products
            $products = Product::whereIn('id', $productIds)->get();
            
            foreach ($products as $product) {
                if ($product->id == $top->product_id) {
                    $Cdate = Carbon::parse($product->created_at)->toDateString();
                    $date = Carbon::parse($product->created_at);
        
                    $d = [
                        'id' => '',
                        'image' => '',
                        'product' => '',
                        'price' => '',
                        'sold' => '',
                        'revenue' => '',
                    ];
                    // the condition have to be && not ||
                    if ($filter == 'Today' && $Cnow == $Cdate) {
                        
                        $d = [
                            'id' => $product->id,
                            'image' => $product->image,
                            'product' => $product->name,
                            'price' => $product->prix,
                            'sold' => $top->totalQuantity,
                            'revenue' => $product->prix * $top->totalQuantity,
                        ];
                        
                    }
        
                    if ($filter == 'This Month' && now()->month == $date->month && $now->year == $date->year) {
                        
                        $d = [
                            'id' => $product->id,
                            'image' => $product->image,
                            'product' => $product->name,
                            'price' => $product->prix,
                            'sold' => $top->totalQuantity,
                            'revenue' => $product->prix * $top->totalQuantity,
                        ];
                               
                    }
        
                    if ($filter == 'This Year' && $now->year == $date->year) {
                        
                        $d = [
                            'id' => $product->id,
                            'image' => $product->image,
                            'product' => $product->name,
                            'price' => $product->prix,
                            'sold' => $top->totalQuantity,
                            'revenue' => $product->prix * $top->totalQuantity,
                        ];
                    }
                }
            }

            array_push($data, $d);
        }

        

        $Or = [
            'Topfilter' => $filter,
            'Tproducts' => $data,
        ];
        session($Or);

        return redirect()->back();
    }

    // // time ago 
    // $timeAgo = Carbon::parse($date)->diffForHumans();
}
