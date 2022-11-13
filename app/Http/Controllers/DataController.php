<?php

namespace App\Http\Controllers;

use App\Models\ProductBrand;
use App\Models\ReportProduct;
use App\Models\StoreArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $query = DB::table('report_products')
                ->join('stores', 'report_products.store_id', '=', 'stores.id')
                ->join('products', 'report_products.product_id', '=', 'products.id')
                ->select('report_products.*', 'stores.store_name', 'products.product_name')
                ->where('report_products.deleted_at', null)
                ->orderBy('report_products.created_at', 'desc');

            return DataTables::of($query)
                ->addIndexColumn()
                ->make(true);
        }

        return view('data');
    }


    // public function table()
    // {
    //     $query = ReportProduct::with('store', 'product')->latest();

    //     return DataTables::of($query)
    //         ->addIndexColumn()
    //         ->addColumn('store.store_name', function ($data) {
    //             return $data->store->store_name;
    //         })
    //         ->addColumn('opsi', function ($data) {

    //             return '<span> Edit </span> | <span class="text-danger"> Delete </span>';
    //         })
    //         ->rawColumn(['opsi'])
    //         ->make(true);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
