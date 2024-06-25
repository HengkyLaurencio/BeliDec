<!DOCTYPE html>
<html>
<head>
  <title>Confirm Shop Deletion</title>
</head>
<body>
  <h1>Confirm Shop Deletion</h1>

  <p>Are you sure you want to delete the shop "<?php echo $shop->name; ?>"?</p>

  <form method="post" action="{{ route('deleteShop', ['id' => $shop->id]) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Delete Shop</button>
    <a href="{{ route('getShop') }}" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>