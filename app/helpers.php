<?php
function renderEpisode($episode){
    return substr($episode, strrpos($episode, '/') + 1);
}
function renderNav($prev,$next){
    $nav = "";
    if ($prev != ""):
         $num = substr($prev, strrpos($prev, '/') + 1);
         $nav .= '<button><a href="'.$num.'">Prev</a></button>';
    endif;
    if ($next != ""):
        $num = substr($next, strrpos($next, '/') + 1);
        $nav .= '<button><a href="'.$num.'">Next</a></button>';
    endif;
    return "<div class='nav-wrap'>" . $nav . '</div>';
}