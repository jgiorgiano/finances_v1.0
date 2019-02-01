<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\groupService;  
use App\Http\Requests\groupRequest;

class GroupController extends Controller
{

    public function __construct(groupService $service)
    {
        $this->service = $service;

    }
    

    public function invite(Request $request, $user_id, $group_id){

        $validated = $request->validate([
            'email' => 'required|email',
        ]);
      
        $this->service->invite($validated['email'], $user_id, $group_id);

        return redirect()->back();


    }

    public function joinGroup($user_id, $group_id)
    {
        
        $this->service->joinGroup($user_id, $group_id);

        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(groupRequest $request, $user_id)
    {

        $this->service->store($request->validated(), $user_id);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $groupId)
    {
        $data = $this->service->show($groupId);
        
       
        return view('group.show', [
            'title'     => 'Gerenciar Grupo: '.$data['group']->nome . '.',
            'group'     => $data['group'],
            'members'   => $data['members'],
            'invitations' => $data['invitations']
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(groupRequest $request, $user_id,  $group_id)
    {
    
        $data = $this->service->update($request->validated(), $user_id, $group_id);

        return redirect()->back();

    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $group_id)
    {
        $this->service->delete($user_id, $group_id);

        return redirect('home');
    }
    

    public function leaveGroup($user_id, $group_id)    {
     
        $this->service->deleteMember($user_id, $group_id);

        return redirect()->back();

    }

    public function deleteMember($member_id, $group_id)
    {
        $this->service->deleteMember($member_id, $group_id);

        return redirect()->back();
    }



}
