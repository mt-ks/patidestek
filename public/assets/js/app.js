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
        let page = $(this).attr("data-page");
        $.ajax({
            url: page.replace("-1","") + id,
            method : 'GET',
            dataType: 'JSON',
            success : function (response){
                $("#town_select").empty();
                $("#town_select").append(new Option("İlçe seçiniz...", "-1"));
                for (let i = 0; i < response.towns.length; i++)
                {
                    let item = response.towns[i];
                    $("#town_select").append(new Option(item.name, item.id));
                }
            }
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
