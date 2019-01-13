<div>

    Hi, 
    
    You have been invited by {{ $data['host']}} 
    to join the group {{ $data['group'] }} in the Finance Manager App.
    <br>

   
    <a href=" {{ 'http://127.0.0.1:8000/account/' .
     $data['invite']->email  . '/create/' . $data['invite']->token }}" > 
     click here to create your account
     </a>
    <br>


</div>