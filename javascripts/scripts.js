$(document).ready(function () {
    //Loader alle funksjoner etter DOMen er erdig lastet
    $("#innhold").load('info.html #hjem');
    visLogginn();
    omoss();
    registrer();
    logginn();
    loggut();
    rediger();
    nyside();
    opprettside();
    sjekkLogginn();
    visbrukersider();
    brukerliste();
    displaybrukerside();
    dinesider();
    lagelement();
    lastOpp();
    nyttElement();
});
    

//Ser etter om brueren allerede er logget inn ved å se om Session variabelen 'brukernavn' er satt
function sjekkLogginn() { 
    var ssn = $("#session").val();
    if(ssn != "")
    {
        $(".bruker").load('bruker.php');
        return true;
    }else{ 
        $("#logginnbtn").show();
        $("#registrerbtn").show();
        return false; 
    } 
}

    
//Endrer innholdet på siden
function omoss(){
    
    $("#omoss, #hjem, #hjelp").on("click", function(){ 
        //If-test som sjekker hvilken link som er trykket på
        if (this.id == 'hjem'){
            $("#header").html("Publix");
            $("#underheader").show();
            $("#innhold").load('info.html #hjem'); 
        }
        else if (this.id == 'omoss'){
            $("#header").html("Publix");
            $("#underheader").show();
            //Ved hjelp av .load kan man også bruker en selector etter definert dokument. eks: 'omoss.html p' loader kun p-tags i omoss.html
            $("#innhold").load('info.html #omoss'); 
        }
        else if (this.id == 'hjelp'){
            $("#header").html("Publix");
            $("#underheader").show();
            $("#innhold").load('info.html #hjelp'); 
        }
    });
        
}
//Toggler synligheten på logg inn-, registrerings- og redigerformen
function visLogginn() {
    $("#logginnbtn, #registrerbtn,#redigerbtn").live("click", function() {
        if (this.id == 'logginnbtn'){
            $("#registrerfelt").hide();
            $("#logginnfelt").slideToggle();
        }
        else if (this.id == 'registrerbtn'){
            $("#logginnfelt").hide();
            $("#registrerfelt").slideToggle();
        }
        else if (this.id == 'redigerbtn'){
            $("#innhold").load('endreprofil.php');
        }
    });
}

function logginn() { //Funksjonen for å logge inn via ajax
    
    $('#logginnfelt').live("submit",function() {
         
        var postTo = 'logginn.php';

        $.post(postTo,$('#logginnfelt').serialize(), function(data) {
            if(data == 'ok') {
                $(".bruker").load('bruker.php');
                dinesider();
                brukerliste();
                
            }
            else
                $("#add_err").html("Feil brukernavn eller passord.")
            $("#logginnfelt").hide();
        });
        return false;
    });
    
}

function registrer() { //Funksjonen for å registrere bruker via ajax
    
    $('#registrerfelt').live("submit", function() {
         
        var postTo = 'registrer.php';

        $.post(postTo,$('#registrerfelt').serialize(), function(data) {
            if (data == 'ok')
                $("#add_err").html("Gratulerer "+$("#bnavn").val()+"! Du er herved registrert hos oss");
            else if(data == 'tomt'){
                $("#add_err").html("Du m&aring; fylle ut alle feltene.") //Feilen kan være duplikat brukernavn eller tomme felter
            }
            else if(data == 'feil'){
                $("#add_err").html("Brukernavnet er allerede i bruk.")
            }
            $("#registrerfelt").hide();
        });
        return false;
    });
    
}

function rediger() { //Funksjonen for å redigere bruker via ajax
    
    $('#redigerfelt').live("submit", function() {
        var postTo = 'endre_action.php';

        $.post(postTo,$('#redigerfelt').serialize(), function(data) {
            if (data == 'ok')
                $("#innhold").html("<p>Din bruker er n&aring; oppdatert.</p>");
            else
                $("#innhold").html("<p>Det oppsto en feil under oppdateringen av profilen.</p>")
        });
        return false;
    });
    
}

function loggut() {
    $("#loggutbtn").live("click", function() {
        $.get('loggut.php');
        $(".bruker").load('index.php .bruker');
        $("#logginnbtn").show();
        $("#registrerbtn").show();
        $("#logginnfelt").hide();
        $("#registrerfelt").hide();
        $("#brukerliste").load('brukerliste.php');
        $("#innhold").load('info.html #hjem');
        $("#header").html('Publix');
        $("#underheader").html('Et publiseringssystem');
    });
}

function nyside() { //Loader formen for å opprette ny side
    $("#nyside").live("click", function(){
        $("#innhold").load('nyside_form.php');
    });
}

function opprettside(){             //Sender formen til opprettside.php
   
    $("#lagsidefelt").live("submit",function(){
      
        $.post('opprettside.php', $("#lagsidefelt").serialize(), function(data){
            if(data == 'ok'){
                $("#innhold").html('Siden er n&aring; opprettet.');
                $("#header").html('Publix');
        $("#underheader").html('Et publiseringssystem');
            }
        }); 
        return false;
    });
}

function brukerliste(){
    $("#brukerliste").load('brukerliste.php');
    return false;
}

function visbrukersider(){
    $(".brukere").live("click", function(){
        var e = $(this).text(); //Henter inn teksten i linken man trykker på, slik at kun den toggles
        $('#'+e).toggle();
    });
    return false;
}

function displaybrukerside() {                  //Henter frem en valgt brukerside.
     $(".sider").live("click", function(){
        $("#header").html($(this).text());            //Endrer header.
        $("#underheader").hide();
        $("#innhold").load('displaybrukerside.php', {sidenavn: $(this).text()})
    });
}

function dinesider(){                           //Laster inn sidene til innlogget bruker.
    $("#visdinesider").live("click",function(){
        $("#innhold").load('dinesiderliste.php');
        $("#header").html('Publix');
        $("#underheader").html('Et publiseringssystem');
    });
    return false;
}

function lagelement(){                          //Henter formen som oppretter et element
    $('.addElement').live("click",function(){
    
        var sidenavn = this.id;
        $('#innhold').load('nyttelement_form.php', {eside : sidenavn}); //Sender med sidenavnet til php-dokumentet, slik at elementet blir lagt under riktig side
        
    });

}

function nyttElement(){                         //Oppretter et element når formen blir submitted.
    $('#lagelementfelt').live("submit",function(){
        
            var postTo = 'opprettelement.php';
            
            $.post(postTo,$("#lagelementfelt").serialize(), function(data) {
                if (data == 'ok'){
                    $("#innhold").html("Elementet ble lagt til din side.");
                }
            });
            return false;
        });
}


function lastOpp(){
    $('#fil').live("click", function(){
        $('#innhold').load('fileLibrary/pages/files.php');
        $("#header").html('Publix');
        $("#underheader").html('Et publiseringssystem');
    });
}

