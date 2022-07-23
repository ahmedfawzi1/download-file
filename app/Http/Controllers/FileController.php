<?php

namespace App\Http\Controllers;

use App\file;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = file::all();
        return view("files.index")->with("files",$files);
    }


    public function create()
    {
        return view("files.create");
    }


    public function store(Request $request)
    {
       $fileds = $request->validate([
           "title" => "required|min:3",
           "description" => "required|min:5",
           "fileInput" => "required|max:3072|mimes:png,jpg"
       ]);
       $file = new File;
       $file->title = $request->title;
       $file->description = $request->description;
       //file code
       $allFileData = $request->file("fileInput");
       $file_name = $allFileData->getClientOriginalname();
       $allFileData->move(public_path() . "/files/", $file_name);

       $file->file = $file_name;
       $file->save();
       return redirect()->back()->with("done", "Uploaded File Done");
    }


    public function show($id)
    {
        $file = file::find($id);
        return view("files.show")->with("files",$file);
    }


    public function edit($id)
    {
        $file = file::find($id);
        return view("files.show")->with("files",$file);
    }


    public function update(Request $request,$id)
    {
        $fileds = $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:5",
            "fileInput" => "required|max:3072|mimes:png,jpg"
        ]);
        $file = file::find($id);
        $file->title = $request->title;
        $file->description = $request->description;
        //file code
        $allFileData = $request->file("fileInput");
        $file_name = $allFileData->getClientOriginalname();
        $allFileData->move(public_path() . "/files/", $file_name);

        $file->file = $file_name;
        $file->save();
        return redirect("/allfiles")->with("done", "Updated File Done");
    }


    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete($id);
        return redirect("/allfiles")->with("done", "Deleted File Done");
    }

    public function download($id)
    {
        $file = File::where("id", "=", $id)->firstOrFail();
        $filePath = public_path() . "/files/" . $file->file;
        return response()->download($filePath);
    }
}
