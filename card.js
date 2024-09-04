
document.addEventListener('DOMContentLoaded', function() {
    const t = getTotal(); 
    document.getElementById("payment").textContent ='Rs: '+String(t);  
});
function getTotal() {
    return localStorage.getItem('total') || 0;
}
