<div class="custom-file">
  <input name="image" type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>

<div class="form-group">
    <label for="title">Title</label>
    <input class="form-control bg-light shadow-sm"
        type="text" 
        name = "title" 
        value="{{ old('title', $videogame -> title)}}">
</div>
<div class="form-group">
    <label for="rating">Rating</label>
    <select class="form-control form-select bg-light shadow-sm"
        name="rating" id=""  value="{{ old('rating', $videogame -> rating)}}">
        <option selected="true" disabled="disabled">Select a rating...</option>
        <option {{ $videogame -> rating == "Everyone" ? 'selected' : ''}}>Everyone</option>
        <option {{ $videogame -> rating == "Everyone 10+" ? 'selected' : ''}}>Everyone 10+</option>
        <option {{ $videogame -> rating == "Teen" ? 'selected' : ''}}>Teen</option>
        <option {{ $videogame -> rating == "Mature 17+" ? 'selected' : ''}}>Mature 17+</option>
        <option {{ $videogame -> rating == "Adults Only 18+" ? 'selected' : ''}}>Adults Only 18+</option>
        <option {{ $videogame -> rating == "Rating Pending" ? 'selected' : ''}}>Rating Pending</option>
        <option {{ $videogame -> rating == "Rating Pending-Likely Mature 17+" ? 'selected' : ''}}>Rating Pending-Likely Mature 17+</option>
    </select>
</div>
<div class="form-group">
    <label for="console">Videogame console</label>
    <select class="form-control form-select bg-light shadow-sm "
        name="console" id="" value="{{ old('console', $videogame -> console)}}">
        <option selected="true" disabled="disabled">Select a console...</option>
        <option {{ $videogame -> console == "Nintendo Switch" ? 'selected' : ''}}>Nintendo Switch</option>
        <option {{ $videogame -> console == "PlayStation 4" ? 'selected' : ''}}>PlayStation 5</option>
        <option {{ $videogame -> console == "PlayStation 5" ? 'selected' : ''}}>PlayStation 4</option>
        <option {{ $videogame -> console == "Xbox Series X|S" ? 'selected' : ''}}>Xbox Series X|S</option>
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