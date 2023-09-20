<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailToFetch;
// use Webklex\LARAVELIMAP\Facades\Client;
// use Webklex\LaravelIMAP\Facades\Client;
use Webklex\IMAP\Facades\Client;


class EmailController extends Controller
{
    //

    public function fetchEmails()
    {
        // Send an email to trigger fetching
        Mail::to('newtestuser@powersporttechnologies.com')->send(new EmailToFetch());

        // Retrieve emails
        $emails = Mail::all();

        return view('emails.index', compact('emails'));
    }

    public function getEmails()
    {
        $mailbox = new Client([
            'host' => env('MAIL_HOST'),
            'port' => env('MAIL_PORT'),
            'encryption' => 'ssl',
            'validate_cert' => true,
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
        ]);
        $client = Client::account('default');
        // Connect to the mailbox
        $client->connect();
        // $mailbox->authenticate();

        // Get the inbox
        $inbox = $mailbox->getFolder('INBOX');

        // Get all unseen emails
        $emails = $inbox->query()->unseen()->get();

        // Process and handle the emails
        foreach ($emails as $email) {
            // Access email properties like $email->getSubject(), $email->getHtmlBody(), etc.
            // Process or store the email as needed

            print_r($email);
        }

        // Disconnect from the mailbox
        $mailbox->disconnect();
    }
}
