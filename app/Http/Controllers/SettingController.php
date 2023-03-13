<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
	public function settings()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('control.settings.index')
        ->with('users', $users);
    }

    public function usermasterList()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('control.settings.usermasterList')
        ->with('users', $users);
    }

    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'type' => 'required',
                'campus' => 'required',
                'department' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);

        if($validator -> fails())
        {
            return Redirect::route('settings')->withErrors($validator)->with('fail', 'Error in saving applicant data. Please check the inputs!');
        }
        else
        {
            $user = new User();                 
                    $user->campus = $request->input('campus');
                    $user->dept = $request->input('department');
                    $user->fname= $request->input('firstname');
                    $user->lname = $request->input('lastname');
                    $user->mname = $request->input('middlename');
                    $user->ext = $request->input('ext');
                    $user->email = $request->input('email');
                    $user->isAdmin = $request->input('type');
                    $user->password = Hash::make($request->input('password'));

            if ($user->save())
            {
                return Redirect::route('settings')->with('success','User account has been saved');
            }
            else
            {
                return Redirect::route('settings')->with('fail', 'Error in creating user account');
            }
        }
    }
    public function account_edit($id)
    {
        $user = User::find($id);
        $users = User::orderBy('id', 'desc')->get();
        return view('control.settings.edit')->with('user', $user)->with('users', $users);
    }
    public function account_update(Request $request, $id)
    {
        $data = request()->all();
        $user = User::findOrFail($id);
        $user->campus = $request->input('campus');
        $user->dept = $request->input('department');
        $user->fname= $request->input('firstname');
        $user->lname = $request->input('lastname');
        $user->mname = $request->input('middlename');
        $user->ext = $request->input('ext');
        $user->email = $request->input('email');
        $user->isAdmin = $request->input('type');
        $user->update($data);

        return Redirect::route('account_edit', $id)->with('success','Account data has been updated');
    }
    public function account_delete($id)
    {
        $user = User::find($id);

        if ($user == null)
        {
            return Redirect::route('settings')->with('fail', 'Account does not exist.');
        }

        if ($user->delete())
        {
            return Redirect::route('settings')->with('success', 'Account was successfully deleted.');
        }
        else
        {
            return Redirect::route('settings')->with('fail', 'An error was occured while deleting the account.');
        }
    }
    public function changepass($id)
    {
        $user = User::find($id);
        $users = User::orderBy('id', 'desc')->get();
        return view('control.settings.changepass')->with('user', $user)->with('users', $users);
    }
    public function changepassUpdate(Request $request, $id)
    {
    
    $validator = Validator::make($request->all(), [
                'password' => 'required|min:6',
                'confirmation' => 'required|same:password'
                ]);

    if($validator->passes())
    {
        $user = User::findOrFail($id);

        $user->password = Hash::make($request->input('password'));
        $user->update();
        return Redirect::route('changepass',$user->id)->with('success','Password has been changed');
    }
            return Redirect()->back()->with('fail', 'Something is wrong in your inputs. Please check!')->withErrors($validator);
    }
}
