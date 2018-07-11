<?php

namespace App\Http\Controllers;

use App\Book;
use App\Photo;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.book.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'fname' => 'required|alpha',
           'lname' => 'required|alpha',
           'email' => 'required|email|unique:books',
           'phone' => 'required|numeric|min:12',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required|alpha',
            'country' => 'required',
            'postcode' => 'required',
            'notes' => 'required',
        ]);
        $book = new Book();

        $book->fname = $request->fname;
        $book->lname = $request->lname;
        $book->email = $request->email;
        $book->phone = $request->phone;
        $book->address1 = $request->address1;
        $book->address2 = $request->address2;
        $book->city = $request->city;
        $book->country = $request->country;
        $book->postcode = $request->postcode;
        $book->notes = $request->notes;
        $book->save();

        $bo = Book::where('email','=',$book->email)->first();

        foreach ($request->file("photo") as $ph){
            $filename = $ph->getClientOriginalName();
            $photos = new Photo();
            $photos->name = $filename;
            $photos->book_id = $bo->id;
            $photos->save();
//        $destinationpath = '/public/uploads'.$destination;
//        $request->move(base_path().$destinationpath,$filename);
            \Intervention\Image\Facades\Image::make($ph)->save(public_path('/uploads/photos/'.$filename),50);

        }

        return redirect('admin/book');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::find($id);
        return view('admin.book.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'fname' => 'required|alpha',
            'lname' => 'required|alpha',
            'email' => 'required|email|unique:books',
            'phone' => 'required|numeric|min:12',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required|alpha',
            'country' => 'required',
            'postcode' => 'required',
            'notes' => 'required',
        ]);
        $book = Book::find($id);

        $book->fname = $request->fname;
        $book->lname = $request->lname;
        $book->email = $request->email;
        $book->phone = $request->phone;
        $book->address1 = $request->address1;
        $book->address2 = $request->address2;
        $book->city = $request->city;
        $book->country = $request->country;
        $book->postcode = $request->postcode;
        $book->notes = $request->notes;
        $book->save();
        return redirect('admin/book');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::find($id);

        foreach ($book->photos as $photo){
            unLink(base_path().'/public/uploads/photos/'.$photo->name);
        }


        $book->delete();
        return redirect('admin/book');
    }
}
