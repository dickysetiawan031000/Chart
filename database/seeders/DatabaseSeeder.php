<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1000)->create();
        // \App\Models\ProductBrand::factory()->create();
        // \App\Models\Product::factory(100)->create();
        // \App\Models\ReportProduct::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('products')->insert([
            'product_name' => 'Product A',
            'product_brand_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product B',
            'product_brand_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product C',
            'product_brand_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product D',
            'product_brand_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product E',
            'product_brand_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'product_name' => 'Product F',
            'product_brand_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Product Brand

        DB::table('product_brands')->insert([
            'brand_name' => 'Roti Tawar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('product_brands')->insert([
            'brand_name' => 'Susu Kaleng',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Report Product
        DB::table('report_products')->insert([
            'store_id' => '1',
            'product_id' => '1',
            'compliance' => '1',
            'date' => '2021-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '1',
            'product_id' => '2',
            'compliance' => '1',
            'date' => '2021-01-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '1',
            'product_id' => '3',
            'compliance' => '0',
            'date' => '2021-01-02',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '1',
            'product_id' => '4',
            'compliance' => '0',
            'date' => '2021-01-02',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '1',
            'product_id' => '5',
            'compliance' => '1',
            'date' => '2021-01-02',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '1',
            'product_id' => '6',
            'compliance' => '0',
            'date' => '2021-01-03',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '2',
            'product_id' => '1',
            'compliance' => '1',
            'date' => '2021-01-03',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '2',
            'product_id' => '2',
            'compliance' => '0',
            'date' => '2021-01-04',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '2',
            'product_id' => '3',
            'compliance' => '0',
            'date' => '2021-01-04',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '2',
            'product_id' => '4',
            'compliance' => '1',
            'date' => '2021-01-04',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '2',
            'product_id' => '5',
            'compliance' => '0',
            'date' => '2021-01-05',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '2',
            'product_id' => '6',
            'compliance' => '1',
            'date' => '2021-01-05',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '3',
            'product_id' => '1',
            'compliance' => '0',
            'date' => '2021-01-05',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '3',
            'product_id' => '2',
            'compliance' => '1',
            'date' => '2021-01-05',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '3',
            'product_id' => '3',
            'compliance' => '0',
            'date' => '2021-01-06',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '3',
            'product_id' => '4',
            'compliance' => '0',
            'date' => '2021-01-06',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '3',
            'product_id' => '5',
            'compliance' => '1',
            'date' => '2021-01-06',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('report_products')->insert([
            'store_id' => '3',
            'product_id' => '6',
            'compliance' => '0',
            'date' => '2021-01-06',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '4',
            'product_id' => '1',
            'compliance' => '1',
            'date' => '2021-01-06',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '4',
            'product_id' => '2',
            'compliance' => '0',
            'date' => '2021-01-06',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '4',
            'product_id' => '3',
            'compliance' => '0',
            'date' => '2021-01-07',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '4',
            'product_id' => '4',
            'compliance' => '0',
            'date' => '2021-01-07',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '4',
            'product_id' => '5',
            'compliance' => '1',
            'date' => '2021-01-08',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '4',
            'product_id' => '6',
            'compliance' => '0',
            'date' => '2021-01-09',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('report_products')->insert([
            'store_id' => '5',
            'product_id' => '1',
            'compliance' => '1',
            'date' => '2021-01-10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Stores

        DB::table('stores')->insert([
            'store_name' => 'Indomaret Djakarta',
            'store_account_id' => '1',
            'store_area_id' => '1',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Indomaret Jawa Barat',
            'store_account_id' => '1',
            'store_area_id' => '2',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Indomaret Kalimantan',
            'store_account_id' => '1',
            'store_area_id' => '3',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Indomaret Jawa Tengah',
            'store_account_id' => '1',
            'store_area_id' => '4',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Indomaret Bali',
            'store_account_id' => '1',
            'store_area_id' => '5',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Hypermart Djakarta',
            'store_account_id' => '2',
            'store_area_id' => '1',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Hypermart Jawa Barat',
            'store_account_id' => '2',
            'store_area_id' => '2',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Hypermart Kalimantan',
            'store_account_id' => '2',
            'store_area_id' => '3',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Hypermart Jawa Tengah',
            'store_account_id' => '2',
            'store_area_id' => '4',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('stores')->insert([
            'store_name' => 'Hypermart Bali',
            'store_account_id' => '2',
            'store_area_id' => '5',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Store Accounts
        DB::table('store_accounts')->insert([
            'account_name' => 'Indomaret',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('store_accounts')->insert([
            'account_name' => 'Hypermarket',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Store Areas
        DB::table('store_areas')->insert([
            'area_name' => 'DKI Jakarta',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('store_areas')->insert([
            'area_name' => 'Jawa Barat',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('store_areas')->insert([
            'area_name' => 'Kalimantan',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('store_areas')->insert([
            'area_name' => 'Jawa Tengah',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('store_areas')->insert([
            'area_name' => 'Bali',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
