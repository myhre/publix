<?php
session_start();
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs
  ================================================== -->
        <meta charset="utf-8">
        <title>Publix</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Mobile Specific Metas
  ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
  ================================================== -->
        <link rel="stylesheet" href="stylesheets/base.css">
        <link rel="stylesheet" href="stylesheets/skeleton.css">
        <link rel="stylesheet" href="stylesheets/layout.css">

        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

        <!-- Vaare includes
        ================================================== -->

        <script type="text/javascript" src="javascripts/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="javascripts/scripts.js"></script>
        <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
        

    </head>
    <body>

        <!-- Primary Page Layout
        ================================================== -->


        <div class="container">

            <input type="hidden" id="session" value="<?php if (isset($_SESSION['brukernavn']))
    echo $_SESSION['brukernavn']; ?>" />
            <div class="sixteen columns top">
                <h1 id="header">Publix</h1>

                <h5 id="underheader">Et publiseringssystem</h5>
                
            </div>

            <div class="sixteen columns meny">
                <ul>
                    <li><a href="#" id="hjem">Hjem</a></li>
                    <li><a href="#" id="omoss">Om oss</a></li>
                    <li><a href="#" id="hjelp">Hjelp</a></li>
                    <li><a href="#" id="nyside">Opprett side</a></li>
                    <li><a href="#" id="visdinesider">Dine sider</a></li>
                    <li><a href="#" id="fil">Last opp filer</a></li>
                </ul>
                <hr />
            </div>

            <div class="three columns">
                <h5>Brukere/brukersider</h5>
                <hr />


                <div id="brukerliste"></div>

            </div>

            <div class="thirteen columns hoved">

                <div id="innhold">
                
            </div>
            </div>
            <hr />
            <!-- Footer
                    ================================================== -->
            <div class="sixteen columns" id="footer">
                <div class="bruker" id="forms">

                    <input type="button" id="logginnbtn" value="Vis/skjul Innlogging"/>
                    <input type="button" id="registrerbtn" value="Registrer bruker"/>


                    <form id="logginnfelt">
                        Brukernavn:
                        <input id="brukernavn" type="text" name="brukernavn"/>  

                        Passord:
                        <input id="passord" type="password" name="passord"/>
                        <button id="loginn" type="submit" name="logginn" value="Logg inn">Logg inn</button>

                    </form>
                    <form id="registrerfelt">
                        Brukernavn: <input id="bnavn" type="text" name="bnavn" autofocus="autofocus"/>
                        Passord: <input id="pord" type="password" name="pord"/>
                        Fornavn: <input id="fornavn" type="text" name="fornavn"/>
                        Etternavn: <input id="etternavn" type="text" name="etternavn"/>
                        E-mail: <input id="mail" type="email" name="mail"/>
                        Telefon: <input id="telefon" type="text" maxlength="8" name="telefon"/>
                        <button type="submit" name="registrer" value="Registrer bruker">Registrer deg</button>
                    </form>
                    
                    <p id="add_err"></p>
                </div>
                <div id="creds">
                    <h5>Publix</h5>
                    <p>Du er n&aring; inne p&aring; publix sine sider. Her kan du opprette egne brukersider enten til privat bruk, eller for &aring; markedsf&oslash;re bedriften din</p>
                </div>
                <div id="mercreds">
                    <h5>Laget av:</h5>
                    Marius Bergheim<br />
                    Anders Flisvang Nyen<br />
                    Morten Grina Myhre<br />
                    Tron L&oslash;v&aring;s
                </div>
            </div>

            <!-- Footer slutt
                    ================================================== -->
        </div><!-- container -->



        <!-- JS
        ================================================== -->
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="javascripts/tabs.js"></script>

        <!-- End Document
        ================================================== -->
    </body>
</html>