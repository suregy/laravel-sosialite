$(document).ready(function(){
  $('.loading').hide();
});


function save(url, type, argument)
{
  // let data = $("#form_save").serialize();
  var form_data = new FormData(document.getElementById('form_save'));

  if(argument == 'edit')
  {
    form_data.append('_method', 'PATCH');
  }else{
    form_data.append('_method', 'POST');
  }

  $.ajax({
    type: type,
    data: form_data,
    url: url,
    dataType: 'JSON',
    cache: false,
    contentType: false,
    processData: false,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(data){
        if(data.err == '')
        {
          alert(data.status);
          window.location.reload();
        }else{
          alert(data.err);
        }
    }
  })

}


function add(url, type) {
    $.ajax({
      type:type,
      url:url,
      success: function(data) {
        $('#content').html(data);
      }
    });
  }

function edit(url, type, cb_name){
  var checkbox = [];
    $.each($("input[name='"+cb_name+"']:checked"), function(){
        checkbox.push($(this).val());
    });
    var dataCheck = checkbox.join(",");
    var length    = $("input[name='"+cb_name+"']:checked").length;
    var token = $("meta[name='csrf-token']").attr("content");

    if(length == 0 || length > 1){
      alert('pilih satu data');
    }else{
      $.ajax({
        type: type,
        url: url+'/'+dataCheck+'/edit',
        data: {
          "_token": token,
          "id": dataCheck
        },
        success: function(data){
          $('#content').html(data);
        }
      })
    }

}

function destroy(url, type, cb_name)
{
    var checkbox = [];
    $.each($("input[name='"+cb_name+"']:checked"), function(){
        checkbox.push($(this).val());
    });
    var dataCheck = checkbox.join(",");
    var length    = $("input[name='"+cb_name+"']:checked").length;
    var token = $("meta[name='csrf-token']").attr("content");

    $('.loading').show();

    if(length == 0) {
        alert('Tidak ada data yang dipilih');
        $('.loading').hide();
    }else{
        if(confirm('Hapus Data ?') == false){
            alert('Tidak OK');
            return false;
        }else{
            $.ajax({
                type: type,
                url: url+'/'+dataCheck,
                data: {
                    "_token": token,
                    "id": dataCheck
                },
                success: function(data){
                    alert(data.status);
                    main(url, 'GET', 'table');
                    // if (data.url != '') {
                    //   main(data.url ,data.typ, data.tab);
                    // }else{
        
                    // }
                    $('.loading').hide();
                }
            });
        }
    }
}

// search
$(document).on('click', 'a.page-link', function (event) {
    event.preventDefault();
    search($(this).attr('href'), 'GET', 'table');
  });
  
  function search(url, type, divId) {
    var form_data = $("#form_search").serialize()+'&divId='+divId;
    $('.loading').show();

  
    $.ajax({
      type:type,
      data:form_data,
      url:url,
      contentType: false,
      success: function(data) {
        $('#'+divId).html(data);
        $('.loading').hide();
      }
    });
  }
  // end search

  //refresh
  function main(url, type, content){
    content = typeof content !== 'undefined' ? content : 'content';
    $.ajax({
      type: type,
      url: url,
      success: function(data){
        $('#'+content).html(data);
      }
    });
  }

  // function main(url, type, idTab) {
  //   $.ajax({
  //     type:type,
  //     url:url,
  //     success: function(data) {
  //       $('#content').html(data);
  //       if (idTab != '') {
  //         $('#'+idTab).trigger('click');
  //       }else{
  
  //       }
  //     }
  //   });
  // }


