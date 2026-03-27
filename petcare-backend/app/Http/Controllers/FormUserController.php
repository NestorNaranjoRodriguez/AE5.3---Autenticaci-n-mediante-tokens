<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class FormUserController extends Controller
{
    // Protege las rutas en routes/web.php (no llamar middleware() en el constructor)
    public function showPetForm()
    {
        return view('form_pet');
    }

    public function storePet(Request $request)
    {
        $request->validate(['name'=>'required|string|max:255','email'=>'nullable|email']);
        Registro::create(['nombre'=>$request->name,'email'=>$request->email,'password'=>null]);
        return redirect()->route('form_pet')->with('success','Mascota registrada correctamente.');
    }

    public function showContactForm()
    {
        return view('form_contact');
    }

    public function storeContact(Request $request)
    {
        $request->validate(['email'=>'required|email','message'=>'required|string']);
        Registro::create(['nombre'=>$request->email,'email'=>$request->email,'password'=>null]);
        return redirect()->route('form_contact')->with('success','Mensaje enviado.');
    }
}