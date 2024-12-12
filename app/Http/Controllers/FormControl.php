<?php

namespace App\Http\Controllers;
use Illuminate\Console\View\Components\Confirm;
use Validator;
use Log;
use Storage;
use Illuminate\Http\Request;

class FormControl extends Controller
{
    public function showForm()
    {
        return view('form');
    }


    public function submitForm(Request $request)
    {   

        Log::info($request->all());
        $validator = Validator::make(data:[$request->all()],  rules:[
            'topic' => 'string|max:100',
            'email' => 'email',
            'message' => 'string|max:500',
       


        ]
             );

        if ($validator->fails()) {
            return redirect()->route('form.show')
                ->withErrors($validator)
                ->withInput();
        
            }
    
        $data = $request->only([ 'email', 'topic','message']);
        $data['timestamp'] = now();
   
        $fileName = uniqid() . '.json';
        Storage::disk('local')->put('form_data/' . $fileName, json_encode($data));

        return redirect()->route('form.show')->withSuccess('IT WORKS!');
    }

    public function showData()
    {
        $files = Storage::disk('local')->files('form_data');
        $dataList = [];

        foreach ($files as $file) {
            $content = json_decode(Storage::get($file), true);
            $dataList[] = $content;
        }

        return view('data', ['dataList' => $dataList]);
    } 
}

