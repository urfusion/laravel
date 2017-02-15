@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        The form contains error(s) below.
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
