<!-- resources/views/confirm-delete.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Confirm Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Are you sure?</h4>
                </div>
                <div class="card-body">
                    <p><strong>Source:</strong> {{ $user->mobileno }}</p>
                    <p><strong>SchoolID:</strong> {{ $user->school_id }}</p>

                    <form action="{{ route('delete.record') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $user->mobileno }}">

                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        <a href="{{ url('/delete-form') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
