<?php
// Set icon (textbox) berdasarkan hasil validasi.
function set_validation_icon($nama_field)
{
    // cek $_POST ???
    if ($_POST) {
        if (form_error($nama_field)) {
            echo '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
        } else {
            echo '<span class="glyphicon glyphicon-ok form-control-feedback"></span>';
        }
    }
}

// Set style (textbox) berdasarkan hasil validasi.
// Mendukung untuk group input, lihat pada nilai.
function set_validation_style($field)
{
    if ($_POST) {
        // Apakah nama_field = array
        if (is_array($field)) {
            $last_status = false;
            for ($i = 0; $i < count($field); $i++) {
                if (form_error($field[$i]) || $last_status) {
                    $last_status = true; // ya, ada error
                } else {
                    $last_status = false; // no, tidak ada error
                }
            }

            if ($last_status) {
                echo 'has-error';
            } else {
                echo 'has-success';
            }

            // Bukan array
        } else {
            if (form_error($field)) {
                echo 'has-error';
            } else {
                echo 'has-success';
            }
        }
    }
}