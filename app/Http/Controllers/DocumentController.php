<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        return Document::all();
    }

    public function store(Request $request){
             
        $extension = $request->file('file')->extension();
        $size = $request->file('file')->getSize();
        $originalextension = $request->file('file')->getClientOriginalExtension();
        $filename = time().'.'. $request->file('file')->extension();
        $path = $request->file('file')->storeAs(
            'Documents', $filename , 'public'
        );
        $infofile = array(
            'extension'=> $extension,
            'size' => $size
        );
        $doc = Document::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'infofile' => $infofile,
            'path' => $path,
            'owner' => ''
        ]);
        return $doc;

    }

    public function show($id)
    {
        return Document::find($id); 
    }

    public function update(Request $request,$id)
    {
        $doc = Document::find($id);
        $doc->update($request->all());
        return $doc;
    }

    public function destroy(Request $document, $id)
    {
        $doc = Document::find($id);
        Storage::delete($doc->path);
        return Document::destroy($id);
         
    } 

    public function ForImage(Request $request)
    {
        //First store
        //$data = new Document($request->all());
        //$data->save();    
        //return $data;

        //Storage::disk('local')->put('Documents', $request->file); // storage fait parfaitement

        //$name = Storage::disk('local')->put('Documents',$request->file);
        //$isexist = Storage::disk('local')->exists($name);
        //return array([$name,$isexist]);

        //$name = Storage::disk('local')->put('Documents',$request->file);
        //return Storage::download($name);

        //$name = Storage::disk('local')->put('Documents',$request->file);
        //$url = Storage::url($name);
        //$path = Storage::path($name); //path globale pas important (from C:\\)
        //$size = Storage::size($name); // size en bites
        //return $path; 

        //$name = Storage::put('Document',$request->file); // en local
        //return $name;
        
        //$path = $request->file('file')->store('Documents'); // en local
        //return $path;

        //$extension = $request->file('file')->extension();
        //$filename = time().'.'. $request->file('file')->extension();
        //$path = $request->file('file')->storeAs(
        //    'Documents', $filename
        //);
        //return array($path);


        //$extension = $request->file('file')->extension();
        //$filename = time().'.'. $request->file('file')->extension();
        //$path = $request->file('file')->storeAs(
        //    'Documents', $filename , 'public'
        //);        
        //$infofile = array(
        //    'extension'=> $extension,
        //    'size' => 000
        //);
        //$doc = Document::create([
        //    'title' => $request->title,
        //    'desc' => $request->desc,
        //    'infofile' => $infofile,
        //    'path' => $path
        //]);
        //return $doc;

    }

}
