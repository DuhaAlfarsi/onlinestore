<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>online store</title>
  </head>
  <body>
    
     <form action="/products/update/{{$products->id}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="container pt-5">
            <h1>{{ __('Edit Products')}}</h1>
         <div class="mb-3">
             <label for="name" class="form-label">{{ __('Name')}}</label>
             <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}">
           </div>
           <div class="mb-3">
             <label for="price" class="form-label">{{ __('Price')}}</label>
             <input type="number" class="form-control" id="price" name="price" value="{{ $products->price }}">
             </div>
     
             <div class="mb-3">
                 <label for="formFile" class="form-label">{{ __('Product Image')}}</label>
                 <input class="form-control" type="file" id="formFile" name="image" >
                 <br>
                 <img src="{{ asset($products->image_path) }}" alt="" style="max-width: 100px">
               </div>
     
               <div class="mb-3">
                 <label for="category_id" class="form-label">{{ __('Category_Id')}}</label>
                   <input type="number" class="form-control" id="category_id" name="category_id" value={{ $products->category_id}}>
                 </div>

                 <button type="submit" class="btn btn-primary">Submit</button>
         </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>