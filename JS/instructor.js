/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
$('#myModal2').on('show', function() {
  	$('#myModal').css('opacity', .5);
  	$('#myModal').unbind();
});
$('#myModal2').on('hidden', function() {
  	$('#myModal').css('opacity', 1);
  	$('#myModal').removeData("modal").modal({});
});

});



