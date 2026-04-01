<!-- resources/views/delete-form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Delete Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">School Delete</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('check.record') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="id" class="form-label">Enter registered mobile no. or email id of the school to delete</label>
                            <input type="text" name="id" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Check & Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
