<?php 
    namespace App\Helper;

    class CartHelper
    {
        public $items=[ ];
        public $total_quantity=0;
        public $total_price=0;
        public $priceDiscount=0;

        public function __construct(){
            $this->items=session('cart')?session('cart'):[];
            $this->total_price=$this->get_total();
            $this->total_quantity=$this->get_quantity();
            $this->priceDiscount=session('price_sale')?session('price_sale'):0;
        }
        public function add($product,$quantity=1){
            if (count($product->getImgProductDetail())>0) {
                $imgUrl=($product->getImgProductDetail())[0]->url_img;
            }else{
                $imgUrl='/public/fontEnd/imgBlack.jpg';
            }
            $item=[
                'id'=>$product->id,
                'name'=>$product->product->name,
                'price'=>$product->price_sale,
                'img'=>$imgUrl,
                'brand'=>$product->product->brand->name,
                'quantity'=>$quantity
            ];
            if (isset($this->items[$product->id])) {
                $this->items[$product->id]['quantity'] += $quantity;
            }else{
                $this->items[$product->id] = $item;
            }      
            session(['cart'=>$this->items]);
        }
        public function remove($id){
            if (isset($this->items[$id])) {
                unset($this->items[$id]);
            }
            session(['cart'=>$this->items]);
            if (count($this->items)==0) {
                session(['price_sale'=>'']);
            }
        }
        public function clear(){
            session(['cart'=>'']);
            session(['price_sale'=>'']);
        }
        public function update($id,$quantity=1){
            if (isset($this->items[$id])) {
                $this->items[$id]['quantity'] = $quantity;
            }
            session(['cart'=>$this->items]);
        }
        public function setDiscount($discountRecord){
            $total=$this->total_price;
            $ratio=$discountRecord->ratio;
            $maxPrice=$discountRecord->ceilingPrice;
            $minPrice=$discountRecord->priceStart;
            $priceRatio=round(($ratio/100)*$total, 2);
            if ($total>=$minPrice) {
                if ($priceRatio>$maxPrice) {
                    $priceRatio=$maxPrice;
                }
                $this->priceDiscount=$priceRatio;
                session(['price_sale'=>$this->priceDiscount]);
                return [
                    'status'=>'true',
                    'priceRatio'=>$priceRatio
                ];
              
            }
            $this->priceDiscount=$priceRatio;
            session(['price_sale'=>$this->priceDiscount]);
            return [
                'status'=>'false'
            ];
            
        }
        private function get_total(){
            $sum=0;
            foreach ($this->items as $item) {
                $sum+=$item['quantity']*$item['price'];
            }
            return $sum;
        }
        private function get_quantity(){
            $quantity=0;
            foreach ($this->items as $item) {
                $quantity+=$item['quantity'];
            }
            return $quantity;
        }
    }


?>