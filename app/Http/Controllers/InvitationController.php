<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;

class InvitationController extends Controller
{
    public function cancelInvitation($user, $group, $invitation_id)
    {
        Invitation::destroy($invitation_id);

        return redirect()->back();

    }
}
