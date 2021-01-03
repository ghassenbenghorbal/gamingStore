<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Carbon\Carbon;
class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function new_products_are_visible_in_home_page()
    {
        $cat = factory(Category::class)->create();
        $prod = factory(Product::class)->create(["category_id" => $cat->id]);
        $this->assertCount(1, Product::all());
        $this->assertCount(1, Category::all());
        $response = $this->get("/");
        $response->assertSee($prod->name);
    }
    /** @test */
    public function search_product_by_name()
    {
        $cat = factory(Category::class)->create();
        $prod = factory(Product::class)->create(["category_id" => $cat->id]);
        $this->assertCount(1, Product::all());
        $this->assertCount(1, Category::all());
        $response = $this->get("/search?n=".$prod->name);
        $response->assertSee($prod->name);
    }
    /** @test */
    public function search_product_by_name_reversed()
    {
        $cat = factory(Category::class)->create();
        $prod = factory(Product::class)->create(["category_id" => $cat->id]);
        $this->assertCount(1, Product::all());
        $this->assertCount(1, Category::all());
        $response = $this->get("/search?n=faketest");
        $response->assertDontSee($prod->name);
    }
    /** @test */
    public function filter_by_category()
    {
        $cat = factory(Category::class)->create();
        $prod = factory(Product::class)->create(["category_id" => $cat->id]);
        $this->assertCount(1, Product::all());
        $this->assertCount(1, Category::all());
        $response = $this->get("/search?c=".$cat->id);
        $response->assertSee($prod->name);
    }
    /** @test */
    public function filter_by_category_reversed()
    {
        $cat = factory(Category::class)->create();
        $prod = factory(Product::class)->create(["category_id" => $cat->id]);
        $this->assertCount(1, Product::all());
        $this->assertCount(1, Category::all());
        $response = $this->get("/search?c=FakeTest");
        $response->assertDontSee($prod->name);
    }

    /** @test */
    public function products_are_visible_in_admin_table()
    {
        $cat = factory(Category::class)->create();
        $prod = factory(Product::class)->create(["category_id" => $cat->id]);
        $this->assertCount(1, Product::all());
        $this->assertCount(1, Category::all());
        $admin = Admin::create([
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now()
        ]);
        $response = $this->actingAs($admin)->withSession(['admin' => $admin])->get('/admin_panel/products');
        $response->assertSee($prod->name);
    }
    /** @test */
    public function categories_are_visible_in_admin_table()
    {
        $cat = factory(Category::class)->create();
        $this->assertCount(1, Category::all());
        $admin = Admin::create([
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now()
        ]);
        $response = $this->actingAs($admin)->withSession(['admin' => $admin])->get(route('admin.categories'));
        $response->assertSee($cat->name);
    }
    /** @test */
    public function products_are_visible_in_cart()
    {
        $cat = factory(Category::class)->create();
        $prod = factory(Product::class)->create(['price'=>130, "category_id" => $cat->id]);
        $data = ['id'=>$cat->id, 'quantity'=>1];
        $cart = $prod->id.":1::";
        $response = $this->withSession(["orderCounter" => 1, "cart"=>$cart])->get(route("user.cart"));
        $response->assertSee("130 TND");
        $response->assertSee($prod->name);
    }
    /** @test */
    public function cart_confirm_redirects_to_login()
    {
        $cat = factory(Category::class)->create();
        $prod = factory(Product::class)->create(['price'=>130, "category_id" => $cat->id]);
        $data = ['id'=>$cat->id, 'quantity'=>1];
        $cart = $prod->id.":1::";
        $response = $this->withSession(["orderCounter" => 1, "cart"=>$cart])->post(route("user.cart"));
        $response->assertRedirect(route("user.cart"));
    }

}
