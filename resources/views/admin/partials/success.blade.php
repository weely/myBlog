@if (Session::has('success'))
    <script>
        var time=0;
    </script>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>
            <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.
        </strong>
        {{ Session::get('success') }}
    </div>
@endif