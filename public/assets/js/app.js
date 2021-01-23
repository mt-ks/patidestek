$(function (){
    $('.modal').modal();
    $('.sidenav').sidenav();

    $("form.submit").on('submit', function (e){
        e.preventDefault();
        showLoadingModal();
        $.ajax({
            action: $(this).attr("action"),
            dataType : 'JSON',
            data : $(this).serializeArray(),
            success : function (xhr){
                hideLoadingModal();
            },
            error : function (xhr)
            {
                hideLoadingModal();
            }
        });

    })

});

function request(data,callback)
{

}

function showLoadingModal()
{
    $("#loadingModal").modal('open');

}

function hideLoadingModal()
{
    $("#loadingModal").modal('close');
}

function toast(message)
{
    M.toast({html: message});
}
