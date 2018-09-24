<?php


namespace App\Http\Controllers;



use Validator;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
    {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);


        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|max:255',
            'detail' => 'required',
            'photo' => 'required|image|max:1024'
        ]);


   
if( $request->hasFile('photo') ) {
        $file = $request->file('photo');
        // Get the Image Name with the File Extension ( e.g .jpg / .png )
        $fileName = rand(11111, 99999) .'.'.$file->getClientOriginalExtension();
        // Set the Filepath 
        $destinationPath = 'uploads'; //upload folder
        $path = 'uploads/'.$fileName;  //use for save full path in database
        $file = $file->move($destinationPath, $fileName); // Move the file to the upload Folder
        }
     
     

        $products  = Product::create([
                              'name' => $request->name,
                              'detail' => $request->detail,
                              'photo' =>$path
                        ]);


        $products->save();
       
       // Product::create($request->all());


        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'name' => 'required|max:255',
            'detail' => 'required',
            'photo' => 'image|max:1024'
        ]);

       if( $request->hasFile('photo') ) {
        $file = $request->file('photo');
        $fileName = rand(11111, 99999) .'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads'; 
        $path = 'uploads/'.$fileName;  //use for save full path in database
        $file = $file->move($destinationPath, $fileName); 
        }

        else{
            $path = $request->input('oldphotourl');

        }

        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->photo = $path;
        $product->save();
        //$product->update($request->all());
        return redirect()->route('products.index')
                        ->with('success','Update successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        

    //     if(file_exists('uploads')){
    //     @unlink('uploads');
    // }
       // File::delete('uploads/' . 'test.jpg');
    $product->delete();
    //parent::delete();


        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}