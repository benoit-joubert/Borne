<?php
    $GENERAL_URL = (SERVEUR_PROD == 'SARRAKIS2' ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . '/borne';
    $GENERAL_PATH   = $_SERVER['DOCUMENT_ROOT'] .'/borne';
    // Construit les variables _PATH et _URL du projet
    genereVarPathUrlForProjet($GENERAL_PATH, $GENERAL_URL);
    
    // Pour les stats (uniquement en production)
    $PROJET_ID =  243;
    
    $FLECHE_RIGHT   = '<font class=s><b>'.htmlentitiesIso('»').'</b>&nbsp;</font>';
    $FLECHE_RIGHT_B = '<font class=r><b>'.htmlentitiesIso('»').'</b>&nbsp;</font>';
    $PLUS           = '<font class=s><b>+</b>&nbsp;</font>';
    $FLECHE_HAUT    = '<font class=s><b>^</b>&nbsp;</font>';

    /* Configuration pour des alertes en cas d'erreur en prod */
    
    define('ALERT_EMAIL', 'adinanid@mairie-aixenprovence.fr'); // Adresse Email du dev
    define('PROJET_CLE_LDAP', 'NO_KEY');
    define('PROJET_NAME', 'borne'); // Nom du projet
    define('PROJET_AFF_NOM', 'ARRP');
    define('PROJET_AFF_VERSION', '1.0');
    define('PROJET_TITRE', 'ARRP');
    define('PROJET_AFF_CONTACT_EMAIL', ALERT_EMAIL);
    define('PROJET_AFF_CONTACT_TEL', '94.98');
    define('DUREE_TOKEN',21600); // 6heure

    $NB_ONGLET_MAX = 10;
    $TYPE_DOC_AUTORISE = array('.pdf','.gif','.jpg','.jpeg','.tiff','.png','.bmp','.doc','.xls','.odt','.ods','.axx','.docx','.xlsx');
    $FILE_MAX_SIZE = 20480; //20M
    $FILE_ICONE_MAX_SIZE = 512; //512Ko
    $TAB_MOIS   = array(
                            '01'    =>  'Janvier',
                            '02'    =>  'Février',
                            '03'    =>  'Mars',
                            '04'    =>  'Avril',
                            '05'    =>  'Mai',
                            '06'    =>  'Juin',
                            '07'    =>  'Juillet',
                            '08'    =>  'Août',
                            '09'    =>  'Septembre',
                            '10'    =>  'Octobre',
                            '11'    =>  'Novembre',
                            '12'    =>  'Décembre',
                        );
    /* Fin de configuration des alertes en cas d'erreur en prod */

    // Définition des fichiers javascript à inclure
    $JAVASCRIPTS = array(
                            $GENERAL_URL.'/javascript/fonctions.js',
                            $GENERAL_URL.'/javascript/autocomplete.js',
                            
                            $GENERAL_URL.'/javascript/jquery/jquery.min.js',
                            $GENERAL_URL.'/javascript/jquery/jquery-ui.js',
                            $GENERAL_URL.'/javascript/autocomplete.js',
                            $GENERAL_URL.'/javascript/jquery.form.min.js',
                            $GENERAL_URL.'/javascript/jquery.dataTables.min.js',
                            //$GENERAL_URL.'/javascript/DataTables-1.10.11/jquery.dataTables.min.js',
                            $GENERAL_URL.'/javascript/datetimepicker/jquery.datetimepicker.js',
                            $GENERAL_URL.'/javascript/bootstrap/js/bootstrap.min.js',
                            $GENERAL_URL.'/javascript/select2/select2.min.js',
                        );

    $CSS_TO_LOAD = array(
                            $GENERAL_URL.'/css/jquery.dataTables.min.css',
                            //$GENERAL_URL.'/librairie/bootstrap-3/css/bootstrap.min.css',
                            $GENERAL_URL.'/css/bootstrap.css',
                            $GENERAL_URL.'/css/bootstrap-responsive.css',
                            $GENERAL_URL.'/javascript/datetimepicker/jquery.datetimepicker.css',
                            $GENERAL_URL.'/javascript/jquery/jquery-ui.min.css',
                            $GENERAL_URL.'/javascript/jquery/jquery-ui.structure.min.css',
                            $GENERAL_URL.'/javascript/jquery/jquery-ui.theme.min.css',

                            $GENERAL_URL.'/javascript/select2/select2.css',
                            $GENERAL_URL.'/style.css',
                        );
                        
    // Définition des pages (module, titre...)
    $PAGES  =   array(
                        '0'     =>array(
                                        'MODULE' => 'accueil',
                                        'TITRE' => 'Accueil Gestion des ARRP',
                                        'DESCRIPTION' => 'Bienvenue sur la gestion des ARRP',
                                        'IMAGE' => 'default.gif',
                                        //'IMAGE_WIDTH' => '150',
                                        'SECURE_ACCESS' => 1,
                                        ),
                    );
    // Echapement des caractères spéciaux
    if ( get_magic_quotes_gpc() )
    {
        $_GET       = array_map('supprimeSlash', $_GET);     //array_map applique une fonction (ici stripslashes) sur tous les éléments de ce tableau 
        $_POST      = array_map('supprimeSlash', $_POST);    //et renvoie le tableau modifié
    }
?>