 <!DOCTYPE html>
 <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta content="width=device-width, initial-scale=1.0" name="viewport">
         <title>Product List</title>
     </head>

     <body>
         <h1>Set Discount for {{ $product->name }}</h1>

         <form action="{{ route('products.setDiscount', $product->id) }}" method="POST">
             @csrf

             <div class="form-group">
                 <label for="discount_percentage">Discount Percentage</label>
                 <input class="form-control" id="discount_percentage" name="discount_percentage" required step="0.01"
                     type="number">
                 @error('discount_percentage')
                     <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

             <div class="form-group">
                 <label for="start_date">Start Date</label>
                 <input class="form-control" id="start_date" name="start_date" type="date">
             </div>

             <div class="form-group">
                 <label for="end_date">End Date</label>
                 <input class="form-control" id="end_date" name="end_date" type="date">
             </div>

             <button class="btn btn-primary" type="submit">Set Discount</button>
             <a class="btn btn-secondary" href="{{ route('products.manage') }}">Cancel</a>
         </form>
     </body>

 </html>
