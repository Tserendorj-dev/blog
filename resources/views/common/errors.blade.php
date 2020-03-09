@if (count($errors) > 0)
    <!-- Алдааны жагсаалт -->
    <div class="alert alert-danger">
        <strong>エラー</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif