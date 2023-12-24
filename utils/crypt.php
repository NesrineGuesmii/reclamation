<?php

    require "key_gen.php";

    $key_simple = getKey(20); // its necessary to reset nesrine (safiatou)
    
    $key = "";

    if (!isset($_SESSION['encryption']['key'])) {
        $key = getKey(20);
        $_SESSION['encryption']['key'] = $key;
    } else  {
        $key = $_SESSION['encryption']['key'];
    }

    // $key_admin = "our-key-admin-to-encrypte"; // its necessary to reset nesrine (safiatou)
    $cipher = "aes-256-cbc"; //  powerfull algorithm currently

    if (isset($_SESSION['encryption']['iv'])) {
        $iv = $_SESSION['encryption']['iv'];
    } else {
        $iv = openssl_random_pseudo_bytes(16);
    }

    $plaintext = "mon safiatou";   


    function make_encryption($type, $role, $data) {
        global $key;        

        if ($type === "en") {
            return get_encrypted_data($key, $data);
        } 
        return get_decrypted_data($key, $data);
    }

    function get_encrypted_data($key, $data) {
        global $cipher, $iv;
        
        $ciphertext = openssl_encrypt($data, $cipher, $key, $options=0, $iv);
        
        return $ciphertext;
    }


    function get_decrypted_data($key, $data_encrypted) {
        global $cipher, $iv;
        $original_plaintext = openssl_decrypt($data_encrypted, $cipher, $key, $options=0, $iv);
        // unset($_SESSION['encryption']['iv']); 
        return $original_plaintext;
    }

