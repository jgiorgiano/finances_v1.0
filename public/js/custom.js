
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
    $('#parcelamento').empty();
    var valor = $('#total').val();
    var parcelas = $('#parcelas').val();
    var vencimento = $('#vencimento').val();
    var nDoc = $('#nDoc').val();

    function addMonth(date){
        var vencto = new Date(date);
       
        vencto.setDate(vencto.getDate() + 30);
        console.log(vencto);
        return vencto;
    }
    
    

    var i;

    for(i = parcelas; i >= 1; i--)
    {
        var valorParcela = valor/parcelas;
        var vencimentoParcela = vencimento;  
        var nnDoc = nDoc + '/' + i;   

        $('#parcelamento').prepend('<div class="form-row p-2" id="line"></div>');
        $("#line").append('<div class="col-md-3 py-1" id="valuer"></div>');
        $('#valuer').append('<input type="text" class="form-control" id="total" name="parcela['+ i +'][valor]" value=' + valorParcela + '></input>')
        $("#line").append('<div class="col-md-3 py-1" id="vencto"></div>')
        $('#vencto').append('<input type="date" class="form-control" id="total" name="parcela['+ i +'][vencimento]" value='+vencimentoParcela+'></input>')
        $("#line").append('<div class="col-md-2 py-1" id="parcel" ></div>')
        $('#parcel').append('<input type="text" class="form-control" id="total" name="parcela['+ i +'][numero]" value=' + nnDoc +'></input>')
        $("#line").append('<div class="col-md-3 py-1" id="obs" ></div>')
        $('#obs').append('<input type="text" class="form-control" id="observacao" name="parcela['+ i +'][observacao]" placeholder="Obs." ></input>')
    }
    
})
/*========================================== Editar parcela PAGE=================================================== */

    $('.deleteParcela').on('click', function(e){
        e.preventDefault;
        var id = $(this).data('id');
        var account = $(this).data('account');
        var group = $(this).data('group'); 
        var token = $(this).data('token');       
      
        $.ajax({
            type: "DELETE",
            url: '/account/' + account + '/group/' + group + '/parcelamento/' + id,
            data: {_method: 'delete', _token :token},
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log('Error:', data);
            } 
        });

    })





/*========================================== Quitacão PAGE=================================================== */

var i = 0;
    $('#btnNewPgto').on('click', function(e){
        e.preventDefault();
        var pgto = $('#pgto0').clone().insertAfter('#pgto' + i);
        i++; 
        pgto.removeAttr('id');
        pgto.attr('id', 'pgto' + i );
        pgto.find('.valor').val('').attr('name', 'pgto[' + i + '][valor]'); 
        pgto.find('.contaCorrente').attr('name', 'pgto[' + i + '][contaCorrente]');
        pgto.find('.formaPagamento').attr('name', 'pgto[' + i + '][formaPagamento]');
       
       
    });

    $('.valores').on('change', function(e){
        var sum = 0;
        $('.valor').each(function(){
            sum += parseFloat(this.value);            
            $('#total').text('Total Inserido: R$ ' + sum);            
    });

})

