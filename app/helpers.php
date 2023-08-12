<?php

if (!function_exists('flash_toast')) {
    function flash_toast($type, $message)
    {
        return "
            <script>
                Swal.fire({
                    icon: '{$type}',
                    text: '{$message}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            </script>
        ";
    }
}