<div id="result">

</div>
<form id="idForm" class="form">

    <div class="form-group">
        <label for="fecha">Introduce la fecha</label>
        <input id="fecha" name="fecha" type="date" format="DD-MM-YYYY" class="form-control">
    </div>
    <button id="formButton" class="btn btn-primary">{{ __('Validar') }}</button>
</form>

<script>
    //load script when document is ready
    $(document).ready(function(){

        //Click on submit button event
        $("#formButton").click(function(e) {
            //avoid default event
            e.preventDefault();
            //laravel route
            const url = '{{ route('validate') }}';
            //parse date in correct format with moment.js
            const fecha = moment($('#fecha').val()).format('DD-MM-YYYY');
            //add laravel form header (using csrf-token)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //send data by ajax
            $.ajax({
                type: "POST",
                url: url,
                data: { fecha: fecha },
                success: function(data)
                {
                    $('#result').empty();
                    $('#result').append(data.view);
                },
            });
        });
    });
</script>