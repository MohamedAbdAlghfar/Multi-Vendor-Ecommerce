<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
.back-button {
  background-color: red;
  color: white;
  border: 1px solid black;
  padding: 5px 10px;
  font-size: 16px;
  text-decoration: none;
  cursor: pointer;
}



    </style>
</head>
<body>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Products') }}</h3>
                        </div>
                    </div>
                </div>
                @foreach($data['product_of_web'] as $product)
                <div class="row">   
              @if ($product->Photos->isNotEmpty())
    <img src="/images/{{ $product->Photos->first()->filename }}"width = 200px hight = 200px>
                @else
                                
                                    <img src="/images/default.jpeg" class="card-img-top" alt="Default Product Photo"width = 200px hight = 200px>
                                @endif  
                                <div class="card-body">
                                    <h5 class="card-title">{{ \Str::limit($product->product_name, 100) }}</h5>
                                </div>
                            </div>
                        </div>
                        <h5>N.Of Available pieces ::  {{ $product->available_pieces }} </h5>
                       
                        <form  method="POST" action="{{ route('product.destroy', $product) }}"> 
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('product.edit', $product) }}" class="back-button">Edit</a>
                                        <a href="{{ route('ShowProductPhotos.showPhotos', $product) }}" class="back-button">Show Photos</a>

                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deleteproduct">
                            
                                </form>
                       
                                   
                   
                        
                      
                        @endforeach
              
                        
                        @foreach($data['product_of_store'] as $product)
                <div class="row">   
              @if ($product->Photos->isNotEmpty())
    <img src="/images/{{ $product->Photos->first()->filename }}"width = 200px hight = 200px>
                @else
                                
                                    <img src="/images/default.jpeg" class="card-img-top" alt="Default Product Photo"width = 200px hight = 200px>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ \Str::limit($product->product_name, 100) }}</h5>
                                </div>
                            </div>
                        </div>
                        <h5>N.Of Available pieces ::  {{ $product->available_pieces }} </h5>
                      
                       
                                        
                   
                        
                        <h5 class="card-title">Store Name :: {{ $product->store_name }}</h5>
                       
                      
                        @endforeach



              
              
              
                    </div>
                
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
<a href="{{ route('admin.index') }}" class="back-button">Back</a>
</body>
</html>