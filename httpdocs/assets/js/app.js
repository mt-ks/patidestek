$(function (){
    $('.modal').modal();
    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.collapsible').collapsible();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("form.submit").on('submit', function (e){
        e.preventDefault();
        request($(this))

    })

    let cities_Val = $("select#cities_select").val();
    if (cities_Val > 0)
    {
        let drop = $("select#cities_select");
        let id = drop.val();
        let page = drop.attr("data-page");
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
    }

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


function request(parent, postData = {},callback = null) {
    $("#loadingModal").modal('open');
    const address = (parent === null && postData.hasOwnProperty("address")) ? postData.address : parent.attr("action");
    const data = (parent === null && postData.hasOwnProperty("data")) ? postData.data : parent.serializeArray();

    $.ajax({
        url: address,
        type: "POST",
        data: data,
        dataType: 'JSON',
        success: function (xhr) {
            $("#loadingModal").modal('close');
            if (xhr.hasOwnProperty("message"))
            {
                M.toast({html: xhr.message});
            }
            if (xhr.redirect) {
                window.parent.location.href = xhr.redirect
            }

            if (callback != null)
            {
                callback(xhr);
            }

        }, error: function (XMLHttpRequest, textStatus, errorThrown) {
            $("#loadingModal").modal('close');
            if (XMLHttpRequest.hasOwnProperty("responseJSON")) {
                if (XMLHttpRequest.responseJSON.hasOwnProperty("errors"))
                {
                    for (const [key, value] of Object.entries(XMLHttpRequest.responseJSON.errors)) {
                        M.toast({html: value[0]});
                        $("[name="+key+"]").fadeOut();
                        $("[name="+key+"]").fadeIn();
                    }
                }else{
                    if (XMLHttpRequest.responseJSON.hasOwnProperty("message")) {
                        M.toast({html: XMLHttpRequest.responseJSON.message});

                    }
                }
                if (XMLHttpRequest.responseJSON.hasOwnProperty("redirect")) {
                    window.parent.location.href = XMLHttpRequest.responseJSON.redirect;
                }
            }
        }
    });
}
