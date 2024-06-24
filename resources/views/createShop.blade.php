
<h1>Create Shop</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('createShop') }}">
  @csrf
  <div class="form-group">
    <label for="name">Shop Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">  </div>
  <div class="form-group">
    <label for="owner_id">Owner ID:</label>
    <input type="number" class="form-control" id="owner_id" name="owner_id" value="{{ old('owner_id') }}">  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>  </div>
  <button type="submit" class="btn btn-primary">Create Shop</button>
</form>

