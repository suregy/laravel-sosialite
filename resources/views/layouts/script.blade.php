<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset('js/crud.js') }}"></script>



<script type="text/javascript">


//untuk head csrf
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// //function add modal
function addModal(url) {
    var dataURL = url;
    $('.modal-content').load(dataURL,function(){
      $('#myModal').modal({show:true});
    });
}



// //function selectAll
function selectAll(argument, checkbox_name)
{
    if($('#'+argument).is(':checked'))
    {
        $("input[name='"+checkbox_name+"']").each(function(){
            this.checked = true;
        });
    }else{
        $("input[name='"+checkbox_name+"']").each(function(){
            this.checked = false;
        });
    }
}


// </script>