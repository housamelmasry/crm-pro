<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    //  Display a listing of the resource.
    public function index()
    {
        // // searsh
        // $request= request();
        // $query=Category::query();
        // if($name = $request->query('name')){
        //     $query->where('name','like', "%{'$name'}%" );
        // }
        // if($status= $request->query('status')){
        //     $query->where('status', $status );
        // }

        // // view as paginate
        // $categories = $query->paginate(10);

        // $categories = Category::paginate(10);
        // return response('/', compact('categories'));






          $categories = Category::all();
          return response()->json($categories);
    }



    //   Show the form for creating a new resource.
    public function create(Request $request, Category $category)
    {
        $fields = $request->validate([
        'name' =>
        [
            'required',
            'string',
            'min:3','max:255',
           // 'unique:category,name,$id',
            // Rule::unique('categories','name')->ignore($id),


            // custom validation
            // new Filter(),

            // function($attribute, $value,$fails){
            //     if(strtolower($value == 'category')){
            //         $fails('this name is not allowed');
            //     }
            // },

        ],
       'parent_id' =>
       [
            'nullable','int', //'exists:categories,id',
       ],

    //    'image'=>
    //    [
    //         'image','max:1048576','dimensions:min_width=100,min_height=100',
    //    ],

       'status' =>'in:active,archived'

    ]);



        // $parents = Category::all();
        // $category = new Category(); // category in '_form.blade.php' page

        Category::create([
            'name' => $fields['name'],
            'parent_id' => $fields['parent_id'],
            // 'status' => $fields['status'],
        ]);
        // return view('/', compact('parents', 'category'));
        return response('Category created sucsessfuly', 201);
    }








    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate(Category::rules(),[
            'required' => 'this field (:attribute) is required',
            'unique' => 'this field (:attribute)in already exists',
        ]);

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');  // UploadedFile object
            $path = $file->store('uploads', [
                'disk' => 'public'
            ]);
            $data['image'] = $path;
        }

        $category = Category::create($data);
        return Redirect::route('categories.index')->with('success', 'Category created successfully!');

        // $request ->post('name');
        // $request->name;

        //  $request->all();
        //  $request->only([,]);
        //  $request->except([,]);

        // $category = new Category($request->all());
        // $category->save();

    }




    //  Display the specified resource.
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);

    }





    //  Show the form for editing the specified resource.
    public function edit(string $id)
    {

        try {
            $category = Category::findOrFail($id);
        } catch (Exception $e) {
            //   abort(404)
            // return redirect()->route('dashboard.categories.index')
            // ->with('info', 'Category not found');
        }



        $parents = Category::where('id', '<>', $id) //select * from Categories where id <> $id
            ->where(function ($query) use ($id) {
                $query->whereNull('parent_id')                  //and (parent_id is null or parent_id <> $id)
                    ->orWhere('parent_id', '<>', $id);
            })
            ->get();
        // return view('/', compact('category', 'parents'));
    }






    //  Update the specified resource in storage.
    public function update(Request $request, string $id)
    {

        $request->validate(Category::rules($id));
        /*
        request: {
            id: 1,
            name: 'Laravel',
            description: '',
            image: 'FileObject(laravel.png)',
        }
        */
        $category = Category::findOrFail($id);

        $old_image = $category->image;

        $data = $request->except('image');


        if ($request->hasFile('image')) {
            $file = $request->file('image');            // UploadedFile object
            $path = $file->store('uploads', [           //path = 'storage/uploads/3sN6Telgp4P7qXywPnohhB72J6yPH58jpSJWNkvM.png'
                'disk' => 'public'
            ]);
            $data['image'] = $path;
        }



        $category->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        return response()->with('success', 'Category updated successfully!');
    }






    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        // $category = Category::find($id);
        // $category->delete();
        Category::destroy($id);
        return Redirect::route('/')->with('success', 'Category deleted!');
    }


}


