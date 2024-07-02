<!DOCTYPE html>
<html>
<head>
    <title>Laravel Video Upload Form - ScratchCode.io</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2>Video</h2>
        </div>
        <div class="panel-body">
            @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6 form-group">
                            <label>Title tm:</label>
                            <input type="text" name="title_tk" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Title ru:</label>
                            <input type="text" name="title_ru" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Title en:</label>
                            <input type="text" name="title_en" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Select Video:</label>
                            <input type="file" name="video" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
