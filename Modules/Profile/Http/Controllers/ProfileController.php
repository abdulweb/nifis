<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('profile::index',['user'=>Auth()->User()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
   

    /**
     * Show the specified resource.
     * @return Response
     */
    public function setting()
    {
        return view('profile::Forms.profile_setting',['user'=>Auth()->User()]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function userDetail()
    {
        return view('profile::Forms.user_detail');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        switch ($request->submit) {
            case 'new_contact':
                # code...
                break;
            case 'change_profile_image':
                # code...
                break;
            
            case 'new_certificate':
                # code...
                break;
            
            case 'profile_image':
                # code...
                break;
            
            case 'new_experience':
                # code...
                break;
            
            case 'new_skill':
                # code...
                break;
            
            case 'work_history':
                # code...
                break;
            case 'new_business':
                # code...
                break;
            case 'business_address':
                # code...
                break;
            case 'home_address':
                # code...
                break;
            
            case 'new_biography':
               # code...
                break;
            
            default:
                # code...
                break;
        }
    }

    
}
