<?php
namespace App\LaraFacades;

class LaraFacades
{
    public function checkForVotingAccess($age)
    {
        //check condition whether age is greater than 18 or not.
        if($age >= 18){
            $message = "You may proceed to vote.";
            $status = "success";
        }else{
            $message = "Sorry! You are not able proceed.";
            $status = "failure";
        }
        $return['message'] = $message;
        $return['status'] = $status;
        return $return;
    }
}
