<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminsController extends Controller
{
    protected $mailer;
    protected $toEmail = "";

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index(Request $request)
    {
        return view('admin.testimonial.index');
    }

    public function testimonial(Request $request) {

        $request->validate([
            'messageContent' => 'required'
        ]);

        if(!file_exists($request->file('fileAttachment'))) {
            return redirect()->back()->with("failure", "Not selected file.");
        }

        $realFile = $request->file('fileAttachment');
        $destinationPath = 'attachment';
        $fileName = $realFile->getClientOriginalName();
        $filemime = $realFile->getMimeType();
        $realFile->move($destinationPath,$fileName);
        $filePath = $destinationPath . '/' . $fileName;

        $auth = Auth::user();

        $data = array(
            'email'=> $auth->email,
            'mime' => $filemime,
            'as' => $fileName,
            'path' => $filePath
        );

        Mail::send('emails.lead', ['code' => $request->messageContent, 'title' => 'Message'], function ($message) use($data){
            $message->from($data['email']);
            $message->to('selectivetrades1@gmail.com')->subject("Selective Trades");

            $message->attach($data['path'], array(
                    'as' => $data['as'],
                    'mime' => $data['mime'])
            );
        });

        return redirect()->back()->with("success", "Sent message and File successfully.");

    }
}
