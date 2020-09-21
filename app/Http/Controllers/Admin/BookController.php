<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Book;
use Illuminate\Http\Request;
use Image;
use File;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $book = Book::where('book_title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('cover_image', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $book = Book::paginate($perPage);
            }

            return view('admin.book.index', compact('book'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.book.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'book_title' => 'required',
			'description' => 'required',
			'cover_image' => 'required',
			'price' => 'required'
		]);

            $book = new book($request->all());

            if ($request->hasFile('cover_image')) {

                $file = $request->file('cover_image');
                
                //make sure yo have image folder inside your public
                $book_path = 'uploads/books/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($book_path) . DIRECTORY_SEPARATOR. $profileImage);

                $book->cover_image = $book_path.$profileImage;
            }
            
            $book->save();

            return redirect('admin/book')->with('flash_message', 'Book added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $book = Book::findOrFail($id);
            return view('admin.book.show', compact('book'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $book = Book::findOrFail($id);
            return view('admin.book.edit', compact('book'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'book_title' => 'required',
			'description' => 'required',
			'price' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('cover_image')) {
            
            $book = book::where('id', $id)->first();
            $image_path = public_path($book->cover_image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('cover_image');
            $fileNameExt = $request->file('cover_image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/books/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['cover_image'] = 'uploads/books/'.$fileNameToStore;               
        }


            $book = Book::findOrFail($id);
             $book->update($requestData);

             return redirect('admin/book')->with('flash_message', 'Book updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('book','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Book::destroy($id);

            return redirect('admin/book')->with('flash_message', 'Book deleted!');
        }
        return response(view('403'), 403);

    }
}
