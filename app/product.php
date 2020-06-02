<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nutrition;
use App\Production_store;
use App\Product_Request;
use App\Deliver;
use App\StockBuckup;
use App\Product_store;
use App\Finalproduct;
use APP\Rowproduct;
use DB;
use App\Preparation;

class product extends Model
{
    //
    protected $fillable = ['name','amount','user_id'];

       public function nutrition(){
    	return $this->belongsTo(Nutrition::class);
    } 

      public function production_store(){
    	return $this->hasOne(Production_store::class);
    }

        public function product_request(){
    	return $this->hasOne(Product_Request::class);
    }

        public function deliver(){
        return $this->hasOne(Deliver::class);
    }

      public function stock_backup(){
      return $this->hasOne(StockBuckup::class);
    }

      public function shop_backup(){
      return $this->hasOne(ShopBuckup::class);
    }
    public function product_store(){
      return $this->hasOne(Product_store::class);
    }

    public function final_product(){
      return $this->hasOne(Finalproduct::class);
    }
      public function row_product(){
      return $this->hasOne(Rowproduct::class);
    }

      public function preparation(){
      return $this->hasOne(Preparation::class);
    }

       public static function insertData($data){

      $value=product::where('name', $data['name'])->get();
      if($value->count() == 0){
         DB::table('products')->insert($data);
      }
   }



}
