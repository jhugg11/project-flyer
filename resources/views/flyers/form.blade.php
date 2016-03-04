{{ csrf_field() }}
<div class="form-group">
    <label for="street">Street:</label>
    <input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}" required>
</div>
<div class="form-group">
    <label for="city">City:</label>
    <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
</div>
<div class="form-group">
    <label for="zip">Zip:</label>
    <input type="text" name="zip" class="form-control" value="{{ old('zip') }}" required>
</div>
<div class="form-group">
    <label for="country">Country:</label>
    <select name="country" id="country" class="form-control" required>
        @foreach($countries as $country => $name)
            <option value="{{ $country }}">{{ $name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="state">State</label>
    <input type="text" name="state" class="form-control" value="{{ old('state') }}" required>
</div>
<div class="form-group">
    <label for="price">Sale Price:</label>
    <input type="text" name="price" id="price" class="price" value="{{ old('price') }}" required>
</div>
<div class="form-group">
    <label for="description">Description:</label>
            <textarea type="text" name="description" id="description" cols="30" rows="10" class="form-control" required>
                {{ old('description') }}
            </textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Create Flyer</button>
</div>
