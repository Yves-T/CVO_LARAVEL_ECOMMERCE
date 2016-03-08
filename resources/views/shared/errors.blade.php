@if (count($errors) > 0)
    <div id="form-errors">
        <p>The following errors have occured:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> <!-- end form-errors -->
@endif
