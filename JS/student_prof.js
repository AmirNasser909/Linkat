$(function() 
{            
var cnt = 75000000;            
var count = setInterval(function() 
{                
if (cnt > 0) 
{                    
$('#target').html("<span>KSHS</span><strong>" + cnt + " Target </strong>");                    
cnt--;                
}                
else 
{                    
clearInterval(count);                    
$('#target').html("<strong> Target Achieved! </strong>");                
}            
}, 4000);        
});