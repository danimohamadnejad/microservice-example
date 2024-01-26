<?php
function soa_user_config($key){
    return config("soa-user.${key}");
}
function soa_user_db_connection($get_actual_data = false){
   if($get_actual_data){
    return soa_user_config("database.connections.".soa_user_config("database.default-connection"));
   } 
   return soa_user_config("database.default-connection");
}