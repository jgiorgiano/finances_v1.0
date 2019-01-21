
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

        $('#parcelamento').prepend('<div class="form-row" id="line"></div>');
        $("#line").append('<div class="col-md-4" id="valuer"></div>');
        $('#valuer').append('<input type="text" class="form-control p-1" id="total" name="parcela['+ i +'][valor]" value=' + valorParcela + '></input>')
        $("#line").append('<div class="col-md-4" id="vencto"></div>')
        $('#vencto').append('<input type="date" class="form-control p-1" id="total" name="parcela['+ i +'][vencimento]" value='+vencimentoParcela+'></input>')
        $("#line").append('<div class="col-md-2" id="parcel" ></div>')
        $('#parcel').append('<input type="text" class="form-control p-1" id="total" name="parcela['+ i +'][numero]" value=' + nnDoc +'></input>')
    }

    
})