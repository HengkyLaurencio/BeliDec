<?php

namespace App\Http\Controllers;
use App\Models\Products;
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
                        </tr>';
                
                foreach ($productData as $product) {
                    echo '<tr>
                            <td>' . $product->id . '</td>
                            <td>' . $product->name . '</td>
                            <td>' . $product->description . '</td>
                            <td>' . $product->price . '</td>
                            </tr>';
                }

                echo '    </table>
                </div>
            </body>
        </html>';
    }

    public function getProducts($id){
        $product = Product::find($id);
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
                        </tr>';
                    
                       echo '<tr>
                            <td>' . $product->id . '</td>
                            <td>' . $product->name . '</td>
                            <td>' . $product->description . '</td>
                            <td>' . $product->price . '</td>
                        </tr>';
		    '</table>
                </div>
            </body>
        </html>';
    }

    public function createProduct(){
        
        
    }
}