@if($videogame->image)
    <img class="card-img-top mb-2" 
        src="/storage/{{ $videogame->image }}" 
        alt="{{ $videogame->title }}">
@endif
<div class="custom-file mb-2">
  <input name="image" type="file" class="custom-file-input form-control" id="customFile">
</div>

<div class="form-group">
    <label for="title">Title</label>
    <input class="form-control bg-light shadow-sm"
        type="text" 
        name = "title" 
        value="{{ old('title', $videogame -> title)}}">
</div>

<div class="form-group">
    <label for="rating_id">Rating</label>
    <select class="form-control form-select bg-light shadow-sm"
        name="rating_id" id="rating_id"  value="">
        <option value="" selected disabled="disabled">Select a rating</option>
        
        @foreach($ratings as $id => $name)
            <option value="{{ $id }}"
                @if ($id == old('rating_id', $videogame->rating_id)) selected @endif
            >{{ $name }}</option>
        @endforeach

    </select>
</div>

<div class="form-group">
    <label for="console_id">Videogame console</label>
    <select class="form-control form-select bg-light shadow-sm "
        name="console_id" id="console_id" value="">
        <option value="" selected disabled="disabled">Select a console</option>
        
        @foreach($consoles as $id => $name)
            <option value="{{ $id }}"
                @if($id == old('console_id', $videogame->console_id)) selected @endif
            >{{ $name }}</option>
        @endforeach

    </select>
</div>
<div class="form-group">
    <label for="purchase_price">Purchase Price</label>
    <input class="form-control bg-light shadow-sm"
        type="number" name = "purchase_price" step="0.01" 
        value="{{ old('purchase_price', $videogame -> purchase_price)}}">
</div>
<div class="form-group">
    <label for="sale_price">Sale Price</label>
    <input class="form-control bg-light shadow-sm"
        type="number" name = "sale_price" step="0.01" 
        value="{{ old('sale_price', $videogame -> sale_price)}}">
</div>
<div class="form-group">
    <label for="url">URL</label> 
    <input class="form-control bg-light shadow-sm"
        type="text" name = "url" value="{{old('url', $videogame -> url) }}">
</div><br>