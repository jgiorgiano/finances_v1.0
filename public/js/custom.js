
/*========================================== ACCOUNT PAGE=================================================== */
$('#btn-newPhone').on('click', function(e){
    e.preventDefault();
    $('#newPhone').slideToggle(700);
})

$('#btn-newAddress').on('click', function(e){
    e.preventDefault();
    $('#newAddress').slideToggle(700);
})

$('#btn-newGroup').on('click', function(e){
    e.preventDefault();
    $('#newGroup').slideToggle(700);
})

$('#btn-newMember').on('click', function(e){
    e.preventDefault();
    $('#newMember').slideToggle(700);
})

/*========================================== CONFIGURACOES GRUPO PAGE=================================================== */
$('#btn-newItem').on('click', function(e){
    e.preventDefault();
    $('#newItem').slideToggle(700);
})

/*========================================== LANCAMENTO PAGE=================================================== */

$('#btnValue').on('click', function(e){
    e.preventDefault();
    var valor = $('#total').val();
    var parcelas = $('#parcelas').val();
    var vencimento = $('#vencimento').val();

    alert('valor' + valor + vencimento + parcelas);
    
})