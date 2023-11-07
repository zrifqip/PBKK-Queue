<?php

namespace App\Http\Controllers;

use App\Jobs\TestSendEmail;
use Illuminate\Http\Request;


class TestQueueEmails extends Controller
{
    /**
     * test email queues
     **/
    public function index()
    {
        return view('mail.test-emails');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        dispatch(new TestSendEmail($data));
        return redirect()->route('send-email')->with('status', 'Email berhasil dikirim');
    }

}
