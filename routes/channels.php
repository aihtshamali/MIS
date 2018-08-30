<?php
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('chats.{id}', function ($user, $id) {

       // return (int) $user->id === (int) $id;
       return true;
});
Broadcast::channel('problematicremarks.{id}', function ($user, $id) {

       // return (int) $user->id === (int) $id;
       return true;
});
Broadcast::channel('projectAssigned.{id}', function ($user, $id) {
      // $pro=\App\AssignedProjectTeam::where('user_id',$user->id)->latest();
      if($user->id ==  $id){
          return true;
     }
     else if($user->isManager())
        return true;
      return false;
});
Broadcast::channel('projectAssignedManager.{id}', function ($user, $id) {
      // $pro=\App\AssignedProjectTeam::where('user_id',$user->id)->latest();
      if($user->id ==  $id){
          return true;
     }
     else if($user->isManager())
        return true;
      return false;
});

Broadcast::channel('projects.{id}', function ($user, $id) {
    if($user->isManager())
        return true;
      return false;
});
Broadcast::channel('manager', function ($user, $id) {
    // if($user->isManager())
       return true;
     // return false;
});
// Broadcast::channel('conversations.{id}', function ($user, $id) {
//     // return (int) $user->id === (int) $id;
//     return true;
// });
