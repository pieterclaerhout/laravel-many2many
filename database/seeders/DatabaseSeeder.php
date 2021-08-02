<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVendor;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::truncate();
        Vendor::truncate();
        ProductVendor::truncate();

        $product1 = Product::create([
            'id'          => 1,
            'name'        => 'Product 1',
            'description' => 'The first product',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        $vendor1 = Vendor::create([
            'id'         => 1,
            'name'       => 'Vendor 1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $vendor2 = Vendor::create([
            'id'         => 2,
            'name'       => 'Vendor 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $product1->vendors()->attach($vendor1->id);
        $product1->vendors()->attach($vendor2->id);

    }
}
