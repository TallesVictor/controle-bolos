<?php

namespace App\Http\Controllers;

use App\Jobs\EmailsNotification as JobsEmailsNotification;
use App\Models\Bolos;
use App\Models\Emails;
use App\Notifications\EmailsNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emails = request()->all();
        $emails['bolo_id'] = $emails['bolo'];
        unset($emails['bolo']);
    
        try {
            $emails = Emails::create($emails);
            $bolos= Bolos::find($emails['bolo_id']);
            if($bolos->quantidade > 0){
                JobsEmailsNotification::dispatch($emails)->delay(now()->addSeconds(5));
            }
        } catch (Exception $ex) {
            return response(500, 'Não foi possível cadastrar o ' . $emails['nome'] . $ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emails  $emails
     * @return \Illuminate\Http\Response
     */
    public function show(Emails $emails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emails  $emails
     * @return \Illuminate\Http\Response
     */
    public function edit(Emails $emails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emails  $emails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emails $emails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emails  $emails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emails $emails)
    {
        //
    }

    public function form(){
        $emails = new Emails(request()->all());
        dd($emails);
        Notification::route('mail', config('mail.from.address'))
        ->notify(new EmailsNotification($emails));
    }
}
