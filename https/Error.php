<?php

 class ErrorRepport{
    public function ErrorLog($error){
        $logFile = fopen("../SERVER/log.txt", "w");
        $data = $error;
        
    }
 }