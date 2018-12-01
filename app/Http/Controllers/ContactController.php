<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contacts;

    public function __construct(ContactRepository $contacts)
    {
        $this->middleware('auth');
        $this->contacts = $contacts;
    }

    public function index(Request $request){
        $ctos = $this->contacts->forUser($request->user());
        return view('contacts.index', [
           'contacts' => $ctos,
        ]);
    }

    public function create(Request $request){
       $this->validate($request, [
          'name' => 'required|max:255',
          'email' => 'required|max:255',
          'phone' => 'required|max:30',
       ]);

       $request->user()->contacts()->create([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
       ]);

       return redirect('/contacts');
    }

    public function destroy(Request $request, Contact $contact){
        $this->authorize('destroy', $contact);
        $contact->delete();
        return redirect('/contacts');

    }
}
