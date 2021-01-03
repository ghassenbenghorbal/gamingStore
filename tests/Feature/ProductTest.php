<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Carbon\Carbon;
class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function new_products_are_visible()
    {
        Product::create([
            'name' => "product 1",
            'image' => 'uploads/6.jpg',
            'description' => 'published by Ubisoft. It is the twelfth major installment and the twenty-second release in the Assassin\'s Creed series, and a successor to the 2018 game Assassin\'s Creed Odyssey.',
            'price' => 160,
            'genre' => 'Action',
            'discount' => null,
            'tag' => 'HOT',
            'category_id' => 3,
            'created_at' => Carbon::now()
        ]);
        $admin = Admin::create([
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(),
        ]);
        $this->actingAs($admin);
        $this->assertCount(1, Product::all());
        $response = $this->get("/admin_panel/products");
        $response->assertSee('product 2');
    }
}
