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

    $("#cities_select").on('change',function (e){
        e.preventDefault();
        let id = $(this).val();
        let uri = $(this).attr("data-page");
        $.get(page,{id}, function (data){
            let json = JSON.parse(data);
            console.log(data);
        })
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
