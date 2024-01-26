<?php
function soa_post_config($key){
    return config("soa-post.${key}");
}
function soa_post_db_connection($get_actual_data = false){
   if($get_actual_data){
    return soa_post_config("database.connections.".soa_post_config("database.default-connection"));
   } 
   return soa_post_config("database.default-connection");
}