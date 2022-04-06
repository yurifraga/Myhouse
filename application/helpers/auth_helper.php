<?php

function permission(){
    $ci = get_instance();
    $usuariLogado = $ci->session->userdata("Login_efetuado");
    if(!$usuariLogado){
        $ci->session->set_flashdata("danger", "Necessário fazer login");
        redirect("login");
    }
    return $usuariLogado;
}