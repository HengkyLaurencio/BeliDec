<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct() {
        $productData = Product::all();
        echo '<!DOCTYPE html>
        <html>
            <head>
                <title>Tes</title>
            </head>
            <body>
                <h1></h1>
                <div>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Desc</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>ShopID</th>
                        </tr>';
                
                foreach ($productData as $product) {
                    echo '<tr>
                            <td>' . $product->id . '</td>
                            <td>' . $product->name . '</td>
                            <td>' . $product->description . '</td>
                            <td>' . $product->price . '</td>
                            <td>' . $product->stock . '</td>
                            <td>' . $product->shop_id . '</td>
                            </tr>';
                }
                echo '    </table>
                </div>
            </body>
        </html>';
    }

    public function getProducts($id){
        $product = Product::find($id);
        if (!$product) {
            return response('Product not found');
        }
        echo '<!DOCTYPE html>
        <html>
            <head>
                <title>Tes</title>
            </head>
            <body>

                <h1>Get Product By ID</h1>
                <div>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Desc</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>ShopID</th>
                        </tr>';
                    
                       echo '<tr>
                            <td>' . $product->id . '</td>
                            <td>' . $product->name . '</td>
                            <td>' . $product->description . '</td>
                            <td>' . $product->price . '</td>
                            <td>' . $product->stock . '</td>
                            <td>' . $product->shop_id . '</td>
                        </tr>';
		    '</table>
                </div>
            </body>
        </html>';
    }

    public function simpan(Request $request) {
        $productData = $request->validate([
            'productName' => ['required', 'string'],
            'Description' => ['required', 'string'],
            'Price' => ['required', 'decimal:2'],
            'Stock' => ['required', 'integer'],
            'ShopId' => ['required', 'integer'],
        ]);
    
        $newProduct = Product::create([
            'name' => $productData['productName'],
            'description' => $productData['Description'],
            'price' => $productData['Price'],
            'stock' => $productData['Stock'],
            'shop_id' => $productData['ShopId'],
        ]);
    
        return redirect()->route('getProduct');
    }
    
    public function createProduct(Product $product, Request $request){
        return '
        <html>
            <head><title>Tes</title>
            <body>
            <h1>Create Product</h1>
                <form method="post" action="'.route('simpan').'">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">

                    <div>
                    <label>Product Name</label>
                    <input type="text" name="productName" placeholder="Product Name">
                    </div>

                    <div>
                    <label>Description</label>
                    <input type="text" name="Description" placeholder="Description">
                    </div>

                    <div>
                    <label>Price</label>
                    <input type="text" name="Price" placeholder="Price">
                    </div>

                    <div>
                    <label>Stock</label>
                    <input type="text" name="Stock" placeholder="Stock">
                    </div>

                    <div>
                    <label>ShopId</label>
                    <input type="text" name="ShopId" placeholder="ShopId">
                    </div>

                    <div>
                    <input type="submit" value="Create Product">
                    </div>

                </form>
            </body>
        </html>
        ';
    }

    public function updateProduct(Product $product, Request $request){
        $productData = $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | decimal:2',
            'stock' => 'required | integer',
            'shop_id' => 'required | integer',
        ]);

        $product->update($productData);

        return redirect()->route('getProduct');

    }

    public function editProduct(Product $product, Request $request){
        return '
        <html>
        <head><title>Tes</title>
        <body>
            <h1>Update Product Details</h1>
            <form method="post" action="'.route('updateProduct', ['product' => $product->id]) .'">
                <input type="hidden" name="_token" value="' . csrf_token() . '">
                <input type="hidden" name="_method" value="put">
                
                    <div>
                    <label>Product Name</label>
                    <input type="text" name="name" placeholder="Product Name"'.$product->name.'">
                    </div>

                    <div>
                    <label>Description</label>
                    <input type="text" name="description" placeholder="Description"'.$product->description.'">
                    </div>

                    <div>
                    <label>Price</label>
                    <input type="text" name="price" placeholder="Price"'.$product->price.'">
                    </div>

                    <div>
                    <label>Stock</label>
                    <input type="text" name="stock" placeholder="Stock"'.$product->stock.'">
                    </div>

                    <div>
                    <label>ShopId</label>
                    <input type="text" name="shop_id" placeholder="ShopId"'.$product->shop_id.'">
                    </div>

                    <div>
                    <input type="submit" value="Update Product Data">
                    </div>
                </form>
            </body>
        </html>';
    }

}