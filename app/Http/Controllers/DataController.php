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
    public function index()
    {
        // check view stats_report table is exist
        if (!DB::connection('mysql')->select('SHOW TABLES LIKE "stats_report"')) {
            DB::connection('mysql')->select("
                create view stats_report as
                select
                sa.area_name , pb.brand_name , p.product_name , sum(rp.compliance) as compliance , rp.`date`
                from report_products rp
                inner join stores s on rp.store_id = s.id
                inner join store_areas sa on s.store_area_id = sa.id
                inner join products p on rp.product_id = p.id
                inner join product_brands pb on p.product_brand_id = pb.id
                group by area_name, brand_name, date
            ");
        }

        return view('index', [
            'store_areas' => StoreArea::all(),
            'date_from' => '2021-01-01',
            'date_to' => '2021-12-31'
        ]);
    }

    public function getData($for, $area, $date_from, $date_to)
    {
        if ($area == 'all_area') {
            $whereAreaName = "and area_name in ('DKI Jakarta', 'Jawa Barat', 'Kalimantan', 'Jawa Tengah', 'Bali') group by brand_name, sr.date";
        } else {
            $whereAreaName = "and area_name = '$area' group by brand_name, sr.date";
        }

        $query = DB::connection('mysql')->select("SELECT
                brand, sum(dki_jakarta) as dki_jakarta, sum(jawa_barat) as jawa_barat, sum(kalimantan) as kalimantan, sum(jawa_tengah) as jawa_tengah, sum(bali) as bali
                from (
                    select
                    brand_name as brand, area_name , sr.date,
                    (select (SUM(compliance)/(select count(*) from report_products rp2) * 100) from stats_report sr2 where sr2.area_name = 'DKI Jakarta' and sr2.area_name = sr.area_name and sr2.date = sr.date group by sr2.area_name) as 'dki_jakarta',
                    (select (SUM(compliance)/(select count(*) from report_products rp2) * 100) from stats_report sr2 where sr2.area_name = 'Jawa Barat' and sr2.area_name = sr.area_name and sr2.date = sr.date group by sr2.area_name) as 'jawa_barat',
                    (select (SUM(compliance)/(select count(*) from report_products rp2) * 100) from stats_report sr2 where sr2.area_name = 'Kalimantan' and sr2.area_name = sr.area_name and sr2.date = sr.date group by sr2.area_name) as 'kalimantan',
                    (select (SUM(compliance)/(select count(*) from report_products rp2) * 100) from stats_report sr2 where sr2.area_name = 'Jawa Tengah' and sr2.area_name = sr.area_name and sr2.date = sr.date group by sr2.area_name) as 'jawa_tengah',
                    (select (SUM(compliance)/(select count(*) from report_products rp2) * 100) from stats_report sr2 where sr2.area_name = 'Bali' and sr2.area_name = sr.area_name and sr2.date = sr.date group by sr2.area_name) as 'bali'
                    from stats_report sr
                    where sr.date between '$date_from' and '$date_to'
                    $whereAreaName
                )x group by brand
            ");

        if ($for == 'datatable') {
            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('dki_jakarta', function ($row) {
                    return round($row->dki_jakarta) . '%';
                })
                ->editColumn('jawa_barat', function ($row) {
                    return round($row->jawa_barat) . '%';
                })
                ->editColumn('kalimantan', function ($row) {
                    return round($row->kalimantan) . '%';
                })
                ->editColumn('jawa_tengah', function ($row) {
                    return round($row->jawa_tengah) . '%';
                })
                ->editColumn('bali', function ($row) {
                    return round($row->bali) . '%';
                })
                ->make(true);
        } else if ($for == 'chart') {
            return response()->json([
                'data' => $query
            ]);
        }
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
