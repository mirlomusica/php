<?php

    $football_sports_club_theme_css= "";

    /*--------------------------- Preloader color -------------------*/
    $football_sports_club_preloader2_dot_color = get_theme_mod( 'football_sports_club_preloader2_dot_color');
    if( $football_sports_club_preloader2_dot_color != '') {
        $football_sports_club_theme_css .='.load hr {';
            $football_sports_club_theme_css .='background-color: '. $football_sports_club_preloader2_dot_color. ';';
        $football_sports_club_theme_css .='}';
    }