<?php

/**
 * 
 * Please read full (and updated) documentation at: 
 * https://github.com/omegaup/omegaup/wiki/Arena 
 *
 *
 * 
 * POST /contests/:id:/problem/new
 * Si el usuario tiene permisos de juez o admin, crea un nuevo problema para el concurso :id
 *
 * */
require_once("ApiHandler.php");

class Logout extends ApiHandler {
    
    
    protected function ProcessRequest() {
        
        // Only auth_token is needed for logout, which is verified in the authorization process
        return true;
               
    }

    protected function GenerateResponse() {
        
        /*
         * Ok, they sent a valid auth, just erase it from the database.
         * */
        try{
                AuthTokensDAO::delete( $this->auth_token );	

        }catch( Exception $e ){
               die(json_encode( $this->error_dispatcher->invalidDatabaseOperation() ));
        }
       
     
    }

    protected function SendResponse() {
        // There should not be any failing path that gets into here
        
        // Happy ending.        
        die(json_encode(array(
                "status" => "ok"
        )));
    }

}

?>