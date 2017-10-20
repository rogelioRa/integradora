'use strict'

var displayed = false;
var previewed = false;

function displayConf(){
  $(`${(displayed) ? '.admin-section' : '.section-table'}`).hide('slow');
  $(`${(displayed) ? '.section-table' : '.admin-section'}`).show('slow');
  displayed = (displayed) ? false : true;
}

function displayPreview(){
  $(`${(previewed) ? '.section-preview' : '.admin-section'}`).hide('slow');
  $(`${(previewed) ? '.admin-section' : '.section-preview'}`).show('slow');
  previewed = (previewed) ? false : true;
}

$(".conf-display").on('click', displayConf);
$(".btn-preview").on('click', displayPreview);
